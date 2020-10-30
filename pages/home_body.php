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
    <div class="ph c1">
    	<p>Collectively the pages in this site will tell a web site development story.  I am not a graphic artist, my feeble art skills are not germane to my efforts here.  This is more about a technological journey.  Reconnecting to some part of what excited me about computing when I first learned Basic in high school. Learning and refreshing programming skills and online content presentment using web technologies like JavaScript (ECMAScript), jQuery, PHP, Java, HTML5 and CSS3. Database technology is represented by MySQL</p>
    </div> 
    <div class="ph c2">
    	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>

</body>
