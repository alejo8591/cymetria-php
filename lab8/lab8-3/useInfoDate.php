<?php

include_once('InfoDate.php');

echo 'La Fecha es: ' . InfoDate::getDateTime() . "<br />";


echo 'La Hora es: ' . InfoDate::getHourTime() . "<br />";

echo 'La Fecha y la Hora es: ' . InfoDate::getDateAndHourTime() . "<br />";

?>
