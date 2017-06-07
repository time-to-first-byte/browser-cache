<?php
defined( 'ABSPATH' ) or	die( 'Cheatin&#8217; uh?' );

/**
 * Fired during plugin activation.
 *
 * @since      1.0.0
 * @package    perfthemes-browser-cache
 */
class Perfthemes_bc_activator {
	
	/**
	 * Attempt to insert performance rules inside htaccess file.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require( PERFTHEMES_BC_PLUGIN_PATH . 'includes/functions/server.php' );
		require( PERFTHEMES_BC_PLUGIN_PATH . 'includes/functions/filesystem.php' );
		require( PERFTHEMES_BC_PLUGIN_PATH . 'includes/class-perfthemes-bc-rules.php' );


		// Apache server detection
		if( !perfthemes_bc_is_apache() ) {
			cancel_perfthemes_activation(__("Perfthemes Browser Cache cannot be installed : Permission denied to write to required file.", "perfthemes-browser-cache"));
			return false;
		}


		// Attempt to manage file permissions
		if( !perfthemes_bc_writtable_htaccess() ) {
			cancel_perfthemes_activation(__("Perfthemes Browser Cache cannot be installed : This plugin require an Apache server.", "perfthemes-browser-cache"));
			return false;
		}


		// Insert rules
		Perfthemes_bc_rules::write_rules();
	}

}






