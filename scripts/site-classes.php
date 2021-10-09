<?php

	class pageBanner {
		/* 
		*/
		public   $pTitle = "Place Holder Title";
		private  $pTheme = "Place Holder Theme";
		private  $pageBanner;
		private  $containerCssClass;
		private  $titleCssClass;
		private  $themeCssClass;



		public function setTitle( $title) {
			echo "<br> setTitle   <br>";
			$this->$pTitle = $title;
		}

		public function setTheme( $theme) {
			echo "<br> setTheme   <br>";
			$this->$pTheme = $theme;	
		}

		public function getTitle() {
			return $this->$pTitle;
		}
		public function getTheme() {
			return $this->$pTheme;
		}


		public function getContainerCssClass() {
			return $this->$containerCssClass;
		}

		public function getTitleCssClass() {
			return $this->$titleCssClass;
		}

		public function getThemeCssClass() {
			return $this->$themeCssClass;
		}

				// receive the display classes for banner container and lines
		public function __construct($containerCssClass, $title, $titleCssClass, $theme, $themeCssClass) {
			echo "<br> pageBanner constructor in<br>";
			$this->$containerCssClass = $containerCssClass;
			$this->$titleCssClass = $titleCssClass;
			$this->$themeCssClass = $themeCssClass;
			echo "<br> pageBanner constructor mid <br>";
			//$this->setTitle($title);
			$this->$pTitle = $title;
			//$this->setTheme($theme);
			$this->$pTheme = $theme;
			echo "<br> pageBanner constructor out <br>";
		}

		public function showPageBanner() {
			// write the html to display the site heading banner
			// 2 lines
			echo "<br> showPageBanner ------<br>";
			// Set up the html
			$pageBanner = '<section class ="' . $this->getContainerCssClass() . '">';
			$pageBanner .= '<p class="' . $this->getTitleCssClass() . '">';
			$pageBanner .= $this->getTitle() . '</p>';
			$pageBanner .= '<p class="' . $this->getThemeCssClass() . '">';
			$pageBanner .= $this->getTheme() . '</p>';
			$pageBanner .= '<br> </section>';
			var_dump("pageBanner: ", $pageBanner);
			return $pageBanner;
		}

		/*
		 * Usage:
		 	$pLine1 = "Internet Technophile";
		 	$pLine2 = "Studying Network Statistics Display Options";
		 	$pBanner = new pageBanner("banner", $pLine1, "pageBannerLine1", $pLine2,"pageBannerLine2");
			echo $pBanner->showPageBanner();
		 */
	}



?>
