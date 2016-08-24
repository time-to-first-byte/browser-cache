<?php
defined( 'ABSPATH' ) or	die( 'Cheatin&#8217; uh?' );

/**
 * Fired during plugin deactivation.
 *
 * @since      1.0.0
 * @package    perfthemes-browser-cache
 */
class Perfthemes_bc_deactivator {

	/**
	 * Attempt to remove performance rules from htaccess file.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		require( PERFTHEMES_BC_PLUGIN_PATH . 'includes/functions/filesystem.php' );
		require( PERFTHEMES_BC_PLUGIN_PATH . 'includes/class-perfthemes-bc-rules.php' );

	    // Attempt to manage file permissions
		if( !perfthemes_bc_writtable_htaccess() ) {
			trigger_error(__( 'Permission denied to write to required file.', 'perfthemes-browser-cache' ));
			//echo "Permission denied to write to required file.";
			//die();
		}

		// Remove rules
		Perfthemes_bc_rules::remove_rules();
	}

}
