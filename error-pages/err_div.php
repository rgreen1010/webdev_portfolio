

	<div class="error_container">
		<h1 class="site_error_banner">SYSTEM Error encountered</h1>
		<?php
			$err_msg = "SYSTEM Error encountered while processing site data";
			/* $S0_error_msg is set within PHP code run earlier in site landing page */
			if (isset($S_error_msg)) {
				$err_msg = $S_error_msg;
			}

			if (isset($pageId)){
				$S_siteHome = strtolower("$pages/$pageId.php"); //reset back to current page
				echo "<br>page pointer: $pageId  -- sroot: $sroot ## S_siteHome: $S_siteHome <br>";
			} else {
				$S_siteHome = "$sroot/index.php"; // site's home landing page
			}
			
		?>
		<p class="site_error_txt"><?php echo $err_msg; ?></p>
		<a class="retLink" target="_parent"href="<?php echo $S_siteHome; ?>">Reset Page</a>
	</div>