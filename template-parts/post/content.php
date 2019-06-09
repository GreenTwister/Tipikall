<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<!-- adding section to work with fullpage.js -->
<div class="section" id="section-<?php the_ID(); ?>">
<!-- 	<div class="container"> -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php
				if ( 'post' === get_post_type() ) {
				echo '<div class="entry-meta">';
			?>Ecrit le <?php the_time('j F Y') ?> par <?php the_author();
				echo '</div><!-- .entry-meta -->';
			};

				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} elseif ( is_front_page() && is_home() ) {
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
			</header><!-- .entry-header -->

			<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'tipikall-featured-image' ); ?>
					</a>
				</div><!-- .post-thumbnail -->
			<?php endif; ?>

			<div class="entry-content">
				<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tipikall' ),
					get_the_title()
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'tipikall' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		</article>
	

	<h3 style="text-align:center;">Derniers articles</h3>

<?php
    $recentPosts = new WP_Query();
    $recentPosts->query('showposts=3');
?>
<div class="row">
<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
	<div class="card small col s12 l3" id="resume" style="margin-right:4.33%; margin-left:4%;">
		
		<div class="card-image">
                                <?php if (has_post_thumbnail())
                                    echo get_the_post_thumbnail(get_the_ID(), array(295, 125));
                                else {
                                    $imgthumb = catch_that_image();
                                    echo "<img src='" . $imgthumb . "' alt='" . get_the_title() . "'>";
                                } ?>
                                <!--<img src="wp-content/themes/tipikall/images/art1.jpg" alt="">-->
                            </div>
		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
	</div> 
<?php endwhile; ?>
</div>
	<div class="waves-effect waves-light btn-large acentrer"><a class="ret" href="https://ocp5.entem-design.com/blog">Retour aux articles</a></div>
</div>
		
<!-- 	</div> -->