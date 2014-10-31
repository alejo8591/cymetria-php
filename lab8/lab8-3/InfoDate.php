<?php

class InfoDate
{
	public static function getDateTime()
	{
		$year = date('Y');

		$month = date('m');

		$day = date('d');

		return $day . '/' . $month . '/' . $year;
	}

	public static function getHourTime()
	{
		$hour = date('H');

		$minutes = date('i');

		$seconds = date('s');

		return $hour . ':' . $minutes . ':' . $seconds;
	}

	public static function getDateAndHourTime()
	{
		$date = self::getDateTime();

		$hour = self::getHourTime();

		return $date . ' | ' . $hour;

	}
}

?>