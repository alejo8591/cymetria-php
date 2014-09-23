<?php

$airplaneClassName = "Airplane";

function __autoload($airplaneClassName)
{
	include ucfirst($airplaneClassName) . ".php";
}

$airplane = new Airplane;

var_dump($airplane);

$airplane->color = "Blanco";

$airplane->num_doors = 4;

$airplane->price = "40.000.645.000";

$airplane->nid = "HJXKS1234";

$airplane->brand = "Airbus";

$airplane->setAilerons(4);

$airplane->setTires(5);

$airplane->numDoors();

$airplane->showPrice();

$airplane->showNid();

$airplane->showBrand();

$airplane->getAilerons();

$airplane->getTires();

$airplane->ailerons = 4;

?>