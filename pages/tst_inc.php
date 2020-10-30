

<?php
	if ($display_tchart == true ) {
		$cp = '[
	        	["Conversation Pair","Total Packets"],
	        	["192.168.1.112/192.168.1.237",23511],
	        	["192.168.1.211/192.168.1.237",15457], //fake
	        	["192.168.1.47/192.168.1.11",2105], //fake
				["192.168.1.130/224.0.0.251",3],
				["192.168.1.130/192.168.1.255",2],
				["192.168.1.130/239.255.255.250",2],
				["192.168.1.1/224.0.0.1",1],
				["192.168.1.237/224.0.0.252",1]
	        ]';
	        $sf = "Total Packets";
	
	} else {
		// transform convPair into table format (top 10 only)
		//$cp = array_slice($cpTable, 0, 10);
		$cp = "[";
		$cp .= sprintf("[ \"%s\" , \"%s\"],", $tableHdr[0] , $tableHdr[1]);
		$tSize =  count($cpTable) - 1;
		if ($tSize > 10) { $tSize = 10; }
		for ($i=1; $i < $tSize; $i++) {
			$cp .= sprintf("[\"%s\",%d]",$cpTable[$i][0], $cpTable[$i][1] );
			if ( $i < ($tSize -1 )) {
					$cp .= ",";
			}
		}
		$cp .= "]";
		$sf = $tableHdr[1];
	}
?>
<script type="text/javascript" charset="utf-8">
	var SortField = "<?php echo $sf; ?>";
	function get_CSVTable() {

		var data = google.visualization.arrayToDataTable(<?php echo $cp; ?>);

        return data;
	}
</script>