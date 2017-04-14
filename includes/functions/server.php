<?php
defined( 'ABSPATH' ) or	die( 'Cheatin&#8217; uh?' );



function perfthemes_bc_is_apache() {
	$output = false;
	
	if(isset($GLOBALS['is_apache'])) {
		$output = $GLOBALS['is_apache'];
	}

	return $output;
}

function perfthemes_not_apache() {
    ?>
    <div class="notice notice-warning perf-autoptimize-notice is-dismissible clear">
        <p class="clear"><strong>Light & Bold:</strong> <?php _e("This plugin require an Apache server.", "perfthemes-browser-cache"); ?></p>
    </div>
    <?php
}

function perfthemes_not_writtable_htaccess() {
    ?>
    <div class="notice notice-warning perf-autoptimize-notice is-dismissible clear">
        <p class="clear"><?php _e("Permission denied to write to required file.", "perfthemes-browser-cache"); ?></p>
    </div>
    <?php
}