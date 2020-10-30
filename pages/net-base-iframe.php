
<!-- 
	Define an base iframe page
	Styles will be needed as they are NOT inherited
	no titles
-->
<?php
	if (! isset($_got_site_vars)) {
		$vfile = '/var/www/html/site1/scripts/site-vars.php';
		// var_dump($stat);
		// Should just use a php require here for each file
		// leaving conditions for devel debug
		$stat = include $vfile;
	    if (! $stat ) {
	    	echo "Server Error - $vfile : not accessible";
			// stop everything it's not present Server 500
			// look at server log file
			require $vfile; 
	    }
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--
    <script type="text/javascript" src='<?php echo "$scripts/graph.js"; ?>' ></script>
    -->

    <!-- Using version on css file to avoid css file not loading after changes
        If no load happens or after each change to be cautous after css change -->
    <link rel="stylesheet" href='<?php echo "$css/site-main.css?version=5"; ?>' />
    <!-- 
    	Should this stylesheet be unique or the same as site?  Styles could be separated that
    	 are used by the chart iframe only.  Colors, positions and fonts need to be
    	 maintained.
    -->

<!-- 
    <link rel="stylesheet" href='<?php echo "$css/site-fonts.css"; ?>' />

    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">

    <script src='<?php echo "$scripts/site-main.js"; ?>'> </script>
-->

  </head>
<body class="main_body">
	<div>
	<?php 
		if ($display_tchart == true) {
			echo "<h3>Example Network Traffic Data</h3>";
		} else {
			echo "<h3>User PCAPNG Datafile:  $ifile </h3>";
		}
	?>
	</div>
	<!--
	<?php echo file_get_contents("${docroot}${pages}/tst_inc.php"); ?>
	-->
	<?php 
		$dd = "${docroot}${pages}/tst_inc.php";
		include $dd;
	?>
	<script type="text/javascript" src='<?php echo "$scripts/graphTest.js"; ?>' ></script>
	<!--Div that will hold the pie chart-->
	<div class="c1" id="chart_div"></div>

    <div class="ph c1" id="chart_des">
  		<p>[PH]Amoung the information found useful when looking for performance problems or remediations is a list of what devices are using the most of the available bandwidth.  This incluses queries about individual nodes and the network elements to which they connect. Who's connecting to who and where do those nodes live.</p>
  	</div>

</body>

</html>