<?php 

class Person {
	public $first_name;
	public $last_name;
	public $dni;
	public $stature;

	public function __construct($first_name, $last_name, $dni, $stature){
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->dni = $dni;
		$this->stature = $stature;
		return true;
	}

	public function ship($parcel){
		return true;
	}

	public function getFirstName(){
		return $this->first_name;
	}
}

?>