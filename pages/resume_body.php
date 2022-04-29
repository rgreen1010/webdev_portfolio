<body class="main_body monospace-font">
	<?php

		//echo '<span>constant TRUE: ' . TRUE . "</span><br>";
		//var_dump(FALSE);
		//echo '<span>constant FALSE: ' . FALSE . "</span><br>";

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
	    				<li>Microsoft Windows</li>
	    				<li>GNU/Linux
	    					<ul>
	    						<li>CentOS/RedHat</li>
	    						<li>Ubuntu</li>
	    					</ul>
	    				</li>
	    				<li>Solaris</li>
    				</ul>
    			</li>
    			<li>Tools
    				<ul>
	    				<li>MySQL, phpMyAdmin</li>
	    				<li>Xming</li>
	    				<li>Putty</li>
	    				<li>Oracle VirtualBox</li>
	    				<li>Wireshark</li>
    				</ul>
    			</li>   		   

     			<li>Programming Languages
    				<ul>
	    				<li>HTML and CSS</li>
	    				<li>PHP</li>
	    				<li>Java</li>
	    				<li>Javascript, jQuery</li>
	    				<li>C, C++</li>
    				</ul>
    			</li>
			</ul>
    </div>


    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>

</body>
