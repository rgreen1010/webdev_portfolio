
<?php
	// echo exec('id');
	$pg = "Home"; // Page name id

	// echo "PHP_SELF: " . $_SERVER['PHP_SELF'] ;
	
	$vfile = $_SERVER['DOCUMENT_ROOT'] . "/site1/scripts/site-vars.php";
	// var_dump($vfile);
	// Should just use a php require here for each file
	// leaving conditions for devel debug
	$stat = include $vfile;
    if (! $stat ) {
    	echo "Server Error - $vfile : not accessible";
    	// This require will 
		// stop everything it's not present Server 500
		// look at server log file
		require $vfile; 
    }


?>
<!DOCTYPE html>
<html lang="en">

<?php
    $head = strtolower("${docroot}${pages}/head.php");
	$stat = include $head;
    if (! $stat ) {
    	echo "Server Error - $head : not accessible";
    	// This require will 
		// stop everything it's not present Server 500
		// look at server log file
		require $head;
    }
?>


 <!-- Page content -->



<?php
	$body = strtolower("${docroot}${pages}/${pg}_body.php");
	// echo "Page: $pg   Body file: $body";
	require $body;
?>

</html>