<?php
/** Incluyendo clase Vehicle */
include('Vehicle.php');

class Motorcycle extends Vehicle
{
	public $ccs;

	function __construct()
	{
		echo "Esta es mi moto";
	}

	public function showCC()
	{
		echo "Esta moto tiene: " . $this->ccs . "c.c.";
	}
}

?>