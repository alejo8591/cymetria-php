<?php

abstract class ClassMath
{
	/*** dos numeros del tipo protected ***/
	protected $num_one;

	protected $num_two;

	/**
	* @access protected
	* @param $num_one número a asignar
	*
	**/

	abstract protected function getNumberOne();

	/**
	* @access protected
	* @param $num_two número a asignar
	*
	**/

	abstract protected function getNumberTwo();

	/**
	* @access protected
	* @param $num_one número a asignar
	*
	**/

	abstract protected function setNumberOne($num_one);

	/**
	* @access protected
	* @param $num_two número a asignar
	*
	**/

	abstract protected function setNumberTwo($num_two);

	/**
	* Sumando dos numeros
	* @access protected
	*
	**/
	abstract protected function addTwoNumber();

	/**
	* Dividiendo dos numeros
	* @access protected
	*
	**/
	abstract protected function divideTwoNumber();

}