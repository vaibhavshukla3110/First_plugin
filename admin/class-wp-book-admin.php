<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.books.com/vaibhav
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 * @author     Vaibhav <vaibhav.shukla@hbwsl.com>
 */
class Wp_Book_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-book-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-book-admin.js', array( 'jquery' ), $this->version, false );

	}


	// add_action( 'init', 'wporg_book_init' );

/**
 * Register a book custom post type.
 */

function wporg_book_init() {
	$labels = array(
		'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Book', 'textdomain' ),
		'new_item'              => __( 'New Book', 'textdomain' ),
		'edit_item'             => __( 'Edit Book', 'textdomain' ),
		'view_item'             => __( 'View Book', 'textdomain' ),
		'all_items'             => __( 'All Books', 'textdomain' ),
		'search_items'          => __( 'Search Books', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
		'not_found'             => __( 'No books found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'book', $args );
}



// add_action( 'init', 'wporg_register_taxonomy_book_category' );


/**
 * Register a hierarchical taxonomy book category.
 */

function wporg_register_taxonomy_book_category() {
	$labels = array(
		'name'              => _x( 'Book Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Book Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Book Category' ),
		'all_items'         => __( 'All Book Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Book Category' ),
	);
	$args   = array(
		'hierarchical'      => true, 
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Book Category' ),
	);
	register_taxonomy( 'book category', array( 'book' ), $args );
}



// add_action( 'init', 'wporg_register_taxonomy_book_tag' );


/**
 * Register a non-hierarchical taxonomy Book Tag
 */

function wporg_register_taxonomy_book_tag() {
	$labels = array(
		'name'                       => _x( 'Book Tag', 'taxonomy general name' ),
		'singular_name'              => _x( 'Book Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Book Tag' ),
		'all_items'                  => __( 'All Book Tags' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag' ),
		'update_item'                => __( 'Update Tag' ),
		'add_new_item'               => __( 'Add New Tag' ),
		'new_item_name'              => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate topics with commas' ),
		'add_or_remove_items'        => __( 'Add or remove topics' ),
		'choose_from_most_used'      => __( 'Choose from the most used topics' ),
		'menu_name'                  => __( 'Book Tag' ),
	);
	$args   = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Book Tag' ),
	);
	register_taxonomy( 'book tag', array( 'book' ), $args );
}



/**
 * Add meta box to 'book' custom post type
 */

function add_custom_meta_box()  {
	//for custom post type
	// add_meta_box( "demo_meta_box", "Book Info", "custom_meta_box_markup", "book", "normal", "high", null );
	add_meta_box('custom-books-info', 'Books Info', array( $this, "custom_meta_box_markup" ), array( 'book' ) );
 }

//  add_action( 'add_meta_boxes', 'add_custom_meta_box' );


public function custom_meta_box_markup( $post ) {

	$get_book_metadata = get_metadata( 'book', $post->ID );
		if( count( $get_book_metadata ) > 0 ) {
			$author 	= $get_book_metadata['author_name'][0];
			$price 		= $get_book_metadata['price'][0];
			$publisher 	= $get_book_metadata['publisher'][0];
			$year 		= $get_book_metadata['year'][0];
			$edition 	= $get_book_metadata['edition'][0];
			$url 		= $get_book_metadata['url'][0];
		} else {
			$author 	= '';
			$price 		= '';
			$publisher 	= '';
			$year 		= '';
			$edition 	= '';
			$url 		= '';	
		}

		wp_nonce_field(plugin_basename( __FILE__ ), "meta-box-nonce" );

		?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="wpb-custom-author-name">Author Name</label></th>
					<td><input name="wpb-custom-author-name" type="text" id="wpb-custom-author-name" value="<?php echo $author;?>" placeholder="Author Name" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-price">Book Price</label></th>
					<td><input name="wpb-custom-price" type="text" id="wpb-custom-price" value="<?php echo $price;?>" placeholder="Book Price" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-publisher">Publisher</label></th>
					<td><input name="wpb-custom-publisher" type="text" id="wpb-custom-publisher" value="<?php echo $publisher;?>" placeholder="Publisher" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-year">Year</label></th>
					<td><input name="wpb-custom-year" type="number" id="wpb-custom-year" value="<?php echo $year;?>" placeholder="Year" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-edition">Edition</label></th>
					<td><input name="wpb-custom-edition" type="text" id="wpb-custom-edition" value="<?php echo $edition;?>" placeholder="Edition" class="regular-text" autocomplete="off"></td>
				</tr>
				<tr>
					<th scope="row"><label for="wpb-custom-url">URL</label></th>
					<td><input name="wpb-custom-url" type="url" id="wpb-custom-url" value="<?php echo $url;?>" placeholder="URL eg. https://example.com" class="regular-text" autocomplete="off"></td>
				</tr>
			</tbody>
		</table>
		<?php
	
}



function save_custom_meta_box($post_id, $post){

	if(!isset($_POST["meta-box-nonce"]) || wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
	return $post_id;

	$post_slug = "book";

	if( $post_slug != $post->post_type ) {
		return;
	}

	
	$author = '';
		if ( isset( $_POST['wpb-custom-author-name'] ) ) {
			$author = sanitize_text_field( $_POST['wpb-custom-author-name'] );
		} else {
			$author = "";
		}

	
	$price = '';
		if ( isset( $_POST['wpb-custom-price'] ) ) {
			$price = sanitize_text_field( $_POST['wpb-custom-price'] );
		} else {
			$price = "";
		}


	$publisher = '';
		if ( isset( $_POST['wpb-custom-publisher'] ) ) {
			$publisher = sanitize_text_field( $_POST['wpb-custom-publisher'] );
		} else {
			$publisher = "";
		}


	$year = '';
		if ( isset( $_POST['wpb-custom-year'] ) ) {
			$year = sanitize_text_field( $_POST['wpb-custom-year'] );
		} else {
			$year = "";
		}

	$edition = '';
		if ( isset( $_POST['wpb-custom-edition'] ) ) {
			$edition = sanitize_text_field( $_POST['wpb-custom-edition'] );
		} else {
			$edition = "";
		}


	$url = '';
		if ( isset( $_POST['wpb-custom-url'] ) ) {
			$url = sanitize_text_field( $_POST['wpb-custom-url'] );
		} else {
			$url = "";
		}

		update_metadata( 'post', $post_id, 'author_name', $author );
		update_metadata( 'post', $post_id, 'price', $price );
		update_metadata( 'post', $post_id, 'publisher', $publisher );
		update_metadata( 'post', $post_id, 'year', $year );
		update_metadata( 'post', $post_id, 'edition', $edition );
		update_metadata( 'post', $post_id, 'url', $url );
}

}