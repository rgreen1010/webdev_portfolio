<body class="main_body site_font">
	<?php
    	echo "<h1 class='banner' >Internet Technophile</h1>";
    	echo "<h3 class='banner' >Growing Web Developer</h3>";
		//$docroot=$_SERVER["DOCUMENT_ROOT"];
		
		//$nav_file = '/var/www/html/site1/pages/nav.php';
		$nav_file = "${docroot}${pages}/nav.php";
		require $nav_file;
		// var_dump($nav_file);
		//$stat = include $nav_file;
		// var_dump($stat);
		// Should just use a php require here for each file
		// leaving conditions for devel debug
	    //if (! $stat ) {
		//	echo " <div class='navbar_error'>";
		//	echo "Server Error - $nav_file : not accessible";
		//    echo "</div>";
		//    // stop everything it's not present Server 500
		//    // look at server log file
		//    require $nav_file; 
  	    //}

   	?>

   	<div class="full_bg jcode">
   		<div class="transbox_80">
   			<p class="transbox_txt">
   				Collectively the pages in this site tell a web site development story.  I am not a graphic artist, my feeble art skills are not germane to my efforts here.  This is more about a technological journey.  It's about reconnecting to some part of what excited me about computing when I first learned to write games and other applications in BASIC during high school. To do this, I'm learning and refreshing technical skills and web technologies and programmng languages like JavaScript(ECMAScript), PHP, Java, HTML and CSS. Database technology is represented by MySQL.
   			</p>
   		</div>
   	</div>
    <div class="note">
    	<p>
			I have started this project as a reset button.  Several years ago, I started as a Software engineer.  Fortran, C and scripting were my primary programming language tools.  Over time I have added professional work experience in Systems Engineering and Network Engineering.  I managed to achieve senior levels in those disciplines. That effort was enhanced by expanding my developement skills in order to meet their challenges. I enjoy applying these technologies and disciplines in solutions to both personal and business projects.  My diverse experience has allowed me to effectively participate in most aspects of Information Technology projects.  This site should evolve as my knowledge grows and skills improve.
		</p>
    </div> 
    
    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>


</body>
