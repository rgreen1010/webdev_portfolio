<?php
	$pageId = "Members";
		
	$vfile = '/var/www/html/site1/scripts/site-vars.php';
	 //var_dump("network-f: ",$stat);

	$stat = include $vfile;
    if (! $stat ) {
    	$userMsg = "Something unexpected and terrible has happened!";
		$errmsg="Server Error - $vfile : not accessible";
		server_err_page($userMsg);
		error_log($errmsg);
		exit(SYS_ERROR); 

    }

   	//------------------------------------------
 
	displayPage($pageId);

?>
