<?php

$className = "ClassMathSum";

function __autoload($className)
{
	 include ucfirst($className) . ".php";
}

$my_num = new ClassMathSum();

$my_num->setNumber(40);

echo $my_num->addTwoANumber();

?>