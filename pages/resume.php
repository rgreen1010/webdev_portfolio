<!DOCTYPE html>
<html lang="en">

<?php
	$pageId = "Resume";

	$vfile = '/var/www/html/site1/scripts/site-vars.php';
	// var_dump($stat);
	// Should just use a php require here for each file
	// leaving conditions for devel debug
	$stat = include $vfile;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
		$errmsg="Server Error - $vfile : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(500); 
    }


    $head = strtolower("${docroot}${pages}/head.php");
	$stat = include $head;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
		$errmsg="Server Error - $head : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(500);
    }



 	//<!-- Page content -->



	$body = strtolower("${docroot}${pages}/${pageId}_body.php");
	//echo "Page: $pageId   Body file: $body";
	$stat = include $body;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
		$errmsg="Server Error - $body : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(500);
    }
?>

</html>