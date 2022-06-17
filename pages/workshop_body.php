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
		    // stop everything it's not ptool-hardware-cart.jpgresent Server 500
		    // look at server log file
		    require $nav_file; 
  	    }

   	?>

   	<div class="full_sep ws1">
   		<?php 
   			echo "<img src=\" $images/tool-hardware-cart.jpg \" width=\"500\" height=\"600\">";
   			echo "</img>";
   		?>

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



    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>
</body>
