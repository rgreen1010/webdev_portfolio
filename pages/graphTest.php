

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	["Conversation Pair","Total Packets"],
        	["192.168.1.112/192.168.1.237",23511],
			["192.168.1.130/224.0.0.251",3],
			["192.168.1.130/192.168.1.255",2],
			["192.168.1.130/239.255.255.250",2],
			["192.168.1.1/224.0.0.1",1],
			["192.168.1.237/224.0.0.252",1]
        ]);

        var options = {
          title: 'Top Conversation Pairs'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
