jQuery(document).ready(function($){

/*-----------------------------------------------------------------------------------*/
/* PrettyPhoto (lightbox) */
/*-----------------------------------------------------------------------------------*/

	$("a[rel^='lightbox']").prettyPhoto({ 'social_tools': false });

/*-----------------------------------------------------------------------------------*/
/* Portfolio thumbnail hover effect */
/*-----------------------------------------------------------------------------------*/

	jQuery('#portfolio img, .widget-portfolio-snapshot img').mouseover(function() {
		jQuery(this).stop().fadeTo(300, 0.5);
	});
	jQuery('#portfolio img, .widget-portfolio-snapshot img').mouseout(function() {
		jQuery(this).stop().fadeTo(400, 1.0);
	});

/*-----------------------------------------------------------------------------------*/
/* Portfolio tag toggle on page load, based on hash in URL */
/*-----------------------------------------------------------------------------------*/

	if ( jQuery( '.port-cat a' ).length ) {
		var currentHash = '';
		currentHash = window.location.hash;
		
		// If we have a hash, begin the logic.
		if ( currentHash != '' ) {
			currentHash = currentHash.replace( '#', '' );
			
			if ( jQuery( '#portfolio .' + currentHash ).length ) {
				
				// Move the "last" CSS class appropriately.
				var itemSelector = '.' + currentHash;

				// Select the appropriate item in the category menu.
				jQuery( '.port-cat a.current' ).removeClass( 'current' );
				jQuery( '.port-cat a[rel="' + currentHash + '"]' ).addClass( 'current' );
				
				// Show only the items we want to show.
				jQuery( '#portfolio .portfolio-item' ).hide();
				jQuery( '#portfolio .' + currentHash ).fadeIn( 400 );
			
			}
		}

	}

/*-----------------------------------------------------------------------------------*/
/* Portfolio tag sorting */
/*-----------------------------------------------------------------------------------*/
								
	jQuery('.has-filtering .port-cat a').click(function(evt){
		var clicked_cat = jQuery(this).attr('rel');
		
		jQuery( '.port-cat a.current' ).removeClass( 'current' );
		jQuery( this ).addClass( 'current' );
		
		// Move the "last" CSS class appropriately.
		var itemSelector = '.portfolio-item';
		if ( clicked_cat != 'all' ) {
			itemSelector = '.' + clicked_cat;
		}
		
		if( clicked_cat == 'all' ) {
			jQuery( '#portfolio .portfolio-item' ).css( 'opacity','1' );
			jQuery( '#portfolio .portfolio-item' ).hide().fadeIn(200);
		} else {
			jQuery( '#portfolio .portfolio-item' ).css( 'opacity', '0.2' );
			jQuery( '#portfolio .' + clicked_cat ).fadeIn(400);
			jQuery( '#portfolio .' + clicked_cat ).css( 'opacity','1' );
		}
		
		evt.preventDefault();
	})	
													
});