

function doGraphTest() {
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {


      var data = get_CSVTable();

        var options = {
          'title' : "Top Conversation Pairs by " + SortField ,
          'backgroundColor':'#8c7e7e',
          'titleTextStyle':{color:'#efe9b8',fontName:'Fira Code',fontSize:12},
         'width':475,
         'height':400,
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
  return;
}

doGraphTest();