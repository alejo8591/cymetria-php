<?php

$className = "ClassMathSumAndDivide";

function __autoload($className)
{
	 include ucfirst($className) . ".php";
}

$my_math_operations = new ClassMathSum();

$my_math_operations->setNumberOne(40);

$my_math_operations->setNumberTwo(60);


echo $my_math_operations->addTwoANumber();

?>