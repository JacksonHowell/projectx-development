<?php
/**
 * The template for displaying feedback content
 */

	global $woo_options;
?>

  		<?php
        	$feedback_author = get_post_meta( $post->ID, 'feedback_author', true );
        	$feedback_gravatar = get_post_meta( $post->ID, 'feedback_gravatar', true );
        	$feedback_www = get_post_meta( $post->ID, 'feedback_website_title', true );
        	$feedback_url = get_post_meta( $post->ID, 'feedback_url', true );
    	?>

	     <?php if ($feedback_gravatar != '') { ?>

	     	<div class="gravatar">
	     		<span class="gravatar-wrap"><?php echo get_avatar( $feedback_gravatar , '90' ); ?></span>
	     	</div>

	     <?php } ?>
	     <blockquote><?php the_content(); ?></blockquote>
	     <div class="author">

	     	<?php if ($feedback_author != '') { ?>
	     		<span class="name"><?php echo $feedback_author; ?></span>
	     	<?php } ?>

	     	<?php if ($feedback_www != '') { ?>
	     		<?php if ($feedback_url != '') { ?>
	     			<span class="website"><a href="<?php echo $feedback_url; ?>" title="<?php echo $feedback_www; ?>"><?php echo $feedback_www; ?></a></span>
	     		<?php } else { ?>
	     			<span class="website"><?php echo $feedback_www; ?></span>
	     		<?php } ?>
	     	<?php } else  { ?>
	     		<?php if ($feedback_url != '') { ?>
	     			<span class="website"><a href="<?php echo $feedback_url; ?>" title="<?php echo $feedback_url; ?>"><?php echo $feedback_url; ?></a></span>
	     		<?php } ?>
	     	<?php } ?>

	 </div>