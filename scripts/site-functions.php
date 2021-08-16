<?php
	
/*
 ***********************************************************************************
 * err_stop --  Primary error then exit function
 ***********************************************************************************
 			$message - String containing the descriptive/context based error message
 			$exit_code - integer indicating the exact or class of error
 			$err_doc_file - filename of a self contained error page document
 ***********************************************************************************
 * checks file indicated by $err_doc_file is readable/existent before performing the
 * include.  If not there, a default message indicating missing err_doc
 * FUNCTION DOES NOT RETURN, BUT TERMINATES WITH AN ERROR CODE 
 ***********************************************************************************
 */
	function err_stop($message, $exit_code, $err_doc_file) {
		  // var_dump("err_doc_file ", $err_doc_file);
		  global $fpath, $sroot, $pages, $S_error_msg, $pg;
	      if(is_readable($err_doc_file)) {
	        $S_error_msg = $message;
	        include $err_doc_file; // Display full error page
	      } else {
	        echo "$err_doc_file was unreadable/missing";
	        //exit($exit_code);
	      }
	      error_log("Internal Server Error - $message",0);  // log the error
	      // Indicate a server error occured
		  header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	      exit($exit_code);
	}


/*
 *
 * includeIfAvailable ---
 *	$ifile - filename to be included
 *   
 */
function includeIfAvailable( $ifile ) {
	if(is_readable($ifile)) {
        include $ifile; // 
	} else {
	    echo "$ifile was unreadable/missing";
	    // could inject an inclusion of a error page here with err_stop
    }

    return;
}


/*
 *
 * user_alert ---
 *	$message - Text string to be displyed in an alert box
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
 *    Useful on the Network page
 *
 * dumpDataTable ---
 *	$cpTable - conversation pair table
 *	$tableHdr - Table header (2 element array)
 *	$dtFilename - data table (output file name)
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