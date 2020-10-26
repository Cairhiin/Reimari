<?php
/**
 * @package reimari
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<header class="entry-header">
		<div class="entry-meta">
			<p class="author-date">
			<h1><?php the_title(); ?>
			<span class="text-muted-juttu">
				<?php the_author(); ?>
				<?php the_time('j-n-Y'); ?>
			</span>
			</h1>
			
			</p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php the_content(); ?>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div class="addthis_sharing_toolbox"></div>	
	
        <div class="related"> <!-- Related articles -->
        	
        	<?php
        		// Getting a list of the tags that belong to the post, and then find articles with similar tags
   				$tags = get_the_tags($post->ID);
   				foreach($tags as $tag) {
   					$tag = $tag->term_id;
        			$the_query = new WP_Query( array( 'tag_id' => $tag, 'posts_per_page' => 5, 'cat' => 5, 'orderby' => 'date', 'order' => 'DESC' ) );
        			$counter = 0;
        			while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
        				<?php if ($post->ID != $postID): 
        					if (($counter == 0) && ($post->ID != NULL)): ?>
        					<h3>Lue myös</h3>
        					<ul>
        				<?php $counter++; endif; ?>	
        				<?php $attachments = new Attachments( 'attachments', $post->ID );
        					$image = $myImagesDir . "default.jpg"; // backup in case there is no attachment image
							if( $attachments->exist() ) : 
								$image = $attachments->src( 'full', 0 );
							endif;
        				?>   <!-- Remove the current post from the tag search -->
        						<a href="<?php the_permalink(); ?>">
        						<li>
        							<div class="related-image">
        								<img class="img-related" src="<?php echo $image; ?>" />
        							</div>
        							<div class="related-title">
        								<?php the_title(); ?> <br /><span class="text-muted-juttu"><?php the_time('j-n-Y'); ?></span> 
        							</div>	
        						</li>
        						</a>
        				<?php endif; ?>
        			<?php endwhile; 
        		} ?>
        	</ul>	
        </div>
         <?php echo do_shortcode('[fbcomments count="off" num="5" countmsg=""]'); ?>
	</div><!-- .entry-content -->

	<div class="entry-footer">
		<?php start_entry_footer(); ?>
	</div><!-- .entry-footer -->
 		<?php endwhile; ?>
 		</article><!-- #article -->
