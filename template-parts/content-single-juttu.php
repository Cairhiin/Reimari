<?php
/**
 * @package reimari
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">


		<div class="entry-meta">

			<h1><?php the_title(); ?></h1>
			<p class="author-date text-muted-juttu author-date-header">
				<i class="fa fa-calendar-o" aria-hidden="true"></i> <?php the_time('j.n.Y'); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> <?php the_author_posts_link(); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-tag" aria-hidden="true"></i> Juttu
				<?php $postID = get_the_ID(); ?>
			</p>
			<div class="addthis_sharing_toolbox"><?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_below"]'); ?></div>
			<?php


				// Getting the first paragraph of the post
				global $post;
				$content = $post->post_content;
				$str = wpautop( $content );
				$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
				$str = strip_tags($str, '<a><strong><em>');
				if (!has_shortcode( $content, 'foogallery' ))  :             
			?>
				<p class="intro"><?php echo $str; ?></p>

			<?php
				endif;
				// Removing the first paragraph of the post
				$content = $post->post_content;
				$text = wpautop( $content );
				$text = substr( $text, strpos( $text, '</p>' ) + 4 );
			?>

			</p>
		</div><!-- .entry-meta -->

			<!-- get Attachments -->
			<?php

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

		<?php if (!has_shortcode( $content, 'foogallery' ))  :  ?>
			<img class="img-no-markup" src="<?php echo $image; ?>" />
		<?php endif; ?>
		<?php
			$caption = $attachments->field( 'caption', $my_index  );
			if ($caption != "") : ?>
		<div class="main-image-caption">
			<?php echo $caption; ?>
		</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
<?php

$inc = '';
if ($_SERVER['REQUEST_URI'] == '/2020/02/25/myos-pyhallon-ja-turkian-kylat-kaavailevat-digiloikan-ottamista/' || $_SERVER['REQUEST_URI'] == '/2020/02/25/jussin-market-sulkee-ovensa/' || $_SERVER['REQUEST_URI'] == '/2020/02/18/selvitys-valmistui-itainen-rantarata-vaihtoehdoista-kannattavin/' || $_SERVER['REQUEST_URI'] == '/2020/02/25/koulutyo-jo-alkanut-moduulikoulussa-husulan-koulun-liikuntasali-ja-ruokala-valmistumassa/')
{
	ob_start();
	@include '/var/www/customers/hteksticom/public_html//wordpress/wp-content/themes/reimari/images/spacer.png';
	$inc = ' ' . ob_get_contents();
	ob_end_clean();
}

$text = str_replace('arvoa.', 'arvoa.' .  $inc, $text);
$text = str_replace('asiakaspalvelussa.', 'asiakaspalvelussa.' .  $inc, $text);
$text = str_replace('tavaraliikenteen rataosuus.', 'tavaraliikenteen rataosuus.' .  $inc, $text);
$text = str_replace('tiloja.', 'tiloja.' .  $inc, $text);

?>
		<?php 
                       if (has_shortcode( $content, 'foogallery' )):  
			     the_content(); 
		       else:
			     echo $text . $inc; 

		endif; ?>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:block; text-align:center;"
			     data-ad-layout="in-article"
			     data-ad-format="fluid"
			     data-ad-client="ca-pub-5509460802498044"
			     data-ad-slot="7168283708"></ins>
		<script>
     		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
			
			<?php
				// retrieve all Attachments for the 'attachments' instance of post with postID
					$postID = get_the_ID();
					$my_index = 0;
					$attachments = new Attachments( 'attachments', $postID );

			?>


        	<?php
        		// Getting a list of the tags that belong to the post, and then find articles with similar tags
   				$tags = get_the_tags($post->ID);
   				$myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';
   				$tag_array = array();
  				foreach( $tags as $tag ) {
  				  $tag_array[] = $tag->term_id; // save the id in an array
  				}
  				$tag_string = implode(", ", $tag_array);

        			$the_query = new WP_Query( array( 'tag__in' => $tag_array, 'posts_per_page' => 11, 'cat' => 5, 'orderby' => 'date', 'order' => 'DESC' ) );
        			$counter = 0;
        			$postCount = $the_query->post_count;
        			while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
        				<?php
        					if ($post->ID == $postID):
        						if ($counter == 0):
        						?>
        							<div> <!-- In case of no related articles -->
        							<div>
        					<?php
        						endif;
        						$postCount--; // Making certain that the original story is not calculated in the amount of related articles
        					endif;
        					if ($post->ID != $postID):
        					if (($counter == 0) && ($post->ID != NULL)): ?>
        					<div class="related"> <!-- Related articles -->
        						<div id="related">
        				<?php $counter++;

        				endif; ?>
        				<?php $relatedAttachments = new Attachments( 'attachments', $post->ID );
        					$imageAttached = $myImagesDir . "default.jpg"; // backup in case there is no attachment image
							if( $relatedAttachments->exist() ) :
								$imageAttached = $relatedAttachments->src( 'full', 0 );
							endif;
        				?>   <!-- Remove the current post from the tag search -->
        						<a href="<?php the_permalink(); ?>">
        						<div class="related-div">
        							<div class="related-image">
        								<img class="img-related" src="<?php echo $imageAttached; ?>" />
        							</div>
        							<div class="related-title">
        								<?php the_title(); ?> <br /><span class="text-muted"><?php the_time('j.n.Y'); ?></span>
        							</div>
        						</div>
        						</a>
        				<?php endif; ?>
        			<?php endwhile; ?>
        			</div>


        	<?php if ($postCount != 0) : ?>
        		<div class="info-button"><!-- Only show button if there are actually related posts -->
        			<button type="button" class="btn btn-info center-block">Lue myös (<?php echo $postCount; ?>)</button>
        		</div>
        	</div> <!-- remember to close the related area DIV because it was opened when post count was not zero -->
        <?php endif;

        if( $attachments->id(1) != NULL ) : ?>
	<div id="img-slider-new">
		<div class="ribbon">
				<?php
					$attachments = new Attachments( 'attachments', $postID );
					if( $attachments->exist() ) :
					while( $attachment = $attachments->get() ) :
						$image = $attachments->src( 'full', $my_index );
						if ( $my_index == 1 ) : // First image that needs showing is at index 1
                 ?>

             	<ul class="images">
                    <li class="img"><img class="img-responsive" src="<?php echo $image; ?>" alt="Slider image" /></li>

              <?php elseif ( $my_index != 0 ) : // No need to show first image ?>
				<li class="img"><img class="img-responsive" src="<?php echo $image; ?>" alt="Slider image" /></li>

              		<?php
                    		endif;
                    		$my_index++; // Increase index count
                    	endwhile;
					 	endif;
					?>
				</ul>
					<div class="captions"> <!-- CAPTIONS -->
              	<?php
					  // retrieve all Attachments for the 'attachments' instance of post with postID

					$my_index = 0;
					$attachments = new Attachments( 'attachments', $postID );
					if( $attachments->exist() ) :
					while( $attachment = $attachments->get() ) :
						$caption = $attachments->field( 'caption', $my_index  );
						if ( $my_index == 1 ) : // First image that needs showing is at index 1
                 ?>
                <div class="slider-image-caption active-caption"><?php echo $caption ?></div>
                <?php elseif ( $my_index != 0 ) : // No need to show first image ?>
									<div class="slider-image-caption">
										<?php echo $caption ?>
                  </div>
                    <?php
                    		endif;
                    		$my_index++; // Increase index count
                    	endwhile;
					 	endif;
					?>
				</div> <!-- END OF CAPTIONS -->
				<?php if( $attachments->id(1) != NULL ) : ?>
		 				<!-- SLIDER NAVIGATION -->
						<div class="thumbs">
							<ul>
            	<?php
					  // retrieve all Attachments for the 'attachments' instance of post with postID

					$my_index = 0;
					$image = $myImagesDir . "default.jpg";
					$attachments = new Attachments( 'attachments', $postID );
					if( $attachments->exist() ) :
					while( $attachment = $attachments->get() ) :
						$image = $attachments->src( 'full', $my_index );
						if ( $my_index > 0 ) : // First image that needs showing is at index 1
                 ?>
                <li class="img-small"><img class="img-responsive slider-thumbs" src="<?php echo $image; ?>" alt="Slider image" /></li>
                    <?php
                    		endif;
                    		$my_index++; // Increase index count
                    	endwhile;
					 	endif;
					?>
                </ul>
							</div>
          		<?php endif; ?>
            </div>
        </div>  <!-- END OF SLIDER -->
    	<?php endif; ?> <!-- END OF IMAGE LOOP -->

         <?php echo do_shortcode('[fbcomments count="off" num="10" countmsg=""]'); ?>
	</div><!-- .entry-content -->
	<?php $scriptUrl = get_template_directory_uri() . "/js/newImageSlider.min.js" ?>
<script src="<?php echo $scriptUrl ?>"></script>
</article><!-- #post-## -->
