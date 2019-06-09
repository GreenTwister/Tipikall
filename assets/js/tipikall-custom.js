/**
 *  Tipikall Wordpress Theme Custom JS
 * Created by PhpStorm.
 * User: Chrisentem
 * Date: 6/2/2019
 */

/** JS **/

// Init Materialize FAB button
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
        toolbarEnabled: true
    });
});



/** JQuery **/

/**
 * Setting padding to avoid section content getting hide from header and footer
 *
 * @type {(function())|jQuery}
 */
var j = jQuery.noConflict();

j(document).ready(function(){
    
    var bgTopMargin = j('#top-nav-bar').height()+10;
    j('body').css({'background-position-y':bgTopMargin,'background-attachment':'fixed'});

    // Fixing btn height issues on other right nav btn
    j('.fixed-action-btn.toolbar').css('height', '56px');
    j('.fixed-action-btn.toolbar').click(function(){
        j(this).css('height', '100%');
    });
	
	//attempt to autoplay sliders
		j('.carousel.carousel-slider').carousel({
			fullWidth:true,
		});
		autoplay();
		// autoplay();
		function autoplay(){
			//lance les sliders en auto
			j('.carousel.carousel-slider').carousel('next');
			//la fonction se relance elle-même
			setTimeout(autoplay,4500);
		};
	
	
});