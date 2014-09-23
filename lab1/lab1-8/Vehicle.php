<?php

include("TestDrive.php");

class Vehicle implements TestDrive
{
	public $color;
	public $num_doors;
	public $price;
	public $nid;
	public $brand;

	public function __construct(){
		echo "Este es mi carro";
	}

	public function numDoors(){
		echo "Este vehiculo tiene: " . $this->num_doors . " puertas<br />";
	}

	public function showPrice(){
		echo "Este vehiculo cuesta: $" . $this->price . "M/cte";
	}

	public function showNid(){
		echo "Este vehiculo tiene una placa: " . $this->nid;
	}

	public function showBrand(){
		echo "Este vehiculo es de marca: " . $this->brand;
	}

	public function showColor(){
		echo "Este vehiculo es de color: " . $this->color;
	}

	public function drive()
	{
		echo "El vehiculo esta andando";
	}

	public function stop()
	{
		echo "El vehiculo se detiene";
	}
}
?>


