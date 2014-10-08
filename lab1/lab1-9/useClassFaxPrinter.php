<?php
$className = "ClassFaxPrinter";

function __autoload($className){
	include ucfirst($className) . ".php";
}

$fax_printer = new ClassFaxPrinter();

$fax_printer->dial();

$fax_printer->send();

$fax_printer->receiveFax();

$fax_printer->printColor();

$fax_printer->PrintDraft();

$fax_printer->Black();
?>