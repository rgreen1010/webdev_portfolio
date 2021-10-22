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

   <h1 class="develTitle">Software Development</h1>
    <div class="ph">
    	<ul class="lang_list">
	    	<li>Programming languages</li>
	    		<ul>
	    			<li>C/C++</li>
	    			<li>Java</li>
	    		</ul>
	    	<li>System Scripting languages</li>
	    		<ul>
	    			<li>Bash/Bourne shell</li>
	    			<li>C shell</li>
	    			<li>Perl</li>
	    		</ul>
	    	<li>WebClient (Browser) languages</li>
	    		<ul>
	    			<li>HTML</li>
	    			<li>CSS</li>
	    			<li>JavaScript</li>
	    		</ul>
	    	<li>WebServer Programming languages</li>
	    		<ul>
	    			<li>PHP</li>
	    			<li>Java</li>
	    		</ul>
    	</ul>
    </div>
    <div class="ph progLook">

    	<ul>
    		<li>Operating Environments</li>
				<ul>
					<li>GNU/Linux</li>
					<li>Solaris</li>
					<li>Windows</li>
				</ul>
    		<li>Development Tools</li>
    		<ul>
    			<li>Integrated Development Environments</li>
    				<ul>
    					<li>Eclipse</li>
    					<li>Visual Studio</li>
    				</ul>
    			<li>Editors</li>
    				<ul>
			    		<li>Sublime Text</li>
			    		<li>Notepad++</li>
			    		<li>gedit</li>
			    	</ul>
    		</ul>

    	    <li>Virtual Enviroments</li>
	        	<ul>
		    		<li>Oracle Virtual Box</li>
		    		<li>VMWare</li>
		    	</ul>
    	    <li>Web page Developer Tools (Builtin)</li>

    	</ul>
    </div>
    <div class="full_sep progLook">
    	<p>
    		Throughout my career, some form of software development has been a necessary professonal skill.  This includes innumerable one off shell scripts that are often needed to complete IT tasks. Projects I have worked on range from specific customer products to custom tools used by myself and my teams.  These projects have been based on several platforms and hardware architechtures,( Windows, Linux, Unix ).  Custom programs and shell scripts were always under development. Some were quick and simple and other were large projects. I have always used software to  support my efforts to meet timelines and complete large projects by applying automation into the process.  These efforts parsed and manipulated raw data to transform it into information for debugging and monitoring systems.
    	</p>
    </div>
    
    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>

</body>
