<body class="main_body net_page_font">
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

	

	<iframe id="net-chart-iframe" name="net-chart-iframe" title="net-chart-iframe" 
		<?php echo "src=${pages}/net-base-iframe.php"; ?> >
			<!-- 
				This iframe is a sketchpad for the network info 
			-->
	</iframe>


 		<div>
  			<p class="chart-msg-font bold-font" id="graph_msg">Hover over a chart segment for more details.  No more than the top 10 conversation pairs are displayed.</p>
  			<br>
  			<p>
         		To see a chart based on your captured network data, upload a CSV conversation file below.
          	<br>
          		This conversation file can be created using Wireshark or download pcapng2top application from this site.
        	</p>
  		</div>
  		<form id="csv_upload" action='<?php echo "$scripts/updateGraph.php"; ?>' 
  			  target="net-chart-iframe" 
  			  method="post" enctype="multipart/form-data">
  			<br>
  			<div>
	  			<label for="tot_pkts">Sort conversation pairs by: Total Packets:</label>
	  			<input type="radio" name="sortField" id="tot_pkts" value="tot_pkts" placeholder="total packets sort">
	  			<label for="tot_bytes">Total Bytes:</label>
	  			<input type="radio" name="sortField" id="tot_bytes" value="tot_bytes" placeholder="total bytes sort">
	  			<br>
	  			<label for="in_fname">Browse for CSV file:</label>
	  			<input type="file" id="in_fname" name="in_fname" accept=".csv, .txt">
  			</div>
  			<br>
  			<div>
  					<input type="submit" name="submitCSV" value="Upload file">
  			</div>
  			<br><br>
  		</form>
  	<div>
  		<p>Given the modern connection methodologies the type of network data that is captured is not of a general type. It will be either directed to or from the host that is performing the data capture.  Included with these directed packets will be broadcast and multicast packets that may not be associated with the capture host.  It will be rare to see captures from shared network connections, unless gathered from a network infrastructure member device or an imposed interconnect tapping device.
  		General wireless captures will be far more rare considering the interface promiscuous mode difficulties which significantly increase the cost of capturing network data from wireless environments</p>
  	</div>

    <div class="ph">
    <!--
    	<p><q>Wireshark is the world’s foremost and widely-used network protocol analyzer. It lets you see what’s happening on your network at a microscopic level and is the de facto (and often de jure) standard across many commercial and non-profit enterprises, government agencies, and educational institutions. Wireshark development thrives thanks to the volunteer contributions of networking experts around the globe and is the continuation of a project started by Gerald Combs in 1998.</q></p>
    -->
    	<a href="https://www.wireshark.org/index.html#aboutWS">
    		<img src= '<?php echo "$images/network/wireshark_logo.png"; ?>' alt="Wireshark logo" >
    	</a>
    	
    </div>
    
    <!--
        <div class="ph">
    		<img src= '<?php echo "$images/network/wireshark1.png"; ?>' alt="Wireshark capture window" style="width:500px;height:250px;">

    		<p>PLACEHOLDER Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
        </div>
    -->

    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>

</body>
