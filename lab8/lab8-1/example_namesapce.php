<?php

namespace my\name; // Definiedo mi `namespace`

class MyClass{}

function myFunction(){}

const MYCONSTANT = 1;

$a = new MyClass;

$c = new \my\name\MyClass; // uso del namespace en espacio global

$a = strlen('hola');

$d = namespace\MYCONSTANT;

$d = __NAMESPACE__ . '\MYCONSTANT';

echo constant($d);
?>