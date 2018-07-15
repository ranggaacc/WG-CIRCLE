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
      
    $.ajax({
      url: "{{ url('/getDataClickMonth') }}",
      method: "GET",
      success: function(data) {
      console.log(data);
      var month = [];
      var login_count = [];
      var save_count = [];
      var close_count = [];
      var delete_count = [];
      var other_count = [];
      
      for(var i in data) {
          month.push(data[i].month);
          login_count.push(data[i].login_count);
          save_count.push(data[i].save_count);
          close_count.push(data[i].close_count);
          delete_count.push(data[i].delete_count);
          other_count.push(data[i].other_count);
      }

      if(month.length > 7) {
          month.shift();
          login_count.shift();
          save_count.shift();
          close_count.shift();
          delete_count.shift();
          other_count.shift();
      }

      var lineChartData = {
        labels: month,
        datasets: [
          {
            label: "Login",
            fillColor: "#f56954",
            strokeColor: "#f56954",
            pointColor: "#f56954",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#f56954",
            data: login_count
          },
          {
            label: "Save",
            fillColor: "#00a65a",
            strokeColor: "#00a65a",
            pointColor: "#00a65a",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#00a65a",
            data: save_count
          },
          {
            label: "Close",
            fillColor: "#f39c12",
            strokeColor: "#f39c12",
            pointColor: "#f39c12",
            pointStrokeColor: "#f39c12",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#f39c12",
            data: close_count
          },
          {
            label: "Delete",
            fillColor: "#00c0ef",
            strokeColor: "#00c0ef",
            pointColor: "#00c0ef",
            pointStrokeColor: "#00c0ef",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: delete_count
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
    lineChart.Line(lineChartData, lineChartOptions);
  }
  });

    
});
</script>