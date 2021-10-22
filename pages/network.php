<!DOCTYPE html>
<html lang="en">

<?php

	$vfile = "$_SERVER[DOCUMENT_ROOT]/site1/scripts/site-vars.php";
	// var_dump($stat);
	// Should just use a php require here for each file
	// leaving conditions for devel debug
	$stat = include $vfile;
    if (! $stat ) {
		$errmsg="Server Error - $vfile : not accessible";
		server_err_page($errmsg);
		exit(500);
		// stop everything it's not present Server 500
		// look at server log file
    }

/*
    	$emsg="Server Error TEST TEST test test TeSt";

		$reload_url="/site1/index.php";
		$alert_con_class="site_error_container";
		$alert_txt_class="site_error_txt";
		$alert_btn_class="error_confirm_btn";

		server_err_alert ( $emsg, $reload_url, $alert_con_class, $alert_txt_class, $alert_btn_class);
		exit(404);

*/



    // __FILE__ is full pathname of this script with extension
	//$pg = chopExtension(__FILE__);

	//$_SERVER['PHP_SELF'] is full pathname of this file

	$pg = chopExtension($_SERVER['PHP_SELF']);
	
    $head = strtolower("${docroot}${pages}/head.php");

	$stat = include $head;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
    	$errmsg = "Server Error - $head : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(500);    	
    	//echo "$errmsg";
    	//err_stop($errmsg, 301, $S_err_doc_file);
		// stop everything it's not present Server 500
		// look at server log file
		// like require $head;
    }

	
/*    	$userMsg = "TEST TEST Something unexpected and terrible has happened!";
    	$errmsg = "TEST TEST Server Error - $head : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(500);    
*/

	$body = strtolower("${docroot}${pages}/${pg}_body.php");

	$stat = include $body;
	if (! $stat ) {
		$userMsg = "Something unexpected and terrible has happened!";
    	$errmsg = "Server Error - $body : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(500);    	
    	//echo "$errmsg";
    	//err_stop($errmsg, 301, $S_err_doc_file);
		// stop everything it's not present Server 500
		// look at server log file
		// like require $head;
    }
?>

</html>