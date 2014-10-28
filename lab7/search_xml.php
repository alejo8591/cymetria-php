<?php

include_once('Simpsons.php');

// Anunciando a la cabecera de la trama HTTP que voy enviar XML
header('Content-Type: text/xml');

$search_xml = new Simpsons();

$document_xml = new DOMDocument();

$root = $document_xml->createElement('episodes');

$document_xml->appendChild($root);

foreach($search_xml->find($_REQUEST['query']) as $episode){
	
	$element = $document_xml->createElement('episode');

	$element->setAttribute('title', $episode['title']);

	$element->setAttribute('episode', $episode['episode']);

	$element->setAttribute('season', $episode['season']);

	$element->setAttribute('aired', $episode['aired']);

	$text_node = $document_xml->createTextNode($episode['summary']);

	$element->appendChild($text_node);

	$root->appendChild($element);

}

print $document_xml->saveXML();

?>