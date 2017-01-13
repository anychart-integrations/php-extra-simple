<html>
	<head>
		<title>JavaScript Line Chart Using AnyChart with PHP, AJAX and Array</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://cdn.anychart.com/js/latest/anychart.min.js"></script>
		<script>
		// store json object with data
		var dataArray;

		// load all required data from the script
		$.ajax({
		  url: 'data.php',
		  type: 'GET',
		  success: function(data) {
		    // called when successful
		    dataArray=jQuery.parseJSON(data);
		  },
		  error: function(e) {
		  //called when there is an error
		  //console.log(e.message);
		  }
		});
		</script>
	</head>
	<body>
		<h1>AnyChart Sample of Simple Using AnyChart with PHP, AJAX and Array</h1>
		<p>Please see data.php code to see how Data JSON for AnyChart is created using PHP.</p>
		<p>data.php content is loaded using jquery AJAX, any other library of your choice </p>
		<div id="chart" style="width:600px;height:400px;"></div>
		<script type="text/javascript">
		$(document).ajaxStop(function () {
		  // create line chart
		chart = anychart.line();

		lineSeries = chart.line(dataArray).name("Smartphones sold");

		chart.container("chart");
		chart.title("Number of smartphones sold to end users");
		chart.draw();
		});
		</script>
	</body>
</html>