<?php
  function array_eq_ident($arr1, $arr2)
  {
    printf("<p>The two arrays are %s equal.</p>\n",
            $arr1 == $arr2 ? '' : 'not ');

  printf("<p>The two arrays are %s identical.</p>\n",
        $arr1 === $arr2 ? '' : 'not ');
}
  $dogs = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');
  $pups = array('Lassie' => 'Collie', 'Bud' => 'Sheepdog',
                'Rin-Tin-Tin' => 'Alsatian', 'Snoopy' => 'Beagle');
  $mutts = array('Lassie' => 'Collie', 'Rin-Tin-Tin' => 'Alsatian',
                 'Bud' => 'Sheepdog','Snoopy' => 'Beagle');
  print "<p>\$dogs and \$pups:</p>\n" ;
  array_eq_ident($dogs, $pups);
  print "<p>\$dogs and \$pups:</p>\n" ;
  array_eq_ident($dogs, $mutts);
?>