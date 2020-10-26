<?php
/**
 * @package reimari
 */
?>
<article class="post-background-archive" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</div>

		<?php if ( 'post' == get_post_type() ) : ?>
		
		<?php endif; ?>

		</header><!-- .entry-header -->
		
		<?php 
			$the_cats = get_the_category();
			$cat = $the_cats[0]->cat_name;
		?>
		
		<div class="entry-content tag-display">
		
			<p class="author-date text-muted-juttu author-date-header">
				<i class="fa fa-calendar-o" aria-hidden="true"></i> <?php the_time('j.n.Y'); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> <?php the_author_posts_link(); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-tag" aria-hidden="true"></i> <?php echo $cat; ?>
				<?php $postID = get_the_ID(); ?>
			</p>
<!-- get Attachments -->

		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>
		<?php
				
				if ($cat == "Juttu") :
					$postID = get_the_ID();
					$my_index = 0;
					$myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';  
					$attachments = new Attachments( 'attachments', $postID );
					
					if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as story preview picture - in case there is none default.jpg is set as backup */
                	          $image = $attachments->src( 'full', $my_index );
                	        else:
                	          $image = $myImagesDir . "default.jpg";
                	        endif;	
			?>
		<img class="img-no-markup" src="<?php echo $image; ?>" />
		<?php 
			$caption = $attachments->field( 'caption', $my_index  );
			if ($caption != "") : ?>
		<div class="main-image-caption">
			<?php echo $caption; ?>
		</div>
		<?php
			endif;			
		endif; ?>
			

		
	</div><!-- .entry-content -->
</article><!-- #post-## -->