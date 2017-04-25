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
			//echo __( 'This plugin require an Apache server.', 'perfthemes-browser-cache' );
			//die();
            		add_action( 'admin_notices', 'perfthemes_not_apache' );
		}


		// Attempt to manage file permissions
		if( !perfthemes_bc_writtable_htaccess() ) {
			//echo __( "Permission denied to write to required file.", 'perfthemes-browser-cache' );
			//die();
            		add_action( 'admin_notices', 'perfthemes_not_writtable_htaccess' );
		}

		// Insert rules
		Perfthemes_bc_rules::write_rules();
	}
}






