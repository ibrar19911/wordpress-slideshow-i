<?php
/**
 * Provide a admin area view for the plugin.
 *
 * @package WordPress Slideshow
 */

wp_enqueue_media();

if ( ! current_user_can( 'manage_options' ) ) {
	wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
}

?>

<div class="wrap">

	<h1><?php echo esc_html__( 'RTWP Slideshow' ); ?></h1>
	<p>Use <code>[wpsi_slideshow]</code> to show the slideshow anywhere in the website.</p>

	<form method="post" action="options.php">

		<?php

		settings_fields( 'wpsi-slideshow' );
		do_settings_sections( 'wpsi-slideshow' );
		$img_ids = esc_attr( get_option( 'wpsi_images_ids' ) );

		if ( $img_ids ) {
			$img_ids_array = explode( ',', $img_ids );
		}

		?>

		<div class="wpsi-main-wrapper">

			<div id="thumbs-preview">
				<?php
				if ( isset( $img_ids_array ) && count( $img_ids_array ) > 0 ) {
					foreach ( $img_ids_array as $img_id ) {
						if ( wp_get_attachment_image_url( $img_id ) ) {
							?>
							<div id="wpsi-img-<?php echo esc_attr( $img_id ); ?>" data-img-id="<?php echo esc_attr( $img_id ); ?>">
								<img src="<?php echo esc_attr( wp_get_attachment_image_url( $img_id ) ); ?>" />
								<span class="remove">x</span>
							</div>
							<?php
						}
					}
				}
				?>
			</div>

			<div class="input-wrapper">
				<input id="upload_image_button" type="button" class="button" value="<?php echo esc_html__( 'Select Images' ); ?>" />
			</div>

		</div>

		<input type="hidden" name="action" value="update" />

		<?php submit_button(); ?>

	</form>

</div>

