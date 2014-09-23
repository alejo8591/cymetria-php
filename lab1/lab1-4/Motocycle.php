<?php
/** Incluyendo clase Vehicle */
include('Vehicle.php');

class Motorcycle extends Vehicle
{
}

$moto = new Motorcycle;

$moto->color = "blue";

$moto->num_doors = 0;

$moto->price = "4.000.645";

$moto->nid = "BUV88C";

$moto->brand = "AKT";

$moto->numDoors();

$moto->showPrice();

$moto->showNid();

$moto->showBrand();


?>