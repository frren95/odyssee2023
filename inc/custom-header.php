<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Odyssée_2023_Theme
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses odyssee2023_header_style()
 */
function odyssee2023_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'odyssee2023_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1600,
		'height'                 => 450,
		'flex-height'            => true,
		'wp-head-callback'       => 'odyssee2023_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'odyssee2023_custom_header_setup' );


