<?php

$motorClass = "Motorcycle";

function __autoload($motorClass)
{
	include ucfirst($motorClass) . ".php";
}

$moto = new Motorcycle;

var_dump($moto);

$moto->color = "blue";

$moto->num_doors = 0;

$moto->price = "4.000.645";

$moto->nid = "BUV88C";

$moto->brand = "AKT";

$moto->ccs = 125;

$moto->numDoors();

$moto->showPrice();

$moto->showNid();

$moto->showBrand();

$moto->showCC();

var_dump($moto);

?>