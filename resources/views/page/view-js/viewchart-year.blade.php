<!-- FLOT CHARTS -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.categories.min.js') }}"></script>
<!-- Page script -->
<script>
  $(function () {
      
    //-------------
    //- BAR CHART -
    //-------------

    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);

    $.ajax({
      url: "{{ url('/getDataViewPageYear') }}",
      method: "GET",
      success: function(data) {
      console.log(data);
      var year = [];
      var welcome_count = [];
      var registration_count = [];
      var shopping_count = [];
      var order_count = [];
      var other_count = [];
      
      for(var i in data) {
          year.push(data[i].year);
          welcome_count.push(data[i].welcome_count);
          registration_count.push(data[i].registration_count);
          shopping_count.push(data[i].shopping_count);
          order_count.push(data[i].order_count);
          other_count.push(data[i].other_count);
      }

      var barChartData = {
        labels: year,
        datasets: [
          {
            label: "Welcome",
            fillColor: "#f56954",
            strokeColor: "#f56954",
            pointColor: "#f56954",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#f56954",
            data: welcome_count
          },
          {
            label: "Registration",
            fillColor: "#00a65a",
            strokeColor: "#00a65a",
            pointColor: "#00a65a",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#00a65a",
            data: registration_count
          },
          {
            label: "Shopping",
            fillColor: "#f39c12",
            strokeColor: "#f39c12",
            pointColor: "#f39c12",
            pointStrokeColor: "#f39c12",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#f39c12",
            data: shopping_count
          },
          {
            label: "Order",
            fillColor: "#00c0ef",
            strokeColor: "#00c0ef",
            pointColor: "#00c0ef",
            pointStrokeColor: "#00c0ef",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: order_count
          },
          {
            label: "Other",
            fillColor: "#3c8dbc",
            strokeColor: "#3c8dbc",
            pointColor: "#3c8dbc",
            pointStrokeColor: "#3c8dbc",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#3c8dbc",
            data: other_count
          }
        ]
      };

      barChartData.datasets[1].fillColor = "#00a65a";
      barChartData.datasets[1].strokeColor = "#00a65a";
      barChartData.datasets[1].pointColor = "#00a65a";
      var barChartOptions = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke: true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        //Boolean - whether to make the chart responsive
        responsive: true,
        maintainAspectRatio: true
      };

    barChartOptions.datasetFill = false;  
    barChart.Bar(barChartData, barChartOptions);
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    lineChartOptions.datasetFill = false;
    lineChart.Line(barChartData, lineChartOptions);
  }
  });

    
});
</script>