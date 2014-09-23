<?php
include('Vehicle.php');

class Airplane extends Vehicle
{
	private $ailerons;
	private $tires;

	function construct()
	{
		echo "Este es mi Avion<br />";
	}

	function setAilerons($ailerons)
	{
		$this->ailerons = $ailerons;
	}

	function setTires($tires)
	{
		$this->tires = $tires;
	}

	function getAilerons()
	{
		echo "Este avion tiene: " . $this->ailerons . "Alerones";
	}

	function getTires()
	{
		echo "Este avion tiene: " . $this->tires . " llanta(s)";
	}
}
?>

