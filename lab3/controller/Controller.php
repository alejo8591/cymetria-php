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
		if (!isset($_GET['student'])) {
			$students = $this->model->getStudentList();

			include "view/ListStudents.php";
		}
	}
}

?>