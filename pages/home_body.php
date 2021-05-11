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

   	<div class="full_bg jcode">
   		<div class="transbox_80">
   			<p class="transbox_txt">
   				Collectively the pages in this site tell a web site development story.  I am not a graphic artist, my feeble art skills are not germane to my efforts here.  This is more about a technological journey.  It's about reconnecting to some part of what excited me about computing when I first learned to write programs in Basic during high school. To do this I'm learning and refreshing programming skills and online content presentment using web technologies like JavaScript (ECMAScript), jQuery, PHP, Java, HTML5 and CSS3. Database technology is represented by MySQL
   			</p>
   		</div>
   	</div>
    <div class="note">
    	<p>I'm jumping into this pool as a reset button.  Several years ago, I started as a Software engineer.  Over time I have added professional work experience in Systems Engineering and Network Engineering.  I enjoy technology and applying it as a solution or as a foundation for transforming data into desired information.  Having this diverse experience has allowed me to interface and participate in all aspects of Information Technology projects.</p>
    </div> 


</body>
