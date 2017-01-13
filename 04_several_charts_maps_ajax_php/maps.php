<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.anychart.com/js/latest/anychart-bundle.min.js"></script>
<script>
// store json object with data
var dataArray;
var map;

// load all required data from the script
$.ajax({
  url: 'data.php',
  type: 'GET',
  // this is where we choose what is loaded
  data: 'sales=yes&brands=yes&counties=yes',
  success: function(data) {
    // called when successful
    dataArray=jQuery.parseJSON(data);
  },
  error: function(e) {
  //called when there is an error
  //console.log(e.message);
  }
});

$.ajax({
  url: 'georgia.geojson',
  type: 'GET',
  // this is where we choose what is loaded
  data: '',
  success: function(data) {
    // called when successful
    map=jQuery.parseJSON(data);
  },
  error: function(e) {
  //called when there is an error
  //console.log(e.message);
  }
});

</script>
</head>
<body>
<h1>Report Dashboard</h1>

<!-- report block start -->
<div id="report1">
  <h2>Sales report</h2>
  <div id="chart_report1" style="width:600px;height:400px;"></div>
  <script type="text/javascript">
  $(document).ajaxStop(function () {
      // create bar chart
    chart = anychart.line(dataArray["sales"]);
    chart.container('chart_report1');
    chart.title('Sales by year');
    chart.draw();
  });
  </script>
</div>
<!-- report block end -->

<!-- report block start -->
<div id="report2">
  <h2>Brands report</h2>
  <div id="chart_report2" style="width:600px;height:400px;"></div>
  <script type="text/javascript">
  $(document).ajaxStop(function () {
    // create bar chart
    chart = anychart.bar(dataArray["brands"]);
    // set container id for the chart
    chart.container('chart_report2');
    // set chart title text settings
    chart.title('Brands breakdown');
    // initiate chart drawing
    chart.draw();
  });
  </script>
</div>
<!-- report block end -->

<!-- report block start -->
<div id="report3">
  <h2>Counties report</h2>
  <div id="chart_report3" style="width:600px;height:400px;"></div>
  <script type="text/javascript">
  $(document).ajaxStop(function () {
    // create bar chart
    chart = anychart.map();
    chart.geoData(map);     
    
    var series = chart.choropleth(dataArray["counties"]);
    series.geoIdField("NAME");
  
    // set container id for the chart
    chart.container('chart_report3');
    // set chart title text settings
    chart.title('Counties');
    // initiate chart drawing
    chart.draw();
  });
  </script>
</div>
<!-- report block end -->

</body>
</html>