<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Odyssée_2023_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function odyssee2023_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
		$classes[] = 'archive-view';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) || is_front_page() ) {
		$classes[] = 'no-sidebar';
	} else {
		$classes[] = 'has-sidebar';
	}

	// Add a class telling us if the page sidebar is in use.
	if ( is_active_sidebar( 'sidebar-2' ) && ! is_front_page() ) {
		$classes[] = 'has-page-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'odyssee2023_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function odyssee2023_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'odyssee2023_pingback_header' );
