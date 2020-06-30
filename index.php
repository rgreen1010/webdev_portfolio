
<?php
	$pg = "Home";

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
	
	$body = strtolower("${docroot}${pages}/${pg}_body.php");
	//echo "Page: $pg   Body file: $body";
	require $body;
?>

</html>