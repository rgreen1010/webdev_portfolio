<!DOCTYPE html>
<html lang="en">

<?php

	$vfile = '/var/www/html/site1/scripts/site-vars.php';
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

    // __FILE__ is full pathname of this script with extension
	//$pg = chopExtension(__FILE__);

	//$_SERVER['PHP_SELF'] is full pathname of this file

	$pg = chopExtension($_SERVER['PHP_SELF']);
	
    $head = strtolower("${docroot}${pages}/head.php");

	$stat = include $head;
    if (! $stat ) {
    	$errmsg = "Server Error - $head : not accessible";
    	echo "$errmsg";
    	err_stop($errmsg, 301, $S_err_doc_file);
		// stop everything it's not present Server 500
		// look at server log file
		// like require $head;
    }

	
	$body = strtolower("${docroot}${pages}/${pg}_body.php");

	require $body;
?>

</html>