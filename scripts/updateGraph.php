<?php
//-----------------------------------------------------------------------------
/*
 * This file is called by the CSV selection form id="csv_upload" on the network-body page.
 *
 *
 *  The output is targeted into the previously defined  
 *    iframe id="net-chart-iframe" name="net-chart-iframe" title="net-chart-iframe" 
 * define on the network-body page.
 *
 * The var: display_tchart indicates if the **temp** chart data should be used
 * in the graph. (No selection made = true). It is used to allow the first
 * invocation of the net-base-iframe.php page file to display example data to
 * the user inside the network-body page.
 *
 */

	//var_dump("updateGraph--1  site page: ", $pg);

	$display_tchart = true; // default until var file "processed"

	$vfile = '/var/www/html/site1/scripts/site-vars.php';
	
	// Should just use a php require here for each file
	// leaving conditions for devel debug
	$stat = include $vfile;
	//var_dump("udateGraph -- included site-vars stat: ",$stat);
    if (! $stat ) {
    	echo "Server Error - $vfile : not accessible";
		// stop everything it's not present Server 500
		// look at server log file
		require $vfile; // currently used to cause error stop and server log
    }


	// Assume conversation data is a Wireshark formatted CSV fie
	//echo "Begin CSV  DR: $docroot  <br>";
	$pkt_indx = 2;
	$byte_indx = 3;
	$sortIndex = 0;
	$hdrs = ["Conv Pair","Total Packets","Total Bytes"];


	// receive the filename from the html form input
	
	//$csvFile = $_POST["in_fname"];
	
	$ifile = $_FILES["in_fname"]["name"];
	$itmpFile = $_FILES["in_fname"]["tmp_name"]; // the real uploaded filename on the server
	// receive the sort field from the html form input
	$sortField = $_POST["sortField"];


	// Create Data Table headings for Pairs and sort field
	if (($handle = fopen($itmpFile, "r")) !== FALSE) {
		// read the header line
		if (($hdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
			// var_dump($hdata);
			// process/sort the remaining entries
			if ($sortField == "tot_bytes") {
				$sortIndex = $byte_indx;
				//$sortHdr = "Total Bytes";
			} else {
				$sortIndex = $pkt_indx;
				//$sortHdr = "Total Packets";
			}

			$sortHdr = $hdrs[$sortIndex - 1];

			// Keep only 10 table entries (max) ?
			// Table starts here
			$tableHdr = ["Conversation Pair", $sortHdr];
			$cpTable = array();
			$curIndx = 0;
			$newVal = 0;
			
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$convPair = "$data[0]/$data[1]";
				$newVal = intval($data[$sortIndex]);

				$cpTable[$curIndx][0] = $convPair;
				$cpTable[$curIndx][1] = intval($data[$sortIndex]);
				$curIndx++;

			}

			
			// sort it
			$keys = array_column($cpTable, 1); // column of pkt/byte values/pair
			//var_dump($keys);
   			$sortStatus = array_multisort($keys, SORT_DESC , $cpTable);
   			/*
   			 * $sortStatus:  true = successfully sorted
   			 *				 false = sort failed
   			 */
   			if( $sortStatus == true ) {
   				$display_tchart = false; // file processed and sorted
   				// prepare html table from pair data (top 10)

   				// set up a try - catch structure in production code
   				$netpage = "${fpath}/pages/net-base-iframe.php";
   				// echo " netpage: $netpage  ";
   				include $netpage;

   				//user_alert("Completed processing conversation table.");

   				/*   				
   				$tmpTableFile = "$fpath/logs/TableData.log";

   				dumpTable2File( $cpTable, $tableHdr, $tmpTableFile );
   				var_dump("updateGraph-2  site page: ", $pg);
   				err_stop("THIS IS A TEST of err_stop using a div.", 201, "${fpath}/error-pages/err_div.php");
   				var_dump("updateGraph-2  S_err_div_file: ", $S_err_div_file);
   				*/

   			} else {
   				//$S_err_div_file = "${fpath}/error-pages/err_div.php";
   				//user_alert("Sort failed while processing conversation table.");
   				err_stop("Sort failed while processing conversation table.", 201, $S_err_div_file);
   			}



		} else {
			// read header error
			//$S_err_div_file = "${fpath}/error-pages/err_div.php";
   			err_stop("Header read failed while processing conversation table.", 211, $S_err_div_file);
		}
	}else {
			// open error
			//$S_err_div_file = "${fpath}/error-pages/err_div.php";
   			err_stop("File open failed while processing conversation table.", 212, $S_err_div_file);
	}


	// process csv file, 
	// Initially assume that the file order doesn't matter for pie chart
	// Create array of the data to be written into  pair - packet format

	// Display Option 1
	// create html page that includes the <script> entries for the javascript
	// code to produce the graph/chart
	// Display that html on the network page

	// Display Option 2
	// Recreate the entire network-body.php file here


//-----------------------------------------------------------------------------

	// use templates for the head and footer 

	// include/require/write header template
	//$net_hdr_file = "$templates/graphHead.tmpl";
	//require $net_hdr_file;

	// generate the data table array from the csv file processing results
	// that yeild a single conversation pair label and the required value
	// such as total packets or total bytes
	// write/echo the code for a html script section that includes the array 
	// to DataTable conversion call from the google API
	// wrap this call in a javacsript function called get_DataTable()

	// Also populate a html container div id="chart_table" with a html table 
	// of the same array

	// include/require/write footer template
	//$net_ftr_file = "$templates/graphFooter.tmpl";
	//require $net_ftr_file;

	// This full webpage will be the response that is to be displayed in an iframe

   /** =========================================================================
     * Returns an array of values representing a single column from the input
     * array.
     * @param array $array A multi-dimensional array from which to pull a
     *     column of values.
     * @param mixed $columnKey The column of values to return. This value may
     *     be the integer key of the column you wish to retrieve, or it may be
     *     the string key name for an associative array. It may also be NULL to
     *     return complete arrays (useful together with index_key to reindex
     *     the array).
     * @param mixed $indexKey The column to use as the index/keys for the
     *     returned array. This value may be the integer key of the column, or
     *     it may be the string key name.
     * @return array
     * ==========================================================================
     */
    function array_column(array $array, $columnKey, $indexKey = null)
    {
        $result = array();
        foreach ($array as $subArray) {
            if (!is_array($subArray)) {
                continue;
            } elseif (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
                	$result[] = $subArray[$columnKey]; // path taken here
            } elseif (array_key_exists($indexKey, $subArray)) {
                	if (is_null($columnKey)) {
                   		 $result[$subArray[$indexKey]] = $subArray;
                	} elseif (array_key_exists($columnKey, $subArray)) {
                    	 $result[$subArray[$indexKey]] = $subArray[$columnKey];
                	}
            }
        }
        return $result;
    }

    function getArrayColumn( array $array, $columnKey, $indexKey = null ) {
    	$arrayColumn = array(); // resulting arrary
    	foreach ($array as $row ) {
    		if ( is_array($row)) {
    			if (is_null($indexKey) && array_key_exists($columnKey, $row)) {
    				$arrayColumn[] = $row[$columnKey];
    			} elseif (array_key_exists($indexKey, $row)) {
    				if (is_null($columnKey)) {
    					$arrayColumn[$row[$indexKey]] = $row;
    				} elseif (array_key_exists($columnKey, $row)) {
    					$arrayColumn[$row[$indexKey]] = $row[$columnKey];
    				}
    			}
    		}
    	} // foreach
    	return $arrayColumn;
    	
    }

/*
 *
 */



?>