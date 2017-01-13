<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

// basic two-dimensional array with the data
  $data = array
  (
  	array("2011",472),
  	array("2012",680),
  	array("2013",969),
  	array("2014",1244)
  );

// sent to output as json
echo json_encode($data);

?>