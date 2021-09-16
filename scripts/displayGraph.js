

  google.charts.load('current', {'packages':['corechart']});
  google.charts.load('current', {'packages':['table']});

  // Nothing until the page is loaded
  google.charts.setOnLoadCallback(drawChart); 

  function drawChart() {


    var data = initGoogleDataTableFromCsvTable();


    var options = {
      'title' : "Top Conversation Pairs by " + SortField ,
      legend: { position: "none" },
      'backgroundColor':'#a3aeb7', // --LightGreyBlue
 
      'titleTextStyle':{color: '#2c298e',fontName:'Oxygen',fontSize: 18},
      'tooltip':{textStyle: {color: '#000000'}, showColorCode: true},
      //'width':500,
      //'height':450
      'width': '49vw',
      'height': '450'
    };

    // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    // var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
    // ColumnChart
    // BarChart
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);


     // options for tables
    var cssClassNames = {
            // 'property' needs to be a defined class(es) background & font colors at least
            'headerRow': 'net-table net-tbl-bg-pale italic-font net-tbl-large-font bold-font',
            'tableRow': 'net-table net-tbl-bg-pale',
            'oddTableRow': 'net-table net-tbl-bg-med',
            'selectedTableRow': 'net-table net-tbl-large-font',
            'hoverTableRow': '',
            'headerCell': '',
            'tableCell': '',
            'rowNumberCell': 'net-table net-tbl-bg-pale net-tbl-large-font bold-font underline-text'
          };
          
    var table_options = {
      'showRowNumber': true,
      'allowHtml': true,
      'width': '49vw',
      //'width': '600', 
      //'height': '500',
      'cssClassNames': cssClassNames
      //is3D: true
    };

    // is the data in the right table format?
    var dtbl = new google.visualization.Table(document.getElementById('table_div'));
    dtbl.draw(data, table_options);
    // dtbl.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
  }

