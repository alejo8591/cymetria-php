<?php
include "ClassMath.php";

class ClassMathSum extends ClassMath
{
	/**
	* @access public
	* @param $num número a asignar
	*
	**/
	public function setNumber($num)
	{
		$this->num = $num;
	}

	/**
	* Sumando dos al mismo número
	* @access public
	* @return int
	*
	**/
	public function addTwoANumber()
	{
		return $this->num + 2;
	}
}
?>