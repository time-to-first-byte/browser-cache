<?php
defined( 'ABSPATH' ) or	die( 'Cheatin&#8217; uh?' );


function perfthemes_bc_writtable_htaccess() {
	return is_writable( get_home_path() . '.htaccess' );
}

function perfthemes_bc_get_htaccess_path() {
	return get_home_path() . '.htaccess';
}

function perfthemes_bc_get_htaccess_content() {
	return file_get_contents( get_home_path() . '.htaccess' );
}



function perfthemes_bc_replace_htaccess( $content )
{
	require_once( ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php' );
	require_once( ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php' );

	$chmod = defined( 'FS_CHMOD_FILE' ) ? FS_CHMOD_FILE : 0644;
	$file_path = perfthemes_bc_get_htaccess_path();

	$direct_filesystem = new WP_Filesystem_Direct( new StdClass() );

	return $direct_filesystem->put_contents( $file_path, $content, $chmod );
}
