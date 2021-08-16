
<?php 
/*
 * Site PHP variables
 */

	if( !isset($_got_site_vars) ) {
		// $_got_site_vars was *NOT* set yet
		
		$docroot=$_SERVER["DOCUMENT_ROOT"];

		$sroot="/site1"; // top directory of the site "site-root"
		$fpath="${docroot}${sroot}";
		$S_siteHome = "$fpath/index.php";
		$scripts="$sroot/scripts";
		$css="$sroot/css";
		$pages="$sroot/pages";
		$images="$sroot/images";
		$templates="$sroot/templates";

		//$tmpdata="$sroot/tmpdata";
		$tmpdata="$sroot/tmp";
		$data="$sroot/data";

		$S_convCnt = 2; // init conv table size global
		$S_siteHome = "$fpath/index.php"; // site's home landing page

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
		 *  Site Error globals
		 */
		$S_error_code = 0;
		$S_error_state = 0;
		$S_error_msg=" - SYSTEM ERROR - ";
		$err_div_file = "${fpath}/error-pages/err_div.php";

		// load the general php functions for the site
		require ("$docroot/site1/scripts/site-functions.php");
	}

 ?>
