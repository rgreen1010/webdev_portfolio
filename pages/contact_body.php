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


    <div class="ph c1">
    	<h1>Time</h1>
    	<ul id="Time">
    		<li>
    		Ticking away the moments that make up a dull day
    		</li>
			<li>
			You fritter and waste the hours in an offhand way.
			</li>
			<li>
			Kicking around on a piece of ground in your home town
			</li>
			<li>
			Waiting for someone or something to show you the way.
			</li>
			<li>
		  	Tired of lying in the sunshine staying home to watch the rain.
		  	</li>
			<li>
			You are young and life is long and there is time to kill today.
			</li>
			<li>
			And then one day you find ten years have got behind you.
			</li>
			<li>
			No one told you when to run, you missed the starting gun.
			</li>
			<li>
		  	So you run and you run to catch up with the sun but it's sinking
		  	</li>
			<li>
			Racing around to come up behind you again.
			</li>
			<li>
			The sun is the same in a relative way but you're older,
			</li>
			<li>
			Shorter of breath and one day closer to death.
			</li>
			<li>
		  	Every year is getting shorter never seem to find the time.
		  	</li>
			<li>
			Plans that either come to naught or half a page of scribbled lines
			</li>
			<li>
			Hanging on in quiet desperation is the English way
			</li>
			<li>
			The time is gone, the song is over, Thought I'd something more to say.
			</li>
		</ul>
    </div>
    <div class="ph c2">
    	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>

</body>
