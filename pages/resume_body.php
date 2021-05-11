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
    	<p>  Some of the developer tools I'm using include</p>
    		<ul class="tech_list">
    			<li>Integrated Development Environments (IDE)
    				<ul>
	    				<li>Eclipse</li>
	    				<li>IntelliJ community</li>
	    				<li>Visual Studio community</li>
    				</ul>
    			</li>
    			<li>Editors
    				<ul>
	    				<li>Sublime Text</li>
	    				<li>VS Code</li>
	    				<li>Notepad++</li>
    				</ul>
    			</li>
     			<li>Browsers
    				<ul>
	    				<li>Firefox</li>
	    				<li>Chrome</li>
    				</ul>
    			</li>
     			<li>Operating Systems
    				<ul>
	    				<li>Microsoft Windows (10)</li>
	    				<li>GNU/Linux
	    					<ul>
	    						<li>CentOS/RedHat</li>
	    						<li>Ubuntu</li>
	    					</ul>
	    				</li>
    				</ul>
    			</li>
    			<li>Tools
    				<ul>
	    				<li>MySQL, phpMyAdmin</li>
	    				<li>Xming</li>
	    				<li>Putty</li>
	    				<li>Oracle VirtualBox</li>
    				</ul>
    			</li>   		   

     			<li>Programming Languages
    				<ul>
	    				<li>HTML and CSS</li>
	    				<li>PHP</li>
	    				<li>Javascript, jQuery</li>
	    				<li>C, C++</li>
	    				<li>Java</li>
    				</ul>
    			</li>
			</ul>
    </div>
    <div class="ph c2">
    	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>

</body>
