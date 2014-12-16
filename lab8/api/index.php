<?php 

/* load required files
 * require 'Slim/Slim.php';
 * require 'RedBead/rb.php';
 */

// Cargar con Composer

require 'vendor/autoload.php';

\Slim\Slim::registerAutoloader();

// R Clase especifica de Redbeanphp, osea el ORM
R::setup('mysql:host=myhost.local;port=8889;dbname=test;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', 'root', 'root');
/* Congelamos el estado de apertura de la base de datos mientras la utilizamos, 
 * esto no genera mayor incovenientes con respecto a la seguridad, pues la 
 * conexión no es persistente y esta protegida pars XSS
 */
R::freeze(true);

// Inicializando la api

$api = new \Slim\Slim(array(
	'cookies.secret_key' => 'my_secret_key',
));

/*
* Realizando set de condicionales para la clase Route en Slim
* Se le indica los parametros de expresión regular para que 
* las urls tengan un formato deifinido y no se acepten 
* caracteres ni elementos diferentes a los que se definen
*/
\Slim\Route::setDefaultConditions(array(
	'id'=>'[0-9]{1,}',
));

// Herencia de la clase de PHP `Exception`
class ResourceNotFoundException extends Exception{}

// Utilizando el middleware de autenticacion para aplicar al API
function authenticate(\Slim\Route $route) {
	
	$api = \Slim\Slim::getInstance();
	
	$uid = $api->getEncryptedCookie('uid');
	
	$key = $api->getEncryptedCookie('key');

	if (validateUserKey($uid, $key) === false) {
		$api->halt(401);
	}
}

// Funcion para validar el acceso del usuario de prueba
function validateUserKey($uid, $key) {

	if ($uid == 'testapi' && $key == 'testapi') {
		
		return true;
	
	} else {

		return false;
	}
}

// Resolviendo GET Request para la url con forma `/articles`
$api->get('/articles', 'authenticate', function() use ($api){
	try{
		/* 
		 * Indicando a la clase `R`de Redbeans la consulta
		 * total de la tabla `articles`
		*/
		$articles = R::find('articles');
		/*
		 * Asignando el valor de la cabecera HTTP a `$mediaType`
		 * el tipo de contenido `Content-Type` ya sea
		 * `application/json` o `application/xml`
		*/
		$mediaType = $api->request()->getMediaType();

		// Verificando si es XML
		if ($mediaType == 'application/xml') {

			/*
			 * Asignando al `Response` de la petición el tipo de contenido a
			 * a devolver; en este caso XML
			 */

			$api->response()->header('Content-Type', 'application/xml');

			/*
			 * Creando estructura XML con la clase `SimpleXMLElement`
			 * En este caso un nodo "root" llamado `<articles></articles>`
			*/
			$xml = new SimpleXMLElement('<articles/>');

			// Exportando el Query Set que devuelve el ORM y que se almacena en `$articles`
			$results = R::exportAll($articles);

			// Iterando sobre `$results` para agregar información al DOM de `$xml`
			foreach ($results as $r) {
				
				$item = $xml->addChild('article');

				$item->addChild('id', $r['id']);

				$item->addChild('title', $r['title']);

				$item->addChild('url', $r['url']);

				$item->addChild('date', $r['date']);

			}

			echo $xml->asXml();
		
		// Verificando si la petición es JSON
		} else if ($mediaType == 'application/json'){

			/*
			 * Asignando al `Response` de la petición el tipo de contenido a
			 * a devolver; en este caso JSON
			 */
			$api->response()->header('Content-Type', 'application/json');

			// Parseando la información del Query Set obtenido en `$articles`
			echo json_encode(R::exportAll($articles));
		}

	}catch (Exception $e){
		$api->response()->status(400);
		$api->response()->header('X-status-Reason', $e->getMessage());
	}
});

// Consulta del API con respecto a un articulo especifico
$api->get('/articles/:id', 'authenticate', function ($id) use ($api) {

	try{
		/* 
		 * Buscando en la base de datos un articulo especifico
		 * pasando por parametro en la url el valor del `id` para
		 * buscarlo. Esto se hace utilizando el metodo estatico
		 * `findOne` de la clase `R` del ORM.
		*/
		$article = R::findOne('articles', 'id=?', array($id));

		if($article) {
			
			$mediaType = $api->request()->getMediaType();

			if ($mediaType == 'application/xml') {
				/* 
				 * Indicando a la cabecera de la respuesta HTTP el
   				 * tipo de contenido que se devuelve; en este caso
   				 * en formato `XML` para entregar un DOM de la petición
				 */
				$api->response()->header('Content-Type', 'application/xml');

				// Contruyendo el DOM con el metodo de PHP `SimpleXMLElement`
				$xml = new SimpleXMLElement('<root/>');
				// Obteniendo todos los datos de la tupla
				$result = R::exportAll($article);
				// Iterando sobre el Query Set de la consulta
				foreach ($result as $node) {
					$item = $xml->addChild('item');
					$item->addChild('id', $node['id']);
					$item->addChild('title', $node['title']);
					$item->addChild('url', $node['url']);
					$item->addChild('date', $node['date']);
				}
				echo $xml->asXml();
			// Cuando el Content-Type es `application/json`
			} else if ($mediaType == 'application/json') {
				/* 
				 * Indicando a la cabecera de la respuesta HTTP el
   				 * tipo de contenido que se devuelve; en este caso
   				 * en formato `JSON`
				 */
				$api->response()->header('Content-Type', 'application/json');
				// Parseando la información del Query Set `$article`
				echo json_encode(R::exportAll($article));
			
			} else {
				throw new ResourceNotFoundException();
			}
		} 
	} catch (ResourceNotFoundException $error) {
			$api->response()->status(400);
			$api->response()->header('X-Status-Reason', $error->getMessage());
		}
});

// metodo `POST` para crear elementos en la base de datos
$api->post('/articles', 'authenticate', function () use ($api) {

	try {
		
		// Obtiene la trama `HTTP` que el cliente solicita
		$request = $api->request();

		$mediaType = $request->getMediaType();

		// Obteniendo el cuerpo de la petición `HTTP` del tipo `POST`
		$body = $request->getBody();

		if ($mediaType == 'application/xml') {

			$input = simplexml_load_string($body);

		} else if ($mediaType == 'application/json') {

			$input = json_decode($body);
		}
		/* 
		 * Preparando el elemento que se envia desde la petición `HTTP`
		 * sacando la información del cuerpo de la misma, e indicando al 
		 * ORM que de apertura al motor de base de datos para guardar los
		 * atributos dentro de la tabla `articles`
		*/
		$article = R::dispense('articles');

		$article->title = (string)$input->title;
		$article->url = (string)$input->url;
		$article->date = (string)$input->date;

		// estructura que se utiliza para guardar(Create) o Actualizar(Update)
		$id = R::store($article);

		if ($mediaType == 'application/xml') {
			
			$api->response()->header('Content-Type', 'application/xml');
			
			$xml = new SimpleXMLElement('<root/>');

			$result = R::exportAll($article);

			foreach ($result as $node) {

				$item = $xml->addChild('item');
				$item->addChild('id', $node['id']);
				$item->addChild('title', $node['title']);
				$item->addChild('date', $node['date']);
			}

			echo $xml->asXml();
		
		} else if ($mediaType == 'application/json') {
			$api->response()->header('Content-Type', 'application/json');

			echo json_encode(R::exportAll($article));
		}

	} catch (ResourceNotFoundException $error) {
		$api->response()->status(400);
		$api->response()->header('X-Status-Reason', $error->getMessage());
	}
});

$api->put('/articles/:id', 'authenticate', function ($id) use ($api) {

	try {

		$request = $api->request();
		$mediaType = $request->getMediaType();
		$body = $request->getBody();

		if ($mediaType == 'application/xml') {
			
			$input = simplexml_load_string($body);

		} else if ($mediaType == 'application/json') {
			$input = json_decode($body);
		}

		$article = R::findOne('articles', 'id=?', array($id));

		if ($article) {
			$article->title = (string)$input->title;
			$article->url = (string)$input->url;
			$article->date = (string)$input->date;

			R::store($article);

			if ($mediaType == 'application/xml') {

				$api->response()->header('Content-Type', 'application/xml');

				$xml = new SimpleXMLElement('<root/>');

				$result = R::exportAll($article);

				foreach ($result as $node) {
					$item = $xml->addChild('item');
					$item->addChild('id', $node['id']);
					$item->addChild('url', $node['url']);
					$item->addChild('date', $node['date']);
				}

				echo $xml->asXml();
			
			} else if ($mediaType == 'application/json') {
				$api->response()->header('Content-Type', 'application/json');
				echo json_encode(R::exportAll($article));
			}
		
		} else {

			throw new ResourceNotFoundException();
			
		} 
	} catch (ResourceNotFoundException $error) {

		$api->response()->status(404);
		
	} catch (ResourceNotFoundException $error) {
			
		$api->response()->status(400);
			
		$api->response()->header('X-Status-Reason', $error->getMessage());
	}
});

$api->delete('/articles/:id', 'authenticate', function ($id) use ($api) {

	try {
		
		$request = $api->request();

		$article = R::findOne('articles', 'id=?', array($id));

		if ($article) {
			
			R::trash($article);

			$api->response()->status(204);
		
		} else {
			
			throw new ResourceNotFoundException();
		
		}

	} catch (ResourceNotFoundException $error) {
		
		$api->response()->status(404);
	
	} catch (ResourceNotFoundException $error) {

		$api->response()->status(400);
		$api->response()->header('X-Status-Reason', $error->getMessage());
	}

});

// URL a traves del metodo `GET` para la autenticacion en  el API
$api->get('/auth', function () use ($api) {

	try {
		/*
		 * Seteando la cabecera para escribir en el navegador 
		 * el cookie con tiempo de vida de 5 minutos
		 *
		 */
		$api->setEncryptedCookie('uid', 'testapi', '5 minutes');

		$api->setEncryptedCookie('key', 'testapi', '5 minutes');

	} catch (ResourceNotFoundException $error) {
		
		$api->response->status(400);

		$api->response()->header('X-Status-Reason', $error->getMessage());
	}
});

// Publicando el API
$api->run();

?>