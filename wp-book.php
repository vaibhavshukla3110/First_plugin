<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.books.com/vaibhav
 * @since             1.0.0
 * @package           Wp_Book
 *
 * @wordpress-plugin
 * Plugin Name:       wp-book
 * Plugin URI:        www.books.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Vaibhav
 * Author URI:        www.books.com/vaibhav
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-book
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_BOOK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-book-activator.php
 */
function activate_wp_book() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-book-activator.php';
	Wp_Book_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-book-deactivator.php
 */
function deactivate_wp_book() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-book-deactivator.php';
	Wp_Book_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_book' );
register_deactivation_hook( __FILE__, 'deactivate_wp_book' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-book.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_book() {

	$plugin = new Wp_Book();
	$plugin->run();

}
run_wp_book();


// Save the data in table

// function save_custom_meta_box($post_id,$post){

// 	if(!isset($_POST["meta-box-nonce"]) || wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
// 	return $post_id;

// 	$post_slug = "book";

// 	if( $post_slug != $post->post_type ) {
// 		return;
// 	}

// 	// if(!current_user_can("edit_post", $post_id))
// 	// return $post_id;

// 	// if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
// 	// return $post_id;

// 	$author = '';
// 		if ( isset( $_POST['wpb-custom-author-name'] ) ) {
// 			$author = sanitize_text_field( $_POST['wporg_author_name'] );
// 		} else {
// 			$author = "";
// 		}

	
// 	$price = '';
// 		if ( isset( $_POST['wpb-custom-price'] ) ) {
// 			$price = sanitize_text_field( $_POST['wpb-custom-price'] );
// 		} else {
// 			$price = "";
// 		}


// 	$publisher = '';
// 		if ( isset( $_POST['wpb-custom-publisher'] ) ) {
// 			$publisher = sanitize_text_field( $_POST['wpb-custom-publisher'] );
// 		} else {
// 			$publisher = "";
// 		}


// 	$year = '';
// 		if ( isset( $_POST['wpb-custom-year'] ) ) {
// 			$year = sanitize_text_field( $_POST['wpb-custom-year'] );
// 		} else {
// 			$year = "";
// 		}

// 	$edition = '';
// 		if ( isset( $_POST['wpb-custom-edition'] ) ) {
// 			$edition = sanitize_text_field( $_POST['wpb-custom-edition'] );
// 		} else {
// 			$edition = "";
// 		}


// 	$url = '';
// 		if ( isset( $_POST['wpb-custom-url'] ) ) {
// 			$url = sanitize_text_field( $_POST['wpb-custom-url'] );
// 		} else {
// 			$url = "";
// 		}

// 		update_metadata( 'post', $post_id, 'author_name', $author );
// 		update_metadata( 'post', $post_id, 'price', $price );
// 		update_metadata( 'post', $post_id, 'publisher', $publisher );
// 		update_metadata( 'post', $post_id, 'year', $year );
// 		update_metadata( 'post', $post_id, 'edition', $edition );
// 		update_metadata( 'post', $post_id, 'url', $url );
// }

// add_action("save_post", 'save_custom_meta_box');