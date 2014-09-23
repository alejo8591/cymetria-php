<?php

class ClassSchool implements InterfacePerson, InterfaceStudent, InterfaceTeacher
{
	protected $id;
	protected $name;
	protected $address;

	protected $courses;
	protected $study_day;
	protected $subjects;

	protected $profession;
	protected $workday;
	protected $assigned_courses;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setId($id)
	{

	}

	public function setAddress($address)
	{

	}

	public function setCourse($courses)
	{

	}

	public function setStudyDay($study_day)
	{

	}

	public function setSubjects($subjects)
	{

	}

	public function setProfession($profession)
	{

	}

	public function setWorkday($workday)
	{

	}

	public function setAssignedCourses($assigned_courses)
	{

	}
}

?>