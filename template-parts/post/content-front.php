<?php
/**
 * Template part for displaying posts on front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<!-- adding section to work with fullpage.js -->
<div class="section" id="section-<?php the_ID(); ?>">
	<div class="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

			<?php
			if ( is_single() ) {

			}
			?>

		</article><!-- #post-## -->
	</div>
	<div class="icon-scroll">
		<img src="<?php echo getTemplateImgRoot(); ?>/icon-scroll-purple.png">
	</div>
</div>