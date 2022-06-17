
<?php
	session_start();
	$Sid = session_id();

	$pageId = "Members";

	$vfile = '/var/www/html/site1/scripts/site-vars.php';
	require_once $vfile;


    //echo 'Current script owner: ' . get_current_user() . "\n";
	if ($DEBUGGING){
		$dmsg="members.php: _mem_entries: " . $_mem_entries;
		//debugLog($dmsg,"debug.log"); #permission
		debugLog($dmsg,"debug.log");
		incCounter("member_entries");
	}
?>
<!DOCTYPE html>
<html lang="en">

<?php
    $head = strtolower("${docroot}${pages}/head.php");
	$stat = include $head;
    if (! $stat ) {
    	echo "Server Error - $head : not accessible";
		// stop everything it's not present Server 500
		// look at server log file
		require $head;
    }
?>


 <!-- Page content -->


<?php

	$body = strtolower("${docroot}${pages}/${pageId}_body.php");
	//echo "Page: $pg   Body file: $body";
	require $body;
?>

</html>
