/* thickbox for images script */

var	$ = jQuery;

$(document).ready(function(){
	$('img.attachment-thumbnail').parent('a').addClass('thickbox');
	$('img.attachment-wishynet-gallery').parent('a').addClass('thickbox');
});