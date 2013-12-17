<?php
/**
 * The template for displaying promotion content
 */

	global $woo_options;

?>

	<?php
	    $meta = get_post_custom( get_the_ID() );
	    $text = get_the_title( $post->ID );
	    $url = get_permalink( $post->ID );

	    if ( isset( $meta['_button_text'][0] ) && $meta['_button_text'][0] != '' ) {
	    	$text = esc_attr( $meta['_button_text'][0] );
	    }
	    if ( isset( $meta['_button_url'][0] ) && $meta['_button_url'][0] != '' ) {
	    	$url = esc_url( $meta['_button_url'][0] );
	    }
	?>
	<div class="promo-inner fix">
	    <div class="content">
	    	<a href="<?php echo $url; ?>" title="<?php the_title_attribute(); ?>">
	    	    <?php woo_image( 'link=img' ); ?>
	    	</a>
	    	<h1><a href="<?php echo $url; ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
	    	<div class="excerpt"><?php the_excerpt(); ?></div>
	    </div>
	    <div class="button-wrap">
			<a class="button sale" href="<?php echo $url; ?>" title="<?php echo $text; ?>"><?php echo $text; ?></a>
		</div>
	</div>