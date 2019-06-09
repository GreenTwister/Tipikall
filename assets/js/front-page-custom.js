/** Scripts only for Front Page **/
var deleteLog = false;
var getHeader = j('#top-nav-bar');
var getFooter = j('#bloc-footer');
getFooter.hide();

var paddingTop = j('#top-nav-bar').height();
var paddingBottom = j('#bloc-footer').height();
j('.section:first-of-type > div:first').css('padding-top',paddingTop);
j('.section:last-of-type > div:first').css('padding-bottom',paddingBottom);


	new fullpage('#front-page', {
        anchors: ['page1', 'page2', 'page3', 'page4'],
        // sectionsColor: ['#FFFFFF', '#A88FAC', '#FFFFFF', '#EFCEFA', '#FFFFFF'],
        navigation: true,
		responsiveWidth: 0, // switch to normal scrolling no fullpage
		responsiveHeight: 500,
        // scrollOverflow: true,
        // autoScrolling: true, // restore normal scrolling with scrollBar on true when using class "section"
        // scrollBar: true,
        // navigationPosition: 'right',
        // navigationTooltips: ['First page', 'Second page', 'Third and last page'],
        afterRender: function(){
			/** getting top padding on mobile devices **/
			var winWidth = j(window).width();
			var winHeight = j(window).height();
			if ( winWidth < 600 ) {
				// j('.section:first-of-type > div').css('padding-top','100px');
				// // j('.section:last-of-type > div').css('padding-bottom',paddingBottom);
				// // j('.section-20 > div').css('padding-top',paddingTop);
				j('img.responsive-img').css('max-width','50%');
				if (winHeight <= 720) {
					j('#blog-teaser').hide();
				} else {
					j('#blog-teaser').show();
				}
			}
		},
		afterResponsive: function(isResponsive){
			j('.slide img.responsive-img').hide();
			j('#front-article .btn-large').css({"height":"36px","line-height":"36px"});
			j('.btn-floating .btn-large i').css("line-height", "36px");
			j('#front-article h2').css("font-size", "2rem");
			j('#top-nav-bar').css("position", "absolute");
			//j('#bloc-footer').css("position", "absolute");
			
		},
        onLeave: function(origin, destination, direction) {
			if ( origin.anchor == 'page1' && direction == 'down') {
				getHeader.fadeOut("slow");
			}
			if ( origin.anchor == 'page4' && direction == 'up') {
				getFooter.fadeOut("slow");
			}
			
  		},
		afterLoad: function(origin, destination, direction) {
			if (destination.anchor == 'page1' && direction == 'up') {
    			getHeader.fadeIn("slow");
			};
			if (destination.anchor == 'page4' && direction == 'down') {
    			getFooter.fadeIn("slow");
			};
			deleteLog = true;
  		},
    });


document.documentElement.removeAttribute('style');