<?php


	// This is a very basic sample of using AnyChart with PHP
    // Data is stored in a PHP array and this array is passed as JSON object 
	// to the page with AnyChart

	// avoid cache
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past


	// Create an array with data
	$data = array
	  (
	  	array("United States", 13.973),
	  	array("Saudi Arabia",11.624),
	  	array("Russia", 10.853),
	  	array("China", 4.572),
	  	array("Canada", 4.383)
	  );

	// set title string
    $title = "Top 5 Oil Producing Countries";

    $y_axis_title = "million barrels per day";


?>

<html>
	<head>
		<title>JavaScript Bar Chart Using AnyChart with PHP Array and JSON in a single PHP File</title>
    	<script src="//cdn.anychart.com/js/latest/anychart.min.js" type="text/javascript"></script> 
	    <script>
	        anychart.onDocumentLoad(function() {
	            
	            // create an instance of bar chart with data
	            var chart = anychart.bar(<?php
					// output array as JSON object
					echo json_encode($data);
					?>);

	            chart.title("<? 
	            	// pass string with title to the method
	            	echo $title;
	            	?>");

	            chart.yAxis().title("<? 
	            	// pass string with title to the method
	            	echo $y_axis_title;
	            	?>");

	            // pass the container where chart will be drawn
	            chart.container("container");
	            // call the chart draw() method to initiate chart drawing
	            chart.draw();
	        });
	    </script>    	
	</head>
	<body>
		<h1>AnyChart 7 Sample of Simple Using AnyChart with PHP in a single PHP File</h1>
		<p>Please see index.php code to see how data for AnyChart is created using PHP.</p>
    	<div id="container" style="width: 500px; height: 400px;"></div>
	</body>
</html>
