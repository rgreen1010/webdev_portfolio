<?php
	function err_handle( $message, $exit_code ) {
		/* $message =  'Description of the error.'; */
		error_log($message);
		header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
		die($message);
		/* exit ( $exit_code ); */

		/* Sould load an error message and recovery page that's styled and fitting
		 * the rest of the site.  Perhaps an iframe? 
		 */
	}
?>