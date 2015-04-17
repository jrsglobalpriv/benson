<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/VCUarts
 * @since             1.0
 * @package           Benson
 *
 * @wordpress-plugin
 * Plugin Name:       Benson
 * Plugin URI:        https://github.com/VCUarts/benson.git
 * Description:       Provides a simple Angular integration with the WP REST API.
 * Version:           1.1
 * Author:            VCUarts
 * Author URI:        https://github.com/VCUarts
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       benson
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-benson-activator.php
 */
function activate_benson() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-benson-activator.php';
	Benson_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-benson-deactivator.php
 */
function deactivate_benson() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-benson-deactivator.php';
	Benson_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_benson' );
register_deactivation_hook( __FILE__, 'deactivate_benson' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-benson.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_benson() {

	$plugin = new Benson();
	$plugin->run();

}

// Only run if ACF is available
if ( function_exists('get_field') ) {
  run_benson();
}
