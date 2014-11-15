/* Back-To-Top button script */

var $ = jQuery;
$(document).ready(function(){

	/* hide #back-to-top first */
	$("#back-to-top").hide();

	/* fade in #back-to-top */
	$(function (){
		$(window).scroll(function (){
			if ($(this).scrollTop() > 100){
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});

		/* scroll body to 0px on click */
		$('#back-to-top').click(function (){
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});