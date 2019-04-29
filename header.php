<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Odyssée_2023_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'odyssee2023' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
			
			<div class="site-branding-text">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$odyssee2023_description = get_bloginfo( 'description', 'display' );
			if ( $odyssee2023_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $odyssee2023_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menu Principal', 'odyssee2023'); ?>">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
					echo odyssee2023_get_svg( array( 'icon' => 'bars') );
				?>
			</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<?php if ( get_header_image() && is_front_page() ) : ?>
		<figure class="header-image">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="">
			</a>
		</figure><!-- .header-image -->
	<?php endif; // End header image check. ?>

	<?php
	if ( is_front_page() ) { ?>
		<div id="content" class="site-content page-home">
	<?php } else { ?>
		<div id="content" class="site-content">
	<?php }
	?>