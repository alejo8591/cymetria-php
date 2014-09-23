<?php

$className = "FinalClassMath";

function __autoload($className)
{
	 include ucfirst($className) . ".php";
}

$my_num = new FinalClassMath();

$my_num->setNumber(40);

echo $my_num->addTwoANumber();

?>