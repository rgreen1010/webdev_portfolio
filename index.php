<!DOCTYPE html>
<html lang="en">
<?php

	$pageId = "Home"; // Page name id
	
	$vfile = $_SERVER['DOCUMENT_ROOT'] . "/site1/scripts/site-vars.php";
	// var_dump($vfile);
	// Should just use a php require here for each file
	// leaving conditions for devel debug
	$stat = include $vfile;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
		$errmsg="Server Error - $vfile : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(SYS_ERROR);
    }


    $head = strtolower("${docroot}${pages}/head.php");
	$stat = include $head;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
		$errmsg="Server Error - $head : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(SYS_ERROR);
    }


	$body = strtolower("${docroot}${pages}/${pageId}_body.php");
	$stat = include $body;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
		$errmsg="Server Error - $body : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(SYS_ERROR);
    }

?>

</html>