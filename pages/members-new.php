
<?php
	session_start();
	$Sid = session_id();
	echo " \n Session ID: $Sid \n";
	$pageId = "Members";

	//$vfile = '/var/www/html/site1/scripts/site-vars.php';
	$vfile = $_SERVER['DOCUMENT_ROOT'] . "/site1/scripts/site-vars.php";
	// var_dump($stat);
	// Should just use a php require here for each file
	// leaving conditions for devel debug
	$stat = include $vfile;
    if (! $stat ) {
    	echo "Server Error - $vfile : not accessible";
		// stop everything it's not present Server 500
		// look at server log file
		require $vfile; 
    }

echo "<!DOCTYPE html>";
echo '<html lang="en">';
	

    $head = strtolower("${docroot}${pages}/head.php");
	$stat = include $head;
    if (! $stat ) {
    	echo "Server Error - $head : not accessible";
		// stop everything it's not present Server 500
		// look at server log file
		require $head;
    }

	while(!isset($_SESSION['authenticated'])) {
		//do authentication and set appropriate session vars
		// display access warning message
		// display
	}
	// if we got here, we're authenticated   

 <!-- Page content -->



	
	$body = strtolower("${docroot}${pages}/${pageId}_body.php");
	//echo "Page: $pageId   Body file: $body";
	require $body;


</html>
?>
