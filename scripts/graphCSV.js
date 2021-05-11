
   
/*
    $(document).ready(function(){
        $("#in_fname").change(function(e){
            csvUrl = e.target.files[0].name;
            alert('The file "' + csvUrl +  '" has been selected.');
        });
    });

*/
function doGraphCSV() {
      var csvUrl = document.getElementById('in_fname').files[0].name;
      var inFile = document.getElementById('in_fname').files[0];
       
      alert('The file "' + csvUrl +  '" has been selected.');

      const reader = new FileReader(csvUrl);

      reader.readAsText(inFile);

      alert(reader.result);

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var queryOptions = {
          csvColumns: ['string', 'string', 'number', 'number', 'number', 'number', 'number', 'number'],
          csvHasHeader: true /* This should be false if your CSV file doesn't have a header */
        }

        alert('The file "' + csvUrl +  '" before query');
        // var query = new google.visualization.Query(csvUrl, queryOptions);
        var query = new google.visualization.Query(csvUrl, queryOptions);

        query.send(handleQueryResponse);

        function handleQueryResponse(response) {

          if (response.isError()) {
            alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
            return;
          }

          var data = response.getDataTable();
          // Draw your chart with the data table here.
                  // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
          chart.draw(data, queryOptions);
        }


      }
}