<?php
/**
 * Template Name: Sitemap
 *
 * The sitemap page template displays a user-friendly overview
 * of the content of your website.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;
 get_header();
?>

    <div id="content" class="page col-full">
		<section id="main" class="col-left">

		<?php if ( isset( $woo_options['woo_breadcrumbs_show'] ) && $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
			<section id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</section><!--/#breadcrumbs -->
		<?php } ?>

	        <article <?php post_class(); ?>>


	        	<header>
	        		<h1><?php the_title(); ?></h1>
	        	</header>

	        	<section class="entry">
		            <?php
		            	if ( have_posts() ) { the_post();
		            		the_content();
		            	}
		            ?>

					<div id="sitemap-pages" class="fl" style="width:50%">
		            	<h3><?php _e( 'Pages', 'woothemes' ); ?></h3>
		            	<ul>
		           	    	<?php wp_list_pages( 'depth=0&sort_column=menu_order&title_li=' ); ?>
		            	</ul>
	            	</div><!--/#sitemap-pages-->

					<div id="sitemap-categories" class="fl" style="width:50%">
			            <h3><?php _e( 'Categories', 'woothemes' ); ?></h3>
			            <ul>
		    	            <?php wp_list_categories( 'title_li=&hierarchical=0&show_count=1' ); ?>
		        	    </ul>
	        	    </div><!--/#sitemap-categories-->

	        	    <div class="fix"></div>

			        <h3><?php _e( 'Posts per category', 'woothemes' ); ?></h3>
			        <?php

			            $cats = get_categories();
			            foreach ( $cats as $cat ) {

			            query_posts( 'cat=' . $cat->cat_ID );

			        ?>

	        			<h4><?php echo $cat->cat_name; ?></h4>
			        	<ul>
	    	        	    <?php while ( have_posts() ) { the_post(); ?>
	        	    	    <li style="font-weight:normal !important;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php _e( 'Comments', 'woothemes' ); ?> (<?php echo $post->comment_count; ?>)</li>
	            		    <?php } ?>
			        	</ul>

	    		    <?php
	    		    	}
	    		    	wp_reset_query();
	    		    ?>

	    			<div class="fix"></div>

	    			<?php if ( is_woocommerce_activated() ): ?>
	    		    <div class="fl" style="width:50%">

		        	    <h3><?php _e( 'Product Categories', 'woothemes' ) ?></h3>
		        	    <ul>
		        	    	<?php wp_list_categories( 'taxonomy=product_cat&pad_counts=1&title_li=' ); ?>
					    </ul>
		    		</div>

					<div class="fl" style="width:50%">
		    		    <h3><?php _e( 'Products', 'woothemes' ); ?></h3>
		    		    <ul>
			    		    <?php
			    		    	$args = array( 'post_type' => 'product', 'posts_per_page' => 100 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
							?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						</ul>
	        	    </div>
	        		<?php endif; ?>

	    			<div class="fix"></div>

	    		</section><!-- /.entry -->

	        </article><!-- /.post -->

        </section><!-- /#main -->

        <?php get_sidebar(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>