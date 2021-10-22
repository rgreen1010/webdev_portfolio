<!DOCTYPE html>

<!-- 
	Define an base network iframe page
	Styles will be needed as they are NOT inherited
	no titles
-->


<html lang="en">


<?php
/*
 *  This is a sub-network page, a container for the dynamic user 
 * data presentation elements
 */
		$pg = "Network";

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

?>

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
    <link rel="stylesheet" href='<?php echo "$css/site-main.css?version=9"; ?>' />

  </head>

<body class="iframe_main_body site_font">
	<div id="net_container">
		<div>
		<?php
			if ($display_tchart == true) {
				echo "<h3>Example Network Traffic Data</h3>";
				$desc="Amoung the useful information when looking for performance problems or remediations is a list of what devices are using the available bandwidth. This includes queries about individual nodes and the network elements to which they connect.";
			} else {
				echo "<h3>User uploaded PCAPNG Datafile [ $S_convCnt ]:  $ifile </h3>";
				$desc="10 most active network conversations found in user file:  $ifile";
			}
		?>
		</div>

		<?php 
			$sfile = "${docroot}${scripts}/initNetTable.php";
			include $sfile;
		?>
		<script type="text/javascript" src='<?php echo "$scripts/displayGraph.js"; ?>' ></script>
		<!--
			Div id="chart_div" will hold the graph
			Div id="net_table_div" will hold the graphs data table
		-->
		<div class="two_column" id="chart_div"></div>
		<div class="net_table_div two_column" id="table_div"></div>

		<!--
	    Div id="chart_des" will hold a textual description of the graph/table data
	   -->
	    <div class="two_column" id="chart_des">
	  		<p><?php echo "$desc"; ?></p>
	  	</div>
	</div>
</body>

</html>