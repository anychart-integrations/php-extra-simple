<?php


	// This is a very basic sample of using AnyChart with PHP

	// avoid cache
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past


	// Create an array with data
	$data = "[['Chocolate', 5],['Rhubarb compote', 2],['Crêpe Suzette', 2],['American blueberry', 2],['Buttermilk', 1]]";

	// set title string
    $title = "Top 5 pancake fillings";


?>

<html>
	<head>
		<title>AnyChart 7 Sample of Simple Using AnyChart with PHP in a single PHP File</title>
    	<script src="//cdn.anychart.com/js/latest/anychart.min.js" type="text/javascript"></script> 
	    <script>
	        anychart.onDocumentLoad(function() {
	            
	            // create an instance of pie chart with data
	            var chart = anychart.pie(<?php
					// output array as string formated as JavaScript Array
					echo $data;
					?>);

	            chart.title("<? 
	            	// pass string with title text to the method
	            	echo $title;
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
