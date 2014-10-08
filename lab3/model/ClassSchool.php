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
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function setCourse($courses)
	{
		$this->course = $course;
	}

	public function getCourse()
	{
		return $this->course;
	}

	public function setStudyDay($study_day)
	{
		$this->study_day = $study_day;
	}

	public function getStudyDay()
	{
		return $this->study_day;
	}

	public function setSubjects($subjects)
	{
		$this->subjects = $subjects;
	}

	public function getSubjects()
	{
		return $this->subjects;
	}

	public function setProfession($profession)
	{
		$this->profession = $profession;
	}

	public function getProfession()
	{
		return $this->profession;
	}

	public function setWorkday($workday)
	{
		$this->workday = $workday;
	}

	public function getWorkday()
	{
		return $this->workday;
	}

	public function setAssignedCourses($assigned_courses)
	{
		$this->assigned_courses = $assigned_courses;
	}

	public function getAssignedCourses()
	{
		return $this->assigned_courses;
	}
}

?>