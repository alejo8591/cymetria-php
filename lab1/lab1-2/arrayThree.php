<?php

function arrayList($ar)
{
	printf("<p>(%s)</p>\n", implode(', ', $ar));
}

$ar1 = range(5, 11);
arrayList($ar1);

$ar2 = range(0, -5);
arrayList($ar2);

$ar3 = range(3, 15, 3);
arrayList($ar3);

arrayList(range(20, 0, -5));

arrayList(range("a", "f"));

arrayList(range("M", "A", -2));

?>