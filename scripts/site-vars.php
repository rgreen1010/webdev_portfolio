
<?php 
/*
 *
 */


 
$docroot=$_SERVER["DOCUMENT_ROOT"];

$sroot="/site1";
$fpath="${docroot}${sroot}";
$scripts="$sroot/scripts";
$css="$sroot/css";
$pages="$sroot/pages";
$images="$sroot/images";

$ws_db="${docroot}/cfg${sroot}/db.php";
// $ws_tool_tbl="tool";
// $ws_merch_tbl="merchant";
// $ws_manuf_tbl="manufacturer";

// echo "  ws_db: $ws_db ";
$s_url= "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

 ?>
