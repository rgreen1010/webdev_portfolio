<!-- 
	Define an iframe or a new page
	<iframe src="${pages}/err-display.php"></iframe>

	This will be brought into use by a php include if a error is encountered.
	Current design will place it under an existing nav bar with enough message text 
	to indicate the error and allow for site navigation to continue, if possible

-->

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		// get the referring page url
		$refUrl = $_SERVER['HTTP_REFERER'];
		$sHome = "/site1/index.php";
		//var_dump($refUrl);
	?>
<!--
	Since this is a error presentment "page", it must be self contained
	no external css styles or scripts
	background: linear-gradient( #C791BA,#8C3A78 );
-->
 <style>

 	body {
 		background: lightgray;
 		height:  100vh;
 	}
 	a {
 		text-align: center;
 		font-size: 15px;
 	}
 	._sys_error_banner{
 	  margin: 10px;
	  font-weight: bold;
	  font-size: 40px;
	  color: black;
 	}
 	._sys_error_container{
	  height: 50%;
	  width: 75%;
	  margin: 0 5% 0 2%;
	  border: 1px solid red;
	  background-color: #999999;
	  opacity: 0.7;
	  text-align: center;
	}
	._sys_error_txt {
	  font-weight: normal;
	  font-size: 25px;
	  color: red;
	}
	#retLink {
	  margin: 20px;
	  font-weight: normal;
	  font-size: 25px;
	  color: black;
	  padding: 10px 0 10px 0;	
	}
	#the500{
	  margin: 10px;
	  font-weight: bold;
	  font-size: 100px;
	  color: black;
	}
 </style>
</head>
<body>
	
	<div class="_sys_error_container">
		<p id="the500">500</p>
		<h1 class="_sys_error_banner">SYSTEM Error encountered</h1>
		<?php
			$err_msg = "SYSTEM Error encountered while processing site data";
			/* $S0_error_msg is set within PHP code run earlier in site landing page */
			if (isset($S0_error_msg)) {
				$err_msg = $S0_error_msg;
			}

			//$S_siteHome = "$fpath/index.php"; // site's home landing page
		?>
		<p class="_sys_error_txt"><?php echo $err_msg; ?></p>
		<p class="_sys_error_txt">Please notify your system administator</p>

		<a href="<?php echo $refUrl; ?>">Back</a>
		<a href="<?php echo $sHome; ?>">Home</a>
	</div>

</body>

</html>