<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="blog-page" class="container">
    <div class="row">
        <?php
		$q = getArticlesById(1);
		if ( $q->have_posts() ) :
    	/* Start the Loop */
    	while ( $q->have_posts() ) :  $q->the_post();
		?>
                <div class="post" id="post-<?php the_ID(); ?>">
                    <div class="col s12 l6">
                        <div id ="tfix" class="card large">
                            Ecrit le <?php the_time('j F Y') ?> par <?php the_author() ?>
                            <div class="card-image">
                                <?php if (has_post_thumbnail())
                                    echo get_the_post_thumbnail(get_the_ID(), array(295, 125));
                                else {
                                    $imgthumb = catch_that_image();
                                    echo "<img src='" . $imgthumb . "' alt='" . get_the_title() . "'>";
                                } ?>
                                <!--<img src="wp-content/themes/tipikall/images/art1.jpg" alt="">-->
                            </div>
                            <h5>
                                <a class="titreart" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <?php the_excerpt('Lire la suite'); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        endif;?>
		  
    </div>
	       <div>
			   <div class="pagination">
				   <?php theme_pagination(); ?>
			   </div> 
			</div>  
</div><!-- #blog-page -->

<?php get_footer(); ?>
