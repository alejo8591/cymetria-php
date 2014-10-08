<?php
  //sample11_3.php
  //A function to concatenate text.
  function attachtext (&$newtext = ""){
    //Now the function attaches the received text.
    $newtext = $newtext . " World!";
  }
  //Here is the current block of text.
  $mystring = "Hello";
  //Then you call the function to attach new text.
  attachtext ($mystring);
  //And when you echo the variable now...
  echo $mystring; //Outputs Hello World!
?>
