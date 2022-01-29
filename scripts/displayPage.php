
<?php
	function displayPage($pageId){

	/*

		$vfile = '/var/www/html/site1/scripts/site-vars.php';
		$stat = include $vfile;
	    if (! $stat ) {
	    	$userMsg = "Something unexpected and terrible has happened!";
			$errmsg="Server Error - $vfile : not accessible";
			server_err_page($userMsg);
			error_log($errmsg);
			exit(SYS_ERROR); 
	    }

	 */
	/*
		---------------------------------------------------------------
		 if site-vars are not included here, globals must be declared 
		 to pull into and pass through this function

		 	-*- Most of the globals were paths and are being converted
			 to constants
	 */		
		global $docroot, $pages;
		global $css, $images, $scripts, $sroot, $fpath;
		defined(SYS_ERROR) or define(SYS_ERROR, 5);
		//---------------------------------------------------------------

		echo "<!DOCTYPE html>";
		echo '<html lang="en">';
		//echo "\n";

	    $head = strtolower(DOCROOT.SITE_PAGES."/head.php");
		$stat = include $head;
	    if (! $stat ) {
	    	$userMsg = "Something unexpected and terrible has happened!";
			$errmsg="Server Error - $head : not accessible";
			server_err_page($userMsg);
			error_log($errmsg);
			exit(SYS_ERROR);
	    }
		
		$body = strtolower(DOCROOT.SITE_PAGES."/${pageId}_body.php");
		$stat = include $body;
	    if (! $stat ) {
	    	$userMsg = "Something unexpected and terrible has happened!";
			$errmsg="Server Error - $body : not accessible";
			server_err_page($userMsg);
			error_log($errmsg);
			exit(SYS_ERROR);
	    }

	    echo "</html>";

	    return;
	}
?>

