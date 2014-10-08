<?php

$class_name = "ClassSchool";

function __autoload($class_name)
{
	include ucfirst($class_name) . ".php";
}

class Model
{
	public $student_one;
	public $student_two;

	public $teacher_one;
	public $teacher_two;

	public function getStudentList()
	{
		// Estudiante 1
		$student_one = new ClassSchool();

		$student_one->setName("Alejandro Romero");

		$student_one->setId("1234567890");

		$student_one->setAddress("Cr. 1 # 2 - 3 Este");

		$student_one->setStudyDay("Tarde");

		$student_one->setSubjects(array("matematicas", "sociales", "fisica", "espanol", "quimica"));

		// Estudiante 2
		$student_two = new ClassSchool();

		$student_two->setName("Jhonny Gil");

		$student_two->setId("123456789222");

		$student_two->setAddress("Cr. 2 # 4 - 3 Norte");

		$student_two->setStudyDay("Manana");

		$student_two->setSubjects(array("matematicas", "sociales", "fisica", "espanol"));

		return array($student_two, $student_one);

	}
}

?>