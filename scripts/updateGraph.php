<?php
//-----------------------------------------------------------------------------
/*
 * This file is called by the CSV selection form on the network-body page.
 * The var: display_tchart indicates if the temp chart data should be used
 * in the pie chart. (No selection made = yes)
 */
	$display_tchart = true; // reset until file processed

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


	// Assume conversation data is a Wireshark formatted CSV fie
	//echo "Begin CSV  DR: $docroot  <br>";
	$pkt_indx = 2;
	$byte_indx = 3;
	$sortIndex = 0;
	$hdrs = ["Conv Pair","Total Packets","Total Bytes"];


	// receive the filename from the html form input
	
	$csvFile = $_POST["in_fname"];
	
	$ifile = $_FILES["in_fname"]["name"];
	$itmpFile = $_FILES["in_fname"]["tmp_name"]; // the real uploaded filename on the server
	// receive the sort field from the html form input
	$sortField = $_POST["sortField"];

	// echo "<br>   FILES  ";
	// var_dump($ifile);

	// echo "<br>   file: $ifile  ";
	// var_dump($ifile);
	
	// $fsize = $_FILES["in_fname"]["size"];
	// echo "  size: $fsize  ";

	// echo "<br>==================<br>";

	// echo "<br>  sortfield  ";
	// var_dump($sortField);

	// echo "<br> uploaded filename: $ifile";
	// echo "<br> server filename:  $itmpFile) <br>";
	// var_dump($itmpFile);
	/*
	$fcont = file($itmpFile);

	$psize = count($fcont);
	echo "<br>-----------  psize: $psize  ---------------<br>";
	echo "<br>  Contents:  <br>";
	var_dump($fcont);
	*/
	
	// $row = 1;
	// if (($handle = fopen($itmpFile, "r")) !== FALSE) {
	//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	//         $num = count($data);
	//         echo "<p> $num fields in line $row: <br /></p>\n";
	//         $row++;
	//         for ($c=0; $c < $num; $c++) {
	//             echo $data[$c] . "<br />\n";
	//         }
	//     }
	//     fclose($handle);
	// }

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
				// $cpTable[$curIndx] = array($convPair, intval($data[$sortIndex]));
				//$cpTable[$curIndx] = [$convPair, intval($data[$sortIndex])];
				//print_r("cpTable[$curIndx]: $cpTable[$curIndx][0]  , $cpTable[$curIndx][1]<br>");
				// var_dump($cpTable[$curIndx]);
				// echo "<br>";
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
   			}
/*
			// open the graph data table file
			$dtFilename = "$tmpdata/tabledata";
			$dtHandle = fopen($dtFilename, "w");
			var_dump($dtHandle);
			if (!$dtHandle) {
				echo "<br> Cannot open temp file ($dtFilename)<br>";
         		exit;
			}
			echo "<br>";
			$tSize =  count($cpTable);
			echo "Entries in cpTable: " . $tSize;
			echo "<br>*****************<br>";
			echo "[" . $tableHdr[0] . " , " . $tableHdr[1] . "],<br>";
			fprintf($dtHandle, "[ %s , %s\n", $tableHdr[0] , $tableHdr[1]);
			for ($i=0; $i < $tSize; $i++) {
				fprintf($dtHandle, "[ %s , %d ]", $cpTable[$i][0], $cpTable[$i][1]);
				echo "[" . $cpTable[$i][0] . "," . $cpTable[$i][1] . "]";
				if ( $i < ($tSize -1 )) {
					echo ",";
					fprintf($dtHandle, " ,\n");
				} else {
					fprintf($dtHandle, "\n");
				}
				echo "<br>";
				//printf("[ %s , %d ]\n", $cpTable[$i][0], $cpTable[$i][1]);
			}

			fclose($dtHandle);
*/
		} else {
			// read header error
		}
	}else {
			// open error
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
	$net_hdr_file = "$templates/graphHead.tmpl";
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
	$net_ftr_file = "$templates/graphFooter.tmpl";
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


?>