<?php
	get_header();
	global $woo_options, $portfolio_exclude;
?>  
    <div id="content" class="col-full">
    	

    	<?php
			if ( is_front_page() && ! is_home() ) {

		?>

			<?php if (have_posts()) : $count = 0; ?>
	        <?php while (have_posts()) : the_post(); $count++; ?>
	                                                                    
	            <div <?php post_class(); ?>>

				    <h1 class="title"><?php the_title(); ?></h1>

	                <div class="entry">
	                	<?php the_content(); ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
	               	</div><!-- /.entry -->

					<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
	                
	            </div><!-- /.post -->
                
			<?php endwhile; else: ?>
				<div <?php post_class(); ?>>
	            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </div><!-- /.post -->
	        <?php endif; ?>  
<?php
			} else {
?>

	    	<?php
	    		if ( is_woocommerce_activated() && $woo_options['woo_homepage_featured_products'] == 'true' ) {
	    			$featuredproductsstrapline = $woo_options['woo_homepage_featured_products_strapline'];
			        echo '<h1 class="portfolio-title">' .__('Featured Products', 'woothemes'). ' <span class="tumblog-tagline">' . $featuredproductsstrapline . '</span></h1>';
					$featuredproductsperpage = $woo_options['woo_homepage_featured_products_perpage'];
					echo do_shortcode('[featured_products per_page="'.$featuredproductsperpage.'" columns="4"]');
		        }
		    ?>
	    	
	    	<?php
	    		if ( $woo_options['woo_portfolio'] == 'true' ) {
	    			get_template_part( 'loop', 'portfolio' );
	    		}
	    	?>
	    	<?php if ( $woo_options['woo_blog_panel'] == 'true' ) { ?>
		    	<div id="blog">
		    		<!-- #main Starts -->
		    		<div id="main" class="col-left">
					
						<?php if ( isset( $woo_options['woo_blog_panel_headers'] ) && $woo_options['woo_blog_panel_headers'] == 'true' ) { ?><h1 class="tumblog-title"><?php echo $woo_options['woo_blog_panel_header']; ?><span class="tumblog-tagline"><?php echo $woo_options['woo_blog_panel_description']; ?></span></h1><?php } ?>          
						<?php
							if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
								get_template_part( 'loop', 'tumblog' );
							} else {
								get_template_part( 'loop', 'default' );
							}
						?>
		    		   <?php if ( ( isset( $woo_options['woo_blog_page_template'] ) ) && ( $woo_options['woo_blog_page_template'] > 0 ) ) { ?><a class="fr" href="<?php echo get_permalink( $woo_options['woo_blog_page_template'] ); ?>" title="<?php esc_attr_e( 'Blog Archive', 'woothemes' ); ?>"><?php _e( 'Blog Archive', 'woothemes' ); ?> &rarr;</a><div class="fix"></div><?php } ?>
		    		   
		    		</div><!-- /#main -->
		    		<?php get_sidebar(); ?>
		    	</div>      
	        <?php } ?>

        <?php } ?>
    </div><!-- /#content -->		
<?php get_footer(); ?>