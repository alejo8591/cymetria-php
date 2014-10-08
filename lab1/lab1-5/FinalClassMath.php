<?php

final class FinalClassMath{
	/*** un Numero del tipo protected ***/
	protected $num;

	/**
	* @access public
	* @param $num número a asignar
	* @return int
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