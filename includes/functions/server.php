<?php
defined( 'ABSPATH' ) or	die( 'Cheatin&#8217; uh?' );



function perfthemes_bc_is_apache() {
	$output = false;
	
	if(isset($GLOBALS['is_apache'])) {
		$output = $GLOBALS['is_apache'];
	}

	return $output;
}
