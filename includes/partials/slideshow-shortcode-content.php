<?php
/**
 * Shortcode markup for slideshow
 *
 * @package WordPress Slideshow
 */

$img_ids = esc_attr( get_option( 'wpsi_images_ids' ) );

// Check if images IDs are available convert them into array.
if ( $img_ids ) {
	$img_ids_array = explode( ',', $img_ids );
}

// If one or more images are available then convert IDs array into images URLs array.
if ( isset( $img_ids_array ) && count( $img_ids_array ) > 0 ) {

	$img_urls_arr = array();

	foreach ( $img_ids_array as $img_id ) {

		if ( wp_get_attachment_image_url( $img_id ) ) {
			$img_urls_arr[] = wp_get_attachment_image_url( $img_id, 'full' );
		}
	}
}

// HTML of slider.
if ( isset( $img_urls_arr ) && count( $img_urls_arr ) > 0 ) {
	?>

	<div class="wpsi-slideshow">
		<?php
		foreach ( $img_urls_arr as $img_url ) {
			?>
			<div class="wpsi-slide">
				<img src="<?php echo esc_attr( $img_url ); ?>">
			</div>
			<?php
		}
		?>
	</div>

	<?php
}
