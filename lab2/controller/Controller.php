<?php

include_once("model/Model.php");

class Controller
{
	public $model;

	public function __construct()
	{
		$this->model = new Model();
	}

	public function invoke()
	{
		if (!isset($_GET['book'])) {
			// No se solicita algún libro en especial vamos a traer la lista de libros
			$books = $this->model->getBookList();

			include "view/ListBook.php";
		} else {
			// mostrar el libro solicitado por la clave de la lista
			$book = $this->model->getBook($_GET['book']);

			include "view/ViewBook.php";
		}
	}
}

?>