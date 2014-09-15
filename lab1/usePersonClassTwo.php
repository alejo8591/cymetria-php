<?php

$classname = 'Person';

function __autoload($classname){
	include ucfirst($classname) . '.php';
}

$pression = new Person('Rok', 'Rik', '34445', '1.70');

#$pression->ship('pression');

echo "<h1>".$pression->getFirstName()."</h1>\n <h4> Hello! </h4>\n";

var_dump($pression);
?>