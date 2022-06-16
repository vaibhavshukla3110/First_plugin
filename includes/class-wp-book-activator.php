<?php

/**
 * Fired during plugin activation
 *
 * @link       www.books.com/vaibhav
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Book
 * @subpackage Wp_Book/includes
 * @author     Vaibhav <vaibhav.shukla@hbwsl.com>
 */
class Wp_Book_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {

		global $wpdb;
		if( $wpdb->get_var("SHOW tables like '". $this->wpb_bookmeta(). "'" ) != $this->wpb_bookmeta() ) {

			// dynamic generate table
			$table_query = "CREATE TABLE `". $this->wpb_bookmeta() ."` (  
				`meta_id` bigint(20) NOT NULL AUTO_INCREMENT,  
				`book_id` bigint(20) NOT NULL DEFAULT '0',  
				`meta_key` varchar(255) DEFAULT NULL,  
				`meta_value` longtext,  
				PRIMARY KEY (`meta_id`),  
				KEY `book_id` (`book_id`),  
				KEY `meta_key` (`meta_key`)) ENGINE=InnoDB DEFAULT CHARSET=utf8";

			require_once ( ABSPATH.'wp-admin/includes/upgrade.php' );
			dbDelta($table_query);
		}

	}

	public function wpb_bookmeta() {
		global $wpdb;
		return $wpdb->prefix . "bookmeta";
	}
}
