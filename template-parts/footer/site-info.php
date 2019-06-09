<?php
/**
 * Displays footer site info
 *
 */

?>
<div class="site-info">
	<?php
//	if ( function_exists( 'the_privacy_policy_link' ) ) {
//		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
//	}
	?>
	<a href="<?php echo esc_url( __( get_home_url(), 'tipikall' ) ); ?>" class="imprint">
    <?php printf( __( '©2019 - %s', 'tipikall' ), 'Tipikall' ); ?>
	</a>
</div><!-- .site-info -->
