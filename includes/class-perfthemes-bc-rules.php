<?php
defined( 'ABSPATH' ) or	die( 'Cheatin&#8217; uh?' );

/**
 * Apply or removes all rules inside htaccess
 *
 * @since      1.0.0
 * @package    perfthemes-browser-cache
 */
class Perfthemes_bc_rules {

	protected $rules;

	public function __construct() {}


	public static function write_rules() {
		$rules_manager = new Perfthemes_bc_rules();
		$rules_manager->flush();
		$rules_manager->add_rules();
	}


	public static function remove_rules() {
		$rules_manager = new Perfthemes_bc_rules();
		$rules_manager->flush();
	}

	private function flush() {

		$file_contents = perfthemes_bc_get_htaccess_content();

		// Remove marker
		$file_contents = preg_replace( '/# BEGIN PERFTHEMES_BROWSER_CACHE(.*)# END PERFTHEMES_BROWSER_CACHE/isU', '', $file_contents );

		// Remove empty spacings
		$file_contents = str_replace( "\n\n" , "\n" , $file_contents );

		perfthemes_bc_replace_htaccess($file_contents); 
	}


	private function add_rules() {		
		$file_contents = perfthemes_bc_get_htaccess_content();
		$this->setup_rules();
		perfthemes_bc_replace_htaccess( $this->rules . $file_contents );
	}


	private function setup_rules() {

		$this->rules  = '# BEGIN PERFTHEMES_BROWSER_CACHE' . PHP_EOL . PHP_EOL;		
		$this->rules .= apply_filters( 'before_perfthemes_bc_rules', '' );

		$this->rules .= $this->get_default_rules();

		$this->rules = apply_filters( 'after_perfthemes_bc_rules', $this->rules );		
		$this->rules .= PHP_EOL .'# END PERFTHEMES_BROWSER_CACHE' . PHP_EOL;
	}


	private function get_default_rules() {
		return file_get_contents( PERFTHEMES_BC_PLUGIN_PATH . 'content/htaccess.txt' );
	}
}
