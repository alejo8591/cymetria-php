<?php
require 'Person.php';
$yopo = new Person('Hitman', 'Rich', '12333', '1.90');

#$yopo->ship('yopo');

echo "<h1>".$yopo->getFirstName()."</h1>\n <h4> Hello! </h4>\n";

var_dump($yopo);
?>