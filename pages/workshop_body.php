<body class="main_body">
	<?php
    	echo "<h1 class='banner' >Internet Technophile</h1>";
    	echo "<h3 class='banner' >Growing Web Developer</h3>";
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

   	<div class="full_sep ws1">
   		<!--
   			<p class="note">This will be a database access page. &emsp; Workshop items, supplies and tools will be displayed in tabular form. &emsp; Some user interaction like searching will be added as well.</p>
		-->
    	<ul class="ws-menu">
    		<li class="imenu"><a target="ws-iframe" <?php echo "href= ${pages}/ws-tools.php"; ?>>Woodshop Tools</a></li>
    		<li class="imenu"><a target="ws-iframe" <?php echo "href= ${pages}/ws-manuf.php"; ?>>Tool Manufacturers</a></li>
    		<li class="imenu"><a target="ws-iframe" <?php echo "href= ${pages}/ws-merch.php"; ?>>Tool Merchants</a></li>
    	</ul>

    	<iframe id="ws-iframe" name="ws-iframe" title="workshop-iframe" 
    		<?php echo "src=${pages}/ws-iframe.php"; ?> >
   			<!-- This iframe is a sketchpad for the woodshop info -->
    	</iframe>

   	</div>


<!--
    <div class="ph ws1">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="ph ws2">
    	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>

-->
    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>
</body>
