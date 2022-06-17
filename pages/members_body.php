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

  	    //*******************************************************************
  	    // ********* Authentication form NEEDS a Registration option ********
  	    //*******************************************************************
  	    $thisScript= htmlspecialchars($_SERVER['PHP_SELF']);
  	    $_mem_entries++;
  	    $dmsg = "members_body - cnt: $_mem_entries";
  	    debugLog($dmsg,"debug.log");
  	    $login_error=false;
  	    $login_msg = "";
  	    if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
  	    	//$inUserId = sanitize($_POST['username']);
  	    	// lookup $inUserId in member:user database
  	    	// if not present, invalid username

  	    	if ($DEBUGGING){
		  	    $dmsg = "members_body - session login attempts: " . $_SESSION['login_attempts'];
		  		$dmsg .= " - user: " . $_POST['username'] . " - pwd: ". $_POST['password'];
		  	    debugLog($dmsg,"debug.log");
	  		}

  	    	(!isset($_SESSION['login_attempts'])) ? 
  	    		$_SESSION['login_attempts'] = 1 : $_SESSION['login_attempts']++;

  	    	if ($_SESSION['login_attempts'] > (MAX_LOGIN_ATTEMPTS - 1) ) {
  	    		$login_error=true;
  	    		if ($DEBUGGING){
		    		$dmsg = "members_body - too many logins cnt: ". $_SESSION['login_attempts'];
		    		debugLog($dmsg,"debug.log");
		    	}
  	    		// Display a warning and notice of timer
  	    		// echo "Too many bad login attempts\n";
  	    		echo ' <div class="mlogin_container">';
  	    		echo ' <h1 class="mlogin_banner"> Too many bad login attempts</h1>';
  	    		echo ' <h2 class="mlogin_banner"> Lockout timer starting</h2>';

  	    		// if username is invalid and exceeds maximum login attempts allowed,
  	    		// set a time to allow login attempts for this user and display
  	    		// warning instead of login form

  	    		$loginStatus = validateUser($username,$password);
  	    		if ($DEBUGGING){
  	    			$dmsg = "After validateUser  loginStatus: " . $loginStatus;
  	    			debugLog($dmsg,"debug.log");
  	    		}
  	    		
  	    		$_SESSION['login_attempts'] = 1; // reset
  	    		echo '<form class="mem_login_form" method="post" action="$thisScript">';
  	    		echo '<button class="mem_login_btn" type = "submit" name = "reset">Reset</button>';
  	    		echo '</form>';
  	    		echo '</div>';
  	    		flush();
  	    		$login_error=false;
  	    	}

  	    }

		if (!isset($_SESSION['authorized']) && ! $login_error ) {
			echo ' <div class="mlogin_container">';
			echo ' <h1 class="mlogin_banner"> Authorized Access Only </h1>';
			$msg="Please enter username and password";
			#echo " <p> Session ID: $Sid </p>";
			// display login form with cancel/quit  button
			// sanitize inputs
			// validate attempt (id/password pair)
			// timer??
			
			//echo "thisScript: $thisScript";
echo <<<_EOL
		<form class="mem_login_form" method="post" action="$thisScript">
	       <p class = "mlogin_text"> $msg </p>
	        <input type = "text" class = "mem_form-ctrl" 
	           name = "username" placeholder = "Username" 
	           required autofocus></br>
	        <input type = "password" class = "mem_form-ctrl"
	           name = "password" placeholder = "password" required>
	        <button class = "mem_login_btn" type = "submit" 
	           name = "login">Login</button>
		</form>
_EOL;

			//echo ' <h3 class="mlogin_banner"> You are NOT Authorized </h3>';
 			echo " </div>";
			//die();

		} else {
			echo " Session authorized: ".$_SESSION['authorized'];
			require "${docroot}${pages}/member_content.php"; 
		}
		
   	?>


    <footer class="footer">
    	<span>&copy <?php echo date("Y");?> Internet Techophile</span>
    </footer>

</body>
