<?php
/**
 * This class extends from WP_Widget class defines all code necessary to run this custom widget.
 *
 * @since           1.0.0
 * @package         Wpb
 * @subpackage      Wpb/widgets
 * @author          Vaibhav <vaibhav.shukla@hbwsl.com>
 * Description      Create custom widget to display books of selected category in the sidebar.
 */

/**
 * Register custom widget named WP Book Widget .
 *
 * @return void
 */
function wp_book_widget_init() {

	register_widget( 'WP_Custom_Block_Widget' );
}

/**
 * Undocumented class
 */
class WP_Custom_Block_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'wp_book_widget',
			'description'                 => 'Books of selected category',
			'customize_selective_refresh' => true, // when editing the widget so instead of refreshing the entire page only the widget is refreshed when making changes.
		);
		parent::__construct( 'wp_book_widget', 'Book Widget', $widget_ops );
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
		// set widget defaults.
		$defaults = array(
			'title'  => '',
			'text'   => '',
			'select' => '',
		);

		// Parse current settings with defaults.
		extract( wp_parse_args( (array) $instance, $defaults ), EXTR_SKIP );
		?>

		<?php
		// Text Field.
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php __( 'Text:', 'wp-book' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
		</p>

		<?php
		// Dropdown.
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'select' ) ); ?>"><?php __( 'Select', 'wp-book' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'select' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select' ) ); ?>" class="widefat">
				<?php
				$categories = get_terms( array( 'taxonomy' => 'book category' ) );
				foreach ( $categories as $category ) {
					echo '<option value="' . esc_attr( $category->name ) . '" id="' . esc_attr( $category->name ) . '" ' . selected( $select, $category->name, false ) . '>' . esc_attr( $category->name ) . '</option>';
				}
				?>
			</select>
			</ul>
		</p>
		<?php

	}

	/**
	 * Processing widget options on update
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = '';
		if ( isset( $new_instance['title'] ) === true ) {
			$instance['title'] = wp_strip_all_tags( $new_instance['title'] );
		}

		$instance['text'] = '';
		if ( isset( $new_instance['text'] ) === true ) {
			$instance['text'] = wp_strip_all_tags( $new_instance['text'] );
		}

		$instance['select'] = '';
		if ( isset( $new_instance['select'] ) === true ) {
			$instance['select'] = wp_strip_all_tags( $new_instance['select'] );
		}

		return $instance;
	}



	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args The arguments parameter.
	 * @param array $instance The instance parameter.
	 */
	public function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		// Check the widget options.
		$text = '';
		if ( isset( $instance['text'] ) === true ) {
			$text = $instance['text'];
		}

		$select = '';
		if ( isset( $instance['select'] ) === true ) {
			$select = $instance['select'];

		}

		// Display text field.
		if ( true === $text ) {
			echo esc_html( $args['before_widget'] ) . esc_html( $args['before_title'] ) . esc_html( $text . $args['after_title'] );
		}

		// Display select field.
		$id_count = 0;
		if ( true === $select ) {
			$args  = array(
				'post_type'   => 'book',
				'post_status' => 'publish',
				'tax_query'   => array(
					array(
						'taxonomy' => 'book category',
						'field'    => 'slug',
						'terms'    => $select,
					),
				),
			);
			$query = new WP_Query( $args );

			if ( $query->have_posts() === true ) {

				while ( $query->have_posts() === true ) {
					$query->the_post();
					$id_count++;
					?>
					<h5><a href="<?php the_permalink(); ?>"><?php echo esc_html( $id_count ) . '.' . esc_html( get_the_title() ); ?></a></h5>
					<?php
				}
			}
			wp_reset_postdata();
		}
	}
}
