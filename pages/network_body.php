<body class="main_body">
	<?php


		echo "<div class='banner'>";
		echo "<p id='banl1'>Internet Technophile<br></p>";
		echo "<p id='banl2'>Studying Web Development<br></p>";
		echo "</div>";
    	//echo "<h1 class='banner' >Internet Technophile</h1>";
    	//echo "<h3 class='banner' >Growing Web Developer</h3>";
		//$docroot=$_SERVER["DOCUMENT_ROOT"];
		
		//$nav_file = '/var/www/html/site1/pages/nav.php';
		$nav_file = "${docroot}${pages}/nav.php";
		// var_dump($nav_file);
		$stat = include $nav_file;
		// var_dump($stat);
		// Should just use a php require here for each file
		// leaving conditions for devel debug
	    if (! $stat ) {
			echo " <div class='navbar_error'>";
			echo "Server Error - $nav_file : not accessible";
		    echo "</div>";
		    // stop everything it's not present Server 500
		    // look at server log file
		    require $nav_file; 
  	    }


   	?>

	<?php echo file_get_contents("${docroot}${pages}/tst_inc.html"); ?>
	<script type="text/javascript" src='<?php echo "$scripts/graphTest.js"; ?>' ></script>
	
	<!--Div that will hold the pie chart-->
	<div class="c1" id="chart_div"></div>

    <div class="ph c1" id="chart_des">
  		<p>Amoung the information found useful when looking for performance problems or remediations is a list of what devices are using the most of the available bandwidth.  This incluses queries about individual nodes and the network elements to which they connect. Who's connecting to who and where do those nodes live.</p>
  	</div>
  	<div class="full_sep">
  		<!--
  			<button id="btn1">Show MSG</button>  <button id="btn2">Clear MSG</button>  <span id="btn_hlite"></span>
  		-->
  		<p id="graph_msg">Message about the graph here.</p>
  		<form>
  			<br>
  			<label for="in_fname">Input CSV file name:</label>
  			<input type="file" id="in_fname" name="in_fname" accept=".csv, .txt" oninput="doGraphTest()">
  			<br><br>
  		</form>
  		<p>Given the modern connection methodologies the type of network data that is captured is not of a general type. It will be either directed to or from the host that is performing the data capture.  Included with these directed packets will be broadcast and multicast packets that may not be associated with the capture host.  It will be rare to see captures from shared network connections, unless gathered from a network infrastructure member device or an imposed interconnect tapping device.
  		General wireless captures will be far more rare considering the interface promiscuous mode difficulties which significantly increase the cost of capturing network data from wireless environments</p>
  	</div>

    <div class="ph c1">
    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    	<a href="https://www.wireshark.org/index.html#aboutWS">
    		<img src= '<?php echo "$images/network/wireshark_logo.png"; ?>' alt="Wireshark logo" >
    	</a>
    	
    </div>
    <div class="ph">
    	<img src= '<?php echo "$images/network/wireshark1.png"; ?>' alt="Wireshark capture window" style="width:500px;height:250px;">
    <!--
    	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    -->
    </div>
    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>

</body>
