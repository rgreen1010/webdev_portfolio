<?php
	
/*
 ***********************************************************************************
 * err_stop --  Primary error then exit function
 ***********************************************************************************
 		param: $message - String containing the descriptive/context based error message
 		param: $exit_code - integer indicating the exact or class of error
 		param: $err_doc_file - filename of a self contained error page document
 ***********************************************************************************
 * checks file indicated by $err_doc_file is readable/existent before performing the
 * include.  If not there, a default message indicating missing err_doc
 * FUNCTION DOES NOT RETURN, BUT TERMINATES WITH AN ERROR CODE 
 ***********************************************************************************
 */
	function err_stop($message, $exit_code, $err_doc_file) {
		  // var_dump("err_doc_file ", $err_doc_file);
		  global $fpath, $sroot, $pages, $S_error_msg, $pg, $S_err_doc_file;
	      if(is_readable($err_doc_file)) {
	        echo "<hr>$message<hr>";
	        include $err_doc_file; // Display full error page
	      } else {
	      	echo "<hr>ERROR - $message<hr>";
	        echo "$err_doc_file was unreadable/missing<hr>";
	        //exit($exit_code);
	      }
	      error_log("Internal Server Error - $message",0);  // log the error
	      // Indicate a server error occured
		  header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	      exit($exit_code);
	}


function chopExtension($filename) {
    //return substr($filename, 0, strrpos($filename, '.'));
    $f = basename($filename);
    return substr( $f, 0, strrpos($f, '.') );
}


/*
 *
 * includeFile ---
 *	param: $ifile - filename to be included
 *
 * Interacts with global variables set elsewhere
 *
 * 	Adds error handling to file inclusion
 *
 *   
 */
function includeFile( $ifile ) {
	global $S_TRUE, $S_FALSE, $S_err_doc_file, $pg;
	global $sroot, $pages, $active; // Passthrough for navbar

	$retVal = $S_FALSE;

	if(is_readable($ifile)) {
        include $ifile; // 
        $retVal = $S_TRUE;
	} else {
		// Indicate a server error occured
		$message = "ERROR - unreadable/missing file: $ifile";
		//var_dump("S_err_doc_file: $S_err_doc_file");
		err_stop($message, 4041, $S_err_doc_file); // Doesn't return - read error
	    //echo "$message";
	    //error_log("Internal Server Error - $message",0);  // log the error
	    // no temination of the page, flag it and continue..(?)
	    // could inject an inclusion of a error page here with err_stop
    }

    return $retVal;
}


/*
 *
 * user_alert --- 
 *		Drops a javascript script section to display an alert
 *	param: $message - Text string to be displyed in an alert box
 *   
 */
function user_alert($message) {   

    // Use a JS script in HTML doc to display the alert box 

    // echo "<script>alert('$message');</script>";
	// parent object refers to the main network page and allows
	// the site-main functions to be available to the targeted iframe
	// without loading extra JS files into the iframe, potentially 
	// reducing performance/ increasing load time
    echo "<script>parent.displayAlert('$message');</script>";
    return;
} 

/*
 *
 * system_err_page ---
 *		uses php to display a 500ish error page
 *	param: $msg - Text string to be displyed in an alert box
 *   
 */
function server_err_page ( $msg ){
	global $S0_error_msg;


	// Ensure this alert will overlay whatever has been displayed
	// button should turn turn display off?
	if (isset($S0_error_msg)){
		$S0_error_msg .= $msg;
	} else {
		$S0_error_msg = $msg;
	}
	// $S0_error_msg will be used by the err doc page
	$errDoc = "$_SERVER[DOCUMENT_ROOT]/site1/error-pages/err_doc.php";
	//var_dump(" in server_err_page: $errDoc");
	require $errDoc;
	/*
	 * Should check the status of the include?
	 * Perhaps a PHP function to write the error doc file in
	 * it's entirety? Are "here documents" available in PHP?
	 */
	return;
}


/*
 *
 * server_err_alert ---
 *		uses php to display an alert and button
 *	param: $msg - Text string to be displyed in an alert box
 *  param: $reload_url - reletive or abs path to a site page
 *  param: $alert_con_class - CSS class for alert container
 *  param: $alert_txt_class - CSS class for alert message text
 *  param: $alert_btn_class - CSS class for alert ack button
 *   
 */
function server_err_alert ( $msg, $reload_url, $alert_con_class, $alert_txt_class, $alert_btn_class){
	// Ensure this alert will overlay whatever has been displayed
	// button should turn turn display off?
	echo '<div class="'.$alert_con_class.'">';
	echo '<span class="'.$alert_txt_class.'">'.  $msg .' </span>';
	echo '<a href="'.$reload_url.'"> <button type="button">Reload</button></a>';
	echo '</div>';

	return;
}

/*
 *
 * dumpTable2File --- Take a conversation pair table and headers
 *					and outputs it in the specified file
 *    			(Useful for debug on the Network page)
 * -------------------------------
 *	param: $cpTable - conversation pair table
 *	param: $tableHdr - Table header (2 element array)
 *	param: $dtFilename - data table (output file name)
 *
 *   
 */
	function dumpTable2File( $cpTable, $tableHdr, $dtFilename ) {
		// open the graph data table file
			// $dtFilename = "$tmpdata/tabledata";
		// user_alert("In placehoder dump table to file dtFilename: $dtFilename");

		$dtHandle = fopen($dtFilename, "w");
			// var_dump($dtHandle);
			if (!$dtHandle) {
				user_alert("Cannot open/create  dump table file: $dtFilename");
         		exit(101);
         		user_alert("EXIT FAILED!"); // unreachable
			}else {
				$tSize =  count($cpTable);
				fprintf($dtHandle, "Number of entries in Conversation Table: %d \n" , $tSize);
				fprintf($dtHandle, "*****************\n");

				fprintf($dtHandle, "[ %s , %s\n", $tableHdr[0] , $tableHdr[1]);

				for ($i=0; $i < $tSize; $i++) {
					fprintf($dtHandle, "[ %s , %d ]", $cpTable[$i][0], $cpTable[$i][1]);
					if ( $i < ($tSize -1 )) {
						fprintf($dtHandle, " ,\n");
					} else {
						fprintf($dtHandle, "\n");
					}
				}

				fclose($dtHandle);
			}

		return;
	}
 

/*
 * 
 */

?>