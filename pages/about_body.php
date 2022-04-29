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


    <div class="two_column">
    	<h1>About me</h1>
		<div>
			<ul class="topic_list">  
				<li class="topic_item">
					Professionally I have had a diverse IT career.  I started in software engineering, adding systems 
					engineering and then network engineering. I was able to achieve senior level in all three disiplines.
				</li>
				<li class="topic_item">
					Outside interests included photography, skiing, fishing, fly fishing, fly tying and tackle craft
					and woodworking.
				</li>
			</ul>
		</div>

    </div>
    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>

</body>
