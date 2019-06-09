<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>
<div id="front-page"><!-- #fullpage -->
<?php
$q = getArticlesById(2);
if ( $q->have_posts() ) :
    /* Start the Loop */
    while ( $q->have_posts() ) :  $q->the_post();
        // your loop

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/post/content', 'front' );

    endwhile;

    the_posts_pagination( array(
        'prev_text' => '<i class="material-icons">navigate_before</i><span class="screen-reader-text">' . __( 'Previous page', 'tipikall' ) . '</span>',
        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'tipikall' ) . '</span><i class="material-icons">navigate_next</i>',
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'tipikall' ) . ' </span>',
    ) );

else :
    get_template_part( 'template-parts/post/content', 'none' );
endif;
?>
</div><!-- #fullpage -->
<?php get_footer(); 
require('devis.php');
?>

