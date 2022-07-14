<?php
/**
 * Plugin Name: Filter
 * Description: Plugin filter.
 * Version:     1.0.0
 * Author:      Elightup
 * License:     GPL2+
 * Text Domain: filter
 * Domain Path: /languages/
 */

// Prevent loading this file directly.
defined( 'ABSPATH' ) || die;

if ( ! function_exists( 'filter_load' ) ) {
	if ( file_exists( __DIR__ . '/vendor' ) ) {
		require __DIR__ . '/vendor/autoload.php';
	}

	add_action( 'init', 'filter_load');

	function filter_load() {

		define( 'FL_DIR', __DIR__ );
		define( 'FL_PATH', plugin_dir_path( __FILE__ ) );
		define( 'FL_URL', plugin_dir_url( __FILE__ ) );
		define( 'FL_VER', '1.0.0' );

		load_plugin_textdomain( 'filter', false, basename( FL_DIR ) . '/languages' );
		new LFR\FL_PostForum;
	}
}