
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

	 */		
		global $docroot, $pages;
		global$css, $images, $scripts, $sroot, $fpath;
		defined(SYS_ERROR) or define(SYS_ERROR, 5);
		//---------------------------------------------------------------

		echo "<!DOCTYPE html>";
		echo '<html lang="en">';
		//echo "\n";


	    //$head = strtolower("${docroot}${pages}/head.php");
	    $head = strtolower(DOCROOT.SITE_PAGES."/head.php");
		$stat = include $head;
	    if (! $stat ) {
	    	$userMsg = "Something unexpected and terrible has happened!";
			$errmsg="Server Error - $head : not accessible";
			server_err_page($userMsg);
			error_log($errmsg);
			exit(SYS_ERROR);
	    }

		/*
	    echo "<span>docroot: " . $docroot . "</span><br>";
	    echo "<span>constant docroot: " . DOCROOT . "</span><br>";
		*/
		//$body = strtolower("${docroot}${pages}/${pageId}_body.php");
		
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

