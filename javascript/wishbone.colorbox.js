/* colorbox for images script */
	
jQuery( 'a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".gif"]' ).colorbox({
	transition: 'none',
	scrolling: 'false',	
	maxWidth: '90%',
	maxHeight: '90%',
	rel: 'gallery',
	opacity: .75,
	fixed: 'true'
});