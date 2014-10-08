<?php
  $languages = array();
  array_push($languages, 'German', 'French', 'Spanish');
  printf("<p>Languages: %s.</p>\n", implode(', ', $languages));
?>