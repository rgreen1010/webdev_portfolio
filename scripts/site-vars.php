
<?php 
/*
 * Site PHP variables
 */

	if( !isset($_gotSiteGlob)) {
 
		$docroot=$_SERVER["DOCUMENT_ROOT"];

		$sroot="/site1"; // top directory of the site "site-root"
		$fpath="${docroot}${sroot}";
		$scripts="$sroot/scripts";
		$css="$sroot/css";
		$pages="$sroot/pages";
		$images="$sroot/images";
		$templates="$sroot/templates";
		//$tmpdata="$sroot/tmpdata";
		$tmpdata="/tmp";
		$data="$sroot/data";

		$ws_db="${docroot}/cfg${sroot}/db.php";
		// $ws_tool_tbl="tool";
		// $ws_merch_tbl="merchant";
		// $ws_manuf_tbl="manufacturer";

		// echo "  ws_db: $ws_db ";
		$s_url= "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		// initialize the timezone
		date_default_timezone_set('UTC');

	/* The var: display_tchart indicates if the temp chart data should be used
	 * in the pie chart. (No selection made = yes)
	 */
		$display_tchart = true;
		$_got_site_vars = true;

		/*
		 *  Error globals
		 */
		$s_error_code = 0;
		$s_error_state = 0;
		$s_error_msg="PlaceHolder message text";

		require ("$docroot/site1/scripts/site-functions.php");
	} else {
		$_gotSiteGlob = 1; /* set it */
	}

 ?>
