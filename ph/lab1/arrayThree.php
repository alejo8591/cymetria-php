<?php
# array range(mixed $start, mixed $end[, mixed $step])

  function array_list($array)         #  save a bit of typing
  {
    printf("<p>(%s)</p>\n", implode(', ', $array) );
  }
$arr1 = range(5, 11);
array_list($arr1);
$arr2 = range(0, -5);
array_list($arr2);
$arr3 = range(3, 15, 3);
array_list($arr3);
array_list( range(20, 0, -5) );
# integer start/end
# count backward
# use $step to skip intervals of 3
# stepping backward
  array_list( range(2.4, 3.1, .1) );  # fractional values
  array_list( range('a', 'f') );      # produce a sequence of characters
  array_list( range('M', 'A', -2) );  # skip every other letter going backward
?>