

<?php

	if ($display_tchart == true ) {
		// This is the initial demo data table for the network page
		$cp = '[
	        	["Conversation Pair","Total Packets"],
	        	["192.168.1.112/192.168.1.237",23511],
	        	["192.168.1.211/192.168.1.237",15457],
	        	["192.168.1.47/192.168.1.11",2105],
				["192.168.1.130/224.0.0.251",3],
				["192.168.1.130/192.168.1.255",2],
				["192.168.1.130/239.255.255.250",2],
				["192.168.1.1/224.0.0.1",1],
				["192.168.1.237/224.0.0.252",1]
	       	   ]';
	        $S_sortField = "Total Packets";
	
	} else {
		// transform convPair ($cpTable) into table format (top 10 only)
		// $cpTable is created by updateGraph.php from user uploaded csv file
		
		// $cp becomes the 2 dimentional conversation pair array
		// 2 value Table row: [ "string representing ip1/ip2", total count(packets or bytes) ]

		$cp = "[";
		$cp .= sprintf("[ \"%s\" , \"%s\"],", $tableHdr[0] , $tableHdr[1]);
		$tSize =  count($cpTable) - 1; // don't count header row

		$S_convCnt = $tSize;
		//var_dump("S_convCnt:",$S_convCnt);
		if ($tSize > 10) { 
			 
			$tSize = 11;  // No more than 10 entries start at 1
		}
		for ($i=1; $i < $tSize; $i++) {
			$cp .= sprintf("[\"%s\",%d]",$cpTable[$i][0], $cpTable[$i][1] );
			if ( $i < ($tSize -1 )) {
					$cp .= ",";
			}
		}
		$cp .= "]";
		$S_sortField = $tableHdr[1];
	}
	
?>
<!--
	 Define initialization function in client space for
	 use later.  Doing it here to show cross tie to server
	 data through usage of the $sf variable
-->
<script type="text/javascript" charset="utf-8">
	// Bring sort field name from server to local JS var
	var SortField = "<?php echo $S_sortField; ?>";
	function initGoogleDataTableFromCsvTable() {

		var data = google.visualization.arrayToDataTable(<?php echo $cp; ?>);

        return data;
	}
</script>