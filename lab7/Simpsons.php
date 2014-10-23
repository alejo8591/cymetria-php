<?php

class Simpsons {
	
	private $episodes = array();

	public function __construct(){
		// Biblioteca estandar PHP -> DOM XML
		$xml_doc = new DOMDocument();

		// Cargando la informacion desde archivo de datos XML
		$xml_doc->load("01_simpsons.xml");

		// Navegacion a traves de l DOM con PHP
		foreach ($xml_doc->documentElement->childNodes as $episodes) {
			if ($episodes->nodeType == 1) {

				$this->episodes[] = array(
					'episode' => $episodes->getAttribute('episode'),
					'season' => $episodes->getAttribute('season'),
					'title' => $episodes->getAttribute('title'),
					'aired' => $episodes->getAttribute('aired'),
					'summary' => $episodes->nodeValue,
					'xmlNode' => $episodes);
			}
		}
	}

	public function find($query){

		$found = array();

		foreach ($this->episodes as $episode) {

			$re = "/" . $query . "/i";

			// Busqueda a traves de expresiones regulares con la funcion de PHP `preg_match`
			if (preg_match($re, $episode['summary']) || preg_match($re, $episode['title'])) {
				$found[] = $episode;
			}
		}

		return $found;
	}
}

?>