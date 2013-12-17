/*-----------------------------------------------------------------------------------*/
/* GENERAL SCRIPTS */
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){

	/*-----------------------------------------------------------------------------------*/
	/* Add rel="lightbox" to image links if the lightbox is enabled */
	/*-----------------------------------------------------------------------------------*/

	if ( jQuery( 'body' ).hasClass( 'has-lightbox' ) && ! jQuery( 'body' ).hasClass( 'portfolio-component' ) ) {
		jQuery( 'a[href$=".jpg"], a[href$=".jpeg"], a[href$=".gif"], a[href$=".png"]' ).each( function () {
			var imageTitle = '';
			if ( jQuery( this ).next().hasClass( 'wp-caption-text' ) ) {
				imageTitle = jQuery( this ).next().text();
			}
			
			jQuery( this ).attr( 'rel', 'lightbox' ).attr( 'title', imageTitle );
		});
		
		jQuery( 'a[rel^="lightbox"]' ).prettyPhoto({ social_tools: false });
	}

	// Table alt row styling
	jQuery( '.entry table tr:odd' ).addClass( 'alt-table-row' );
	
	// FitVids - Responsive Videos
	jQuery( ".featured, .post, .widget, .panel" ).fitVids();
	
	// Add class to parent menu items with JS until WP does this natively
	jQuery("ul.sub-menu").parents().addClass('parent');
	
	// Menu hovers for floated header
	var header_width;
	function floated_header_hovers() {
		header_width = jQuery('#header').width();
		
		jQuery('#wrapper.floated-header #navigation ul li.parent').hover(function(){
			if (header_width < 300) {
				jQuery(this).addClass('fixed-hover-parent');
				jQuery(this).children('.sub-menu').addClass('fixed-hover');
			}
		});
			
		jQuery('#wrapper.floated-header #header').mouseleave(function(){
			if (header_width < 300) {
				jQuery('li.parent').removeClass('fixed-hover-parent');
				jQuery('.sub-menu').removeClass('fixed-hover');
			}
		});
	}
	
	floated_header_hovers();
	
	jQuery(window).resize(function(){
		jQuery('li.parent').removeClass('fixed-hover-parent');
		jQuery('.sub-menu').removeClass('fixed-hover');
		floated_header_hovers();
	});
	
	// Responsive Navigation (switch top drop down for select)
	jQuery('ul#top-nav').mobileMenu({
		switchWidth: 767,                   //width (in px to switch at)
		topOptionText: 'Select a page',     //first option text
		indentString: '&nbsp;&nbsp;&nbsp;'  //string for indenting nested items
	});
  	
  	
  	
  	// Show/hide the main navigation
  	jQuery('.nav-toggle').click(function() {
	  jQuery('#navigation').slideToggle('fast', function() {
	  	return false;
	    // Animation complete.
	  });
	});
	
	// Stop the navigation link moving to the anchor (Still need the anchor for semantic markup)
	jQuery('.nav-toggle a').click(function(e) {
        e.preventDefault();
    });

	// Add first and last classes in appropriate places on homepage products
    jQuery( '#shop-home li.product' ).removeClass(' first ').removeClass(' last ');
    jQuery( '#shop-home li.product:nth-child(4n)').addClass( 'last' );
    jQuery( '#shop-home li.product:nth-child(4n + 1)').addClass( 'first' );
  	
});

jQuery(window).load(function(){
	// Masonry for portfolio
	var container2 = jQuery('#portfolio');
	if ( container2.length > 0 ) {
		container2.masonry({
		  itemSelector : '.portfolio-item',
		  isAnimated: true,
		  columnWidth: function( containerWidth ) {
		  	return containerWidth / 4;
		  }
		});
	}
	// Masonry for home sections
	var container = jQuery('#features ul.section-list, #blog-home ul.section-list');
	if ( container.length > 0 ) {
		container.masonry({
		  itemSelector : '.home-section ul.section-list li',
		  isAnimated: true,
		  columnWidth: function( containerWidth ) {
		  	return containerWidth / 3;
		  }
		});
	}
});