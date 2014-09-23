<?php

class ClassFaxPrinter implements InterfaceFax, InterFacePrinter
{
	public function dial()
	{
		echo "Marcando...";	
	}
	
	public function send()
	{
		echo "Enviando Fax al número XXXXXX";
	}
	
	public function receiveFax()
	{
		echo "Recibiendo Fax del número XXXXXXX";
	}

	public function printColor()
	{
		echo "Imprimendo a Color las paginas";
	}

	public function PrintDraft()
	{
		echo "Imprimendo en Borrador las paginas";
	}

	public function Black()
	{
		echo "Imprimendo a Blanco y negro las paginas";
	}
}