<?php
/**
 * Plugin Name: Block ID Submenu
 * Plugin URI: https://github.com/nickdavis/block-id-submenu
 * Description: generates a submenu from block ID attributes in the WordPress editor. Requires developer setup.
 * Version: 1.0.0
 * Author: Nick Davis
 * Author URI: https://nickdavis.net
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace NickDavis\BlockIdSubmenu;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

/**
 * Sets up the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function constants() {
	$plugin_url = plugin_dir_url( __FILE__ );

	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'ND_BLOCK_ID_SUBMENU_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
	define( 'ND_BLOCK_ID_SUBMENU_URL', $plugin_url );
	define( 'ND_BLOCK_ID_SUBMENU_FILE', __FILE__ );
}

/**
 * Autoloads files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
	$autoloader = ND_BLOCK_ID_SUBMENU_DIR . 'vendor/autoload.php';

	if ( is_readable( $autoloader ) ) {
		require_once $autoloader;
	}
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\launch' );
/**
 * Launches the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	constants();
	autoload();
	( new Plugin )->run();
}
