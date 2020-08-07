<!-- 
	Define an iframe or a new page
	<iframe src="${pages}/ws-tools.php"></iframe>
-->
<?php
	$pg = "WS-iframe"; // Page name id
	
	$vfile = $_SERVER['DOCUMENT_ROOT'] . "/site1/scripts/site-vars.php";
	
	require $vfile; 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Draft SITE1 Table</title>

    <link rel="stylesheet" href='<?php echo "$css/site-main.css"; ?>' />
    <link rel="stylesheet" href='<?php echo "$css/site-fonts.css"; ?>' />
    <link rel="icon" href='<?php echo "$images/favicon.ico"; ?>' />

    <script src='<?php echo "$scripts/site-main.js"; ?>'> </script>


  </head>
<body>
<!-- 	<div>
	Place Holder 1
	</div> -->

	<div>
		<?php
			require $ws_db;


			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$cnams = []; // init array

			$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$dbname' AND TABLE_NAME = N'$ws_tool_tbl'";
			$hdrs = $conn->query($sql);
			while ( $row = $hdrs->fetch_assoc()) {
				$cnams[] = $row['COLUMN_NAME'];
			}
		?>

		<table class="hlite_tbl">
			<caption id="hlite_cap">Woodshop Tools</caption>
			<thead>
				<tr class="hlite_rows">
					<?php
						for ($i=0; $i < $hdrs->num_rows; $i++)  {
							echo "<th>"."$cnams[$i]". "</th>";
						}
					?>

				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM $ws_tool_tbl";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    	echo "<tr class=\"hlite_rows\">";
					        echo "<td>". $row["Id"]. "</td>";
					        echo "<td>". $row["Name"]. "</td>";
					        echo "<td>". $row["Description"]. "</td>";
					        echo "<td>". $row["Model_No"]. "</td>";
					        echo "<td>". $row["Serial_No"]. "</td>";
					        echo "<td>". $row["Quality"]. "</td>";
					        echo "<td>". $row["Price"]. "</td>";
					        echo "<td>". $row["Man_Id"]. "</td>";
					        echo "<td>". $row["Merch_Id"]. "</td>";
					        echo "<td>". $row["Invoice_Loc"]. "</td>";
					        echo "<td>". $row["Image_Loc"]. "</td>";
					        echo "</tr>";
					    }
					} else {
					    echo "0 results";
					}

					$conn->close();
				?>
			</tbody>
		</table>
	</div>

</body>

</html>