jQuery(document).ready(function() {
	var topbar = jQuery(".topbar");
	var html = jQuery(window);

	jQuery(document).on("scroll", html, function(e) {
	  if (html.scrollTop() > 350) {
	  	topbar.addClass('transparent-white').addClass('overlay-visible');
	  } else {
	    topbar.removeClass('transparent-white').addClass('overlay-visible');
	  }
	});
});