<body class="main_body net_page_font">
	<section class = "banner">
		<p class='pageBannerLine1'>
			Internet Technophile
		</p>
		<p class='pageBannerLine2'>
			Studying Network Statistics Display Options
		</p>
		<br>
	</section>

	<?php
	
		// $pg is still set indicating what page this is
		// The active indicator in the navbar also shows the page selected
		//echo "<div class='banner'>";
		//echo "<p class='pageBannerLine1'>Internet Technophile<br></p>";
		//echo "<p class='pageBannerLine2'>Studying $pg Statistics Options<br></p>";
		//echo "</div>";
    	//echo "<h1 class='banner' >Internet Technophile</h1>";
    	//echo "<h3 class='banner' >Studying Web Developer</h3>";
		
		
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

	
   	<section id="netdata_content">
		<iframe id="net-chart-iframe" name="net-chart-iframe" title="net-chart-iframe" 
			<?php echo "src=${pages}/net-base-iframe.php"; ?> >
				<!-- 
					This iframe is a sketchpad for the network info
					It will contain a graph.  The first load will be an
					example graph.
				-->
		</iframe>
	</section>
	<section id = "net_user_input">
		<div>
			<p class="graph_msg chart-msg-font bold-font" id="graph_msg">
				Hover over a chart segment for more details.  Top 10 conversation pairs are displayed.
			</p>
			<br>
			<p>
	 		To see a chart based on your captured network data, upload a <u>CSV format</u> conversation file using the form below.
	  		<br>
	  		This conversation file can be created with Wireshark or download pcapng2top application from this site.
			</p>
		</div>
	
  		<form id="csv_upload" action='<?php echo "$scripts/updateGraph.php"; ?>'
  			  target="net-chart-iframe" 
  			  method="post" enctype="multipart/form-data">
  			<br>
  			<p class="options_select">Sort conversation pairs by: </p>
  			<div class="options_select">
	  			<label for="tot_pkts">
	  				<span class="sort_field_select">Total Packets:</span>
	  			</label>
	  			<input type="radio" name="sortField" id="tot_pkts" value="tot_pkts" placeholder="total packets sort" checked>

	  			<label for="tot_bytes"><br>
	  				<span class="sort_field_select">Total Bytes:</span>
	  			</label>
	  			<input type="radio" name="sortField" id="tot_bytes" value="tot_bytes" placeholder="total bytes sort">
	  			<br>
	  			<label for="in_fname">Browse for CSV file:</label>
	  			<input type="file" id="in_fname" name="in_fname" accept=".csv, .txt" required>
  			</div>
  			<br>
  			<div id="csv_form_div">
  					<input type="submit" name="submitCSV" value="Upload file/Update Graph">
  			</div>
  		</form>
  	</section>
  	<div id="net_message">

  		<p>
  			The modern network connection technologies limit the type of available data that can be captured,(observered). This data will either be from traffic directed to or from the host that is performing the data capture or it will be from broadcast and multicast packets that are flooded onto all switch ports.  It is rare to see captures from shared network connections, unless gathered from a network infrastructure member device or an interposed tapping device.  This "Top Talkers" visualization is a very useful diagnostic tool focusing on the network usage at the point of data capture.
  		</p>
  		<hr>
   		<p>
  			The world has collectively accepted the sociological and technological behemoth that is known as the Internet.  Virtually every modern appliance is currently or will soon be "networked".  The volume and complexity of the internetworked comunications is as invisible to all. The exception is given to those with the ability to decode and view those communication streams.  That ability is granted through the use of tools like Wireshark.
  		</p>
  	</div>

    <div class="two_column">
    <!--
    	<p>
	    	<q>
	    		Wireshark is the world’s foremost and widely-used network protocol analyzer. It lets you see what’s happening on your network at a microscopic level and is the de facto (and often de jure) standard across many commercial and non-profit enterprises, government agencies, and educational institutions. Wireshark development thrives thanks to the volunteer contributions of networking experts around the globe and is the continuation of a project started by Gerald Combs in 1998.
	    	</q>
    	</p>
    -->
    	<a href="https://www.wireshark.org">
    		<img src= '<?php echo "$images/network/wireshark_logo.png"; ?>' alt="Wireshark logo" >
    	</a>
    	
    </div>
    
    <!--
        <div class="two_column">
    		<img src= '<?php echo "$images/network/wireshark1.png"; ?>' alt="Wireshark capture window" style="width:500px;height:250px;">

    		<p>PLACEHOLDER Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
        </div>
    

    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Technophile</span>
    </footer>

	-->
    <?php
		$foot = strtolower("${docroot}${pages}/footer.php");
		//echo "Page: $pg   Footer file: $foot";
		require $foot;
	?>
<!--
	<script>
		function showUpload(){
			const submitDiv = document.getElementById("csv_form_div");
			const submitInput = document.getElementById("in_fname");
			
			console.log("visibility attr: ", submitDiv);
			console.log("Input in_fname: ",submitInput);
			const visibilityMode = submitDiv.getAttribute("visibility");
			console.log("visibility attr2: ", visibilityMode);
			submitInput.addEventListener('change', updateAttr(submitDiv));
		}

		function updateAttr(e) {
			e.style.visibility = "visible";
			console.log("SET Display attr: ", e.getAttribute("visibility"));
		}		

	</script>
-->
</body>
