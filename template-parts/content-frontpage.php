<?php
/**
 * Template part for displaying content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Odyssée_2023_Theme
 */
?>

<!-- WELCOME -->
<section id="welcome" class="welcome-bg">

    <?php
    $query = new WP_query( 'pagename=pole-domotique-et-sante');
    if ( $query->have_posts() )
    {
        while ( $query->have_posts() )
        {
            $query->the_post();
            echo '<h2 class="home-medium-title">' . get_the_title() . '</h2>';
            echo '<div class="entry-content">';
            the_content();
            echo '</div>';
        }
    }
    wp_reset_postdata();
    ?>
</section><!-- End section #welcome -->

<!-- SERVICES -->
<section id="services" class="welcome-bg">

    <?php
    $query = new WP_query('pagename=services');
    $services_id = $query->get_queried_object_id();

    if ( $query->have_posts() )
    {
        while ( $query->have_posts() )
        {
            $query->the_post();
            echo '<h2 class="home-medium-title">' . get_the_title() . '</h2>';
            // echo '<div class="entry-content">';
            // the_content();
            // echo '</div>';
        }
        wp_reset_postdata();
    }

    $args = array(
        'post_type' => 'page',
        'post_parent' => $services_id,
        'posts_per_page' => 3,
        'order' => 'ASC'
    );

    $services_query = new WP_query($args);

    if ( $services_query->have_posts() )
    {
        echo '<ul class="services-list">';

        while( $services_query->have_posts() )
        {
            $services_query->the_post();
            $more = 0;

            echo '<li>';
            echo '<a href="' . get_permalink() . '" title="En savoir plus à propos de ' . get_the_title() . '">';
            echo '<h3 class="services-title">' . get_the_title() . '</h3>';
            echo '</a>';
            echo '<div>';
            the_content('En savoir +');
            echo '</div>';
            echo '</li>';
        }
        wp_reset_postdata();
    }
    
    ?>
    </ul>
</section><!-- End section #services -->

<!-- CONTACT -->
<section id="contact">
    <div class="contact-container">
        <div class="contact-text">Besoin d'informations pour votre projet ?</div>
        <div class="contact-button">
            <a href="http://odyssee2023/contact/">Contactez-nous</a>
        </div>
    </div>
</section><!-- End section #contact -->

<!-- NEWS -->
<section id="news">
    <h2 class="home-medium-title">Actualités</h2>
    
    <?php

    // The Query
    $news_query = new WP_Query( array( 'post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => 3) );

    // The Loop
    if ( $news_query->have_posts() ) {
        echo '<div class="cards">';
        while ( $news_query->have_posts() ) {
            $news_query->the_post();
            $more = 0;
            echo '<article class="card">';
            echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
                echo '<figure>';
                the_post_thumbnail();
                echo '</figure>';
                echo '<div class="card-content">';
                echo '<h3>' . get_the_title() . '</h3>';
                the_excerpt();
                echo '<p class="more-link">Lire la suite</p>';
                echo '</div>';
            echo '</a>';
            echo '</article>';
        }
        echo '</div>';
        /* Restore original Post Data */
        wp_reset_postdata();
    }

    ?>
</section><!-- End section #news -->