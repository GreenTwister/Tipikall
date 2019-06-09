<?php
/**
 * The template for displaying the footer
 * @version 1.0
 */

?>

<!-- <footer> -->
<div id="bloc-footer">
    <div class="row" id="footer-main-row">
        <div class="col s12 m4" id="infos-1-footer">
            <div class="col s12 m12" id="site-info-left">
            <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
            </div>
        </div>
        <div class="col s6 m4" id="infos-2-footer">
            <div class="row">
                <div class="col s12 m12 logo-svg" id="logo-footer">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo getTemplateImgRoot(); ?>/logo-tipikall-white.svg">
                    </a>
                </div>
                <div class="col s12 m12" id="footer-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col s6 m4" id="infos-3-footer">
            <div class="row">
                <div class="col s12 m12" id="cta-footer">
                    <a href="<?php echo get_home_url(); ?>/contact" class="waves-effect waves-light btn">Contact</a>
                </div>
                <div class="col s12 m12" id="">
                    <?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
                    <?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </footer> -->
</div><!-- #page -->
<?php wp_footer(); 
require('devis.php');
require('Checkprice.php');
global $wpdb;

if(!isset($wpdb))
{
    require_once('../../../../wp-config.php');
    require_once('../../../../wp-includes/wp-db.php');
}

?>

</body>
</html>
