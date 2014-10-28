<?php

include_once('Simpsons.php');

header('Content-Type: application/json');

$search_json = new Simpsons();

print json_encode($search_json->find($_REQUEST['query']));
 
?>