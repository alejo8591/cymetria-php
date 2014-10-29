<?php

namespace ferrari;
class Car{
	public $color = "Amarillo";
	public $model = "2014";
	public $name = "testatorrosa";
}

namespace chevrolet;
class Car{
	public $color = "Rojo";
	public $model = "2002";
	public $name = "Luv";	
}

$carr = new ferrari\Car();

assert('Amarillo, 2014, testatorrosa' == "$carr->color, $carr->model, $carr->name");

$carr = new chevrolet\Car();

assert('Rojo, 2002, Luv' == "$carr->color , $carr->model , $carr->name");

?>