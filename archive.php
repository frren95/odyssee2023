<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Odyssée_2023_Theme
 */

get_header();
?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => odyssee2023_get_svg( array( 'icon' => 'arrow-left', 'fallback' => true ) ) . __(' Plus récent', 'odyssee2023'),
				'next_text' => __('Plus ancien ', 'odyssee2023') . odyssee2023_get_svg( array( 'icon' => 'arrow-right', 'fallback' => true ) ),
				'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'odyssee2023') . '</span>',
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );
			return;

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
