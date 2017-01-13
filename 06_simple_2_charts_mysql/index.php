<?php


	// This is a very basic sample of using AnyChart with PHP and MySQL using a single PHP file

	// avoid cache
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    // need this for json_encode for early versions of php
    require 'jsonwrapper.php';

	// set titles string
    $title1 = "Orders by product";
    $title2 = "Orders by date";

	// configure connection to your database
	// data from dump.sql should be added to
	// your database in order for this sample
	// to work 

	$MYSQL['host'] = "";
	$MYSQL['user'] = "";
	$MYSQL['password'] = "";

	// this is the db name from dump.sql, change it accordingly if you have altered it
	$MYSQL['database'] = "anychart_sample_database";

	$connect = mysql_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password']);
	mysql_select_db($MYSQL['database'], $connect);

	if (!$connect) {
	    die('Could not connect: ' . mysql_error());
	}	

	// select amount of orders from 2 tables
	// argument should be selected as 'x'
	// value should be selected as 'value'

	$res = mysql_query("SELECT `name` as `x`, sum(`volume`) as `value` FROM `anychart_sample_products` JOIN `anychart_sample_orders` where anychart_sample_products.id=anychart_sample_orders.product_id group by anychart_sample_products.id", $connect);

	$products = Array();

	// Loop through and populate an array
	while ($product = mysql_fetch_assoc($res))
	$products[] = $product;

	// Make another query to get sum orders by date
	// argument should be selected as 'x'
	// value should be selected as 'value'

	$productOrders = mysql_query('SELECT `date` AS `x`, sum(`volume`) AS `value` FROM `anychart_sample_orders` GROUP BY `date` ORDER BY `date` ASC', $connect);

	$data = Array();

	// Loop through and populate an array
	while ($order = mysql_fetch_assoc($productOrders)) 
  	$data[] = $order;

	mysql_close($connect);
?>

<html>
	<head>
		<title>AnyChart Sample of Simple Using AnyChart with PHP and MySQL Database</title>
    	<script src="//cdn.anychart.com/js/latest/anychart.min.js" type="text/javascript"></script> 
	    <script>
	        anychart.onDocumentLoad(function() {


	            // create an instance of a pie chart with data
	            var chart1 = anychart.pie(<?php
					// output array as JSON Array
					echo json_encode($products);
					?>);

	            chart1.title("<? 
	            	// pass string with title text to the method
	            	echo $title1;
	            	?>");

	            // adjust chart legend
	            chart1.legend().position("top");

	            // pass the container where chart will be drawn
	            chart1.container("container1");
	            // call the chart draw() method to initiate chart drawing
	            chart1.draw();	        	
	            
	            // create an instance of a column chart with data
	            var chart2 = anychart.column(<?php
					// output array as string formated as JavaScript Array
					echo json_encode($data);
					?>);

	            chart2.title("<? 
	            	// pass string with title text to the method
	            	echo $title2;
	            	?>");

	            chart2.getSeriesAt(0).name("Orders");

	            // pass the container where chart will be drawn
	            chart2.container("container2");
	            // call the chart draw() method to initiate chart drawing
	            chart2.draw();
	        });
	    </script>    	
	</head>
	<body>
		<h1>AnyChart Sample of Simple Using AnyChart with PHP and MySQL Database</h1>
		<p>Please see index.php code to see how data for AnyChart is created using PHP.</p>
    	<div id="container1" style="width: 500px; height: 400px;"></div>
    	<div id="container2" style="width: 500px; height: 400px;"></div>

	</body>
</html>