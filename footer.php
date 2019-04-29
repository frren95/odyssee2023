<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Odyssée_2023_Theme
 */

?>

	</div><!-- #content -->

	<?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer">
		<div class="site-footer__wrap">
			<?php
				// Make sure there is a social menu to display.
				if ( has_nav_menu( 'social' ) ) { ?>
				<nav class="social-menu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . odyssee2023_get_svg( array( 'icon' => 'chain' ) ),
						) );
					?>
				</nav><!-- .social-menu -->
			<?php } ?>

			<div class="site-info">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'odyssee2023' ), 'odyssee2023', '<a href="http://www.frederiquerenet.fr/">Frederique Renet</a>' );
				?>
			</div><!-- .site-info -->
		</div><!-- .site-footer__wrap -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
