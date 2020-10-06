

function doGraphTest() {
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

   //      var data = google.visualization.arrayToDataTable([
   //      	["Conversation Pair","Total Packets"],
   //      	["192.168.1.112/192.168.1.237",23511],
   //      	["192.168.1.211/192.168.1.237",15457], //fake
   //      	["192.168.1.47/192.168.1.11",2105], //fake
			// ["192.168.1.130/224.0.0.251",3],
			// ["192.168.1.130/192.168.1.255",2],
			// ["192.168.1.130/239.255.255.250",2],
			// ["192.168.1.1/224.0.0.1",1],
			// ["192.168.1.237/224.0.0.252",1]
   //      ]);
   		var data = get_DataTable();

        var options = {
          title: 'Top Conversation Pairs',
          'backgroundColor':'#8c7e7e',
          'titleTextStyle':{color:'#efe9b8',fontName:'Fira Code',fontSize:14},
         // 'width':450,
         // 'height':300,
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
}
