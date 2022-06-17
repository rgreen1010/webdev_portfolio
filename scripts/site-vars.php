
<?php 
/*
 * Site PHP constants
 */

/*
	Global test and set to verify this is required or included
	only once is negated by the use of php commands require_once
	or include_once 
	However, this site is adopting a protective policy by using 
	the defined() test for each constant.
 */

	include_once "/var/www/html/site1/scripts/special.php";

	$DEBUGGING="on";

	defined("SITE_TITLE") or define("SITE_TITLE", "Pre-Pub Dev Portfolio");

	defined("VAR_FILE_DIR") or define("VAR_FILE_DIR", dirname(dirname(__FILE__)));
	defined("DOCROOT") or define("DOCROOT", htmlentities($_SERVER["DOCUMENT_ROOT"]));
	defined("SITE_ROOT") or define("SITE_ROOT", "/site1");
	defined("SITE_FULLPATH") or define("SITE_FULLPATH", DOCROOT.SITE_ROOT);
	
	defined("ERRORDIR") or define("ERRORDIR", "error-pages");
	defined("ERRORDOC") or define("ERRORDOC", ERRORDIR."/err_doc.php");
	defined("ERRORDOC_500") or define("ERRORDOC_500", ERRORDIR."/500err_doc.php");
	defined("ERRORDOC_404") or define("ERRORDOC_404", ERRORDIR."/404err_doc.php");
	defined("ERRORDIV") or define("ERRORDIV", ERRORDIR."/err_div.php");

	//defined("SITE_SCRIPTS") or define("SITE_SCRIPTS", SITE_ROOT."/scripts");
	defined("SITE_SCRIPTS") or define("SITE_SCRIPTS", SITE_ROOT."/scripts");
	defined("SITE_PAGES") or define("SITE_PAGES", SITE_ROOT."/pages");
	defined("SITE_CSS") or define("SITE_CSS", SITE_ROOT."/css");
	defined("SITE_IMAGES") or define("SITE_IMAGES", SITE_ROOT."/images");
	defined("SITE_CSS") or define("SITE_CSS", SITE_ROOT."/css");
	defined("SITE_INCLUDES") or define("SITE_INCLUDES", SITE_ROOT."/includes");
	defined("SITE_TEMPLATES") or define("SITE_TEMPLATES", SITE_ROOT."/templates");
	defined("SITE_FONTS") or define("SITE_FONTS", SITE_ROOT."/fonts");
	//defined("SITE_TEMP") or define("SITE_TEMP", SITE_ROOT."/tmp");
	defined("SITE_TEMP") or define("SITE_TEMP", DOCROOT.SITE_ROOT."/logs");
	defined("SITE_DATA") or define("SITE_DATA", SITE_ROOT."/data");

	defined("PASSED") or define("PASSED", 0);
	defined("FAILED") or define("FAILED", 255);

	//const SYS_ERROR = 500;
	defined("SYS_ERROR") or define("SYS_ERROR", 5);
	//exit(status) //status value is 8 bit integer only 0-255

	defined("MAX_LOGIN_ATTEMPTS") or define("MAX_LOGIN_ATTEMPTS", 3);

	if ($DEBUGGING){
		$dmsg="****site-vars: ";
		if (isset($pageId)) {
			$dmsg .= " $pageId \n";
		} else {
			$dmsg .= " -- \n";
		}
		debugLog($dmsg,"debug.log");
	}
	//--------------------------------
/*
 * Site PHP variables
 */

	if( !isset($_got_site_vars) ) {
		// $_got_site_vars was *NOT* set yet

		if ($DEBUGGING) {
			$dmsg = "\t -- setting globals";
			debugLog($dmsg,"debug.log");
		}

		date_default_timezone_set("America/New_York");
		
		$docroot=htmlentities($_SERVER["DOCUMENT_ROOT"]);

		$sroot="/site1"; // top directory of the site "site-root"
		$fpath="${docroot}${sroot}";
		$S_siteHome = "$fpath/index.php";
		$scripts="$sroot/scripts";
		$css="$sroot/css";
		$pages="$sroot/pages";
		$images="$sroot/images";
		$templates="$sroot/templates";


		$S_convCnt = 2; // init conv table size global
		$S_siteHome = "$fpath/index.php"; // site's home landing page

		$ws_db="${docroot}/cfg${sroot}/workshop_db.php";
		$mem_db="${docroot}/cfg${sroot}/member_db.php";
		// $ws_tool_tbl="tool";
		// $ws_merch_tbl="merchant";
		// $ws_manuf_tbl="manufacturer";

		// echo "  ws_db: $ws_db ";
		$s_url= "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		// initialize the timezone
		//date_default_timezone_set('UTC');
		// date_default_timezone_set("America/New_York");

	/* The var: display_tchart indicates if the temp chart data should be used
	 * in the graph. (No selection made = yes)
	 */
		$display_tchart = true;
		$_got_site_vars = true;

		if ( !isset($_mem_entries)) {
			$_mem_entries = 100;
		} else {
			$_mem_entries *= 2;
		}
		/*
		 *  Site Error globals
		 */
		$S_SUCCESS = 1;
		$S_FAIL = 0;
		$S_TRUE = TRUE;
		$S_FALSE = FALSE;
		//------------------------------------------
		$S_error_code = 0;
		$S_error_state = 0;
		$S_error_msg=" - SYSTEM ERROR - ";
		$S_err_div_file = "${fpath}/error-pages/err_div.php";
		$S_err_doc_file = "${fpath}/error-pages/err_doc.php";

		// load the general php classes for the site
		require_once ("$docroot/site1/scripts/site-classes.php");

		// load the general php functions for the site
		require_once ("$docroot/site1/scripts/site-functions.php");
		//load the general page function for the site
		//require ("$docroot/site1/scripts/displayPage.php");
		require_once (DOCROOT.SITE_SCRIPTS."/displayPage.php");
	}

	if ($DEBUGGING){
		$dmsg = "\t -- Done  \n";
		debugLog($dmsg,"debug.log");
	}

 ?>
