 <?php

interface InterfaceTeacher
{
	public function setProfession($profession);

	public function setWorkday($workday);

	public function setAssignedCourses($assigned_courses);

	public function getProfession();

	public function getWorkday();

	public function getAssignedCourses();
}

?>