<body class="main_body code_font">
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
    <div class="two_column code_font">
    	<ul class="large_font">
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
    <div class="two_column code_font">

    	<ul class="large_font">
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
    					<li>IntelliJ IDEA</li>
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

    <div class="full_sep">
    	<hl>
    </div>    
    <div class="code_wrapper code_font">
    	<span class="code_banner underline-text">Java Example (simple class)</span>
    
	    <div class="code_container">
			<?php
				include_once DOCROOT.SITE_INCLUDES."/java-example1.html";
			?>
	    </div>
	</div>  
    <div class="full_sep code_font">
    	<p>
    		Ever since high school, some form of software development has been a necessary skill.  This includes programs in C/C++, Java, web pages and innumerable shell scripts that are often needed to complete IT tasks. Projects I have worked on range from specific customer products to custom tools used by myself and my teams.  These projects have been based on several platforms and hardware architechtures,( Windows, Linux, Unix ).  Custom programs and shell scripts were always under development. Some were quick and simple and other were large and more complex. I continue to use software to support my efforts to meet timelines and complete projects.  These efforts often parsed and manipulated raw system data and processed it into information for debugging and monitoring systems.
    	</p>
    </div>
    
    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>

</body>
