<?php
/**
 * The sidebar footer containing a footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Odyssée_2023_Theme
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="footer-widget-area" class="widget-area footer-widgets">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</aside><!-- #footer-widget-area -->
