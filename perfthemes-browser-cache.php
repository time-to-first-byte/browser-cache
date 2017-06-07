<?php

/**
 * @link              https://perfthemes.com/
 * @since             1.0.0
 * @package           perfthemes-browser-cache
 *
 * @wordpress-plugin
 * Plugin Name:       Perfthemes Browser Cache
 * Plugin URI:        https://perfthemes.com/perfthemes-browser-cache/
 * Description:       Simple plugin to add performance rules for Perfthemes themes
 * Version:           1.0.0
 * Author:            Perfthemes
 * Author URI:        https://perfthemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       perfthemes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'PERFTHEMES_BC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PERFTHEMES_BC_CACHE_PATH', WP_CONTENT_DIR . '/cache/perfthemes-browser-cache/' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-perfthemes-bc-activator.php
 */
function activate_perfthemes_bc() {
	require_once PERFTHEMES_BC_PLUGIN_PATH . 'includes/class-perfthemes-bc-activator.php';
	Perfthemes_bc_activator::activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-perfthemes-bc-deactivator.php
 */
function deactivate_perfthemes_bc() {
	require_once PERFTHEMES_BC_PLUGIN_PATH . 'includes/class-perfthemes-bc-deactivator.php';
	Perfthemes_bc_deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_perfthemes_bc' );
register_deactivation_hook( __FILE__, 'deactivate_perfthemes_bc' );


require plugin_dir_path( __FILE__ ) . 'includes/class-perfthemes-bc.php';

function run_perfthemes_bc() {

	$plugin = new Perfthemes_bc();
	$plugin->run();

}
run_perfthemes_bc();