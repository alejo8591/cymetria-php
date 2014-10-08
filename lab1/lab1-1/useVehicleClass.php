<?php
$className = "Vehicle";

function __autoload($className){
	include ucfirst($className) . ".php";
}

$vehicle = new Vehicle;

$vehicle->color = "red";

$vehicle->num_doors = 5;

$vehicle->price = "200.000.000";

$vehicle->nid = "BYC345";

$vehicle->brand = "BMW";

$vehicle->numDoors();

$vehicle->showPrice();

$vehicle->showColor();

$vehicle->showNid();

$vehicle->showBrand();


?>