<?php
include "ClassMath.php";

class ClassMathSum extends ClassMath
{
	/**
	* @access public
	* @param $num_one  número para asignar
	*
	**/
	public function setNumberOne($num_one)
	{
		$this->num_one = $num_one;
	}

	/**
	* @access public
	* @param $num_two número para asignar
	*
	**/
	public function setNumberTwo($num_two)
	{
		$this->num_two = $num_two;
	}

	/**
	* Sumando dos al mismo número
	* @access public
	* @return int
	*
	**/
	public function addTwoNumber()
	{
		return $this->num_one + $this->num_two;
	}
}
?>