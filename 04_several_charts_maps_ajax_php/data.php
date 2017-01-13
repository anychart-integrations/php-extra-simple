<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

// each element of output object is an array
// that will be used to pass data to AnyChart
$output_objects_array = array(); 

// separate functions are used to load data from a  database and put into
// arrays, and added to output array

// for the sake of easy understanding hardcoded data is used here

// brands
function loadBrandsReport() {
  global $output_objects_array;
  $brands = array
  (
  	array("Volvo",22,18,45,23),
  	array("BMW",15,13,23,7),
  	array("Saab",5,2,7,8),
  	array("Land Rover",17,15,12,12)
  );
  $output_objects_array = array_merge($output_objects_array, array("brands"=>$brands));  
}

// sales report
function loadSalesReport() {
  global $output_objects_array;  
  $sales = array
  (
  	array("2010",2218),
  	array("2011",1513),
  	array("2012",5200),
  	array("2013",1715)
  );
  $output_objects_array = array_merge($output_objects_array, array("sales"=>$sales));

}

// counties representatives
function loadCountiesReport() {
  global $output_objects_array;  
  $counties = array
  (
  	array("Appling",2218),
  	array("Atkinson",1513),
  	array("Baker",5200),
  	array("Barrow",1715),
  	array("Camden",0),
  	array("Lincoln",0),

  );
  $output_objects_array = array_merge($output_objects_array, array("counties"=>$counties));
}


if ($_GET["sales"]==="yes") loadSalesReport();

if ($_GET["brands"]==="yes") loadBrandsReport();

if ($_GET["counties"]==="yes") loadCountiesReport();

// output as json, so we can later read them into
// variables in JavaScript
echo json_encode($output_objects_array);

?>