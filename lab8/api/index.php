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

// Resolviendo GET Request para la url con forma `/articles`
$api->get('/articles', function() use ($api){
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

// Publicando el API
$api->run();

?>