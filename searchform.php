<?php
/**
 * Template for displaying search forms in Tipikall
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( tipikall_unique_id( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo $unique_id; ?>">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'tipikall' ); ?></span>
    </label>
    <input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'tipikall' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit"><i class="material-icons">search</i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'tipikall' ); ?></span></button>
</form>