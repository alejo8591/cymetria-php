<?php

abstract class ClassMath
{
	/*** un Numero del tipo protected ***/
	protected $num;

	/**
	* @access abstract protected
	* @param $num número a asignar
	* @return int
	*
	**/

	abstract protected function setNumber($num);

	/**
	* Sumando dos al mismo número
	* @access abstract protected
	* @return int
	*
	**/
	abstract protected function addTwoANumber();
}