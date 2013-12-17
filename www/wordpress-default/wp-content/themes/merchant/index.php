<?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $slider_counter;
	/**
 	* The Variables
 	*
 	* Setup default variables, overriding them if the "Theme Options" have been saved.
 	*/

	$settings = array(
					'featured' => 'true',
					'custom_intro_message' => 'true',
					'features_area' => 'true',
					'content_area' => 'false',
					'blog_area' => 'false',
					'home_portfolio' => 'true',
					'home_promotion' => 'true',
					'home_feedback' => 'true',
					'shop_area' => 'false'
					);

	$settings = woo_get_dynamic_values( $settings );

    if ( is_paged() ) $is_paged = true; else $is_paged = false;
?>

    <div id="content" class="col-full">

    	<?php
    	/* Make sure we switch to the selected layout if a custom layout isn't set. */
		if ( ! is_active_sidebar( 'homepage' ) ) {

    		// Output the Slider Area
			if ( ( is_home() || is_front_page() ) && !$is_paged && isset( $woo_options['woo_featured'] ) && $woo_options['woo_featured'] == 'true' ) {
				$slider_counter = 1;
				get_template_part ( 'includes/homepage-slider-panel' );
    		}

    		// Output the Intro Area
    		if ( !$is_paged && $settings['custom_intro_message'] == 'true' ) { get_template_part( 'includes/homepage-intro-panel' ); }

    		// Output the Features Area
			if ( !$is_paged && $settings['features_area'] == 'true' ) { get_template_part( 'includes/homepage-features-panel' ); }

    		// Output the Portfolio Area
			if ( $settings['home_portfolio'] == 'true' ) { get_template_part( 'includes/homepage-portfolio-panel' ); }

    		// Output the Banner Area
			if ( $settings['home_promotion'] == 'true' ) { get_template_part( 'includes/homepage-promotion-panel' ); }

			// Output the Feedback Area
			if ( $settings['home_feedback'] == 'true' ) { get_template_part( 'includes/homepage-feedback-panel' ); }

    		// Output the Shop Area if WooCommerce is installed
			if ( $settings['shop_area'] == 'true' && is_woocommerce_activated() ) { get_template_part( 'includes/homepage-shop-panel' ); }

    		// Output the Content Area
			if ( $settings['content_area'] == 'true' ) { get_template_part( 'includes/homepage-content-panel' ); }

			// Output the Blog Area
			if ( $settings['blog_area'] == 'true' ) { get_template_part( 'includes/homepage-blog-panel' ); }

    	} else {

			// Output the Widgetized Area
			dynamic_sidebar( 'homepage' );

		} // End If Statement
		?>

    </div><!-- /#content -->

<?php get_footer(); ?>