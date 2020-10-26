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
                &nbsp;&nbsp;&nbsp;<i class="fa fa-tag" aria-hidden="true"></i> HP
				<?php $postID = get_the_ID(); ?>
			</p>

			<?php
				// Getting the first paragraph of the post
				global $post;
				$content = $post->post_content;
				$str = wpautop( $content );
				$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
				//$str = strip_tags($str, '<a><strong><em>');
				
				/* get Attachments */
				$postID = get_the_ID();
				$my_index = 0;
				$myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';
				$attachments = new Attachments( 'attachments', $postID );

				if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as story preview picture - in case there is none default.jpg is set as backup */
                    $image = $attachments->src( 'full', $my_index );
                endif; 
                if (!has_shortcode( $content, 'foogallery' ))  :             
			?>
				<div class="hp-intro">
					<?php echo $str; ?>
				</div>

			<?php
				endif;
				// Removing the first paragraph of the post
				$text = wpautop( $content );
				$text = substr( $text, strpos( $text, '</p>' ) + 4 );
			?>

			</p>
		</div><!-- .entry-meta -->

			
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

	<div class="entry-content hp-content">
		<?php
		if (has_shortcode( $content, 'foogallery' ))  : 
			the_content();
		else: 
			echo $text;
		endif;
		?>

			<!-- Go to www.addthis.com/dashboard to customize your tools -->

			<div class="addthis_sharing_toolbox"></div>
			<?php
				// retrieve all Attachments for the 'attachments' instance of post with postID
					$postID = get_the_ID();
					$my_index = 0;
					$attachments = new Attachments( 'attachments', $postID );



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
        <!-- END OF IMAGE LOOP -->
    	<?php endif; 
    		if (!has_shortcode( $content, 'foogallery' )) :
         		echo do_shortcode('[fbcomments count="off" num="5" countmsg=""]'); 
         	endif;
         	?>
	</div><!-- .entry-content -->
	<?php $scriptUrl = get_template_directory_uri() . "/js/newImageSlider.min.js" ?>
<script src="<?php echo $scriptUrl ?>"></script>
</article><!-- #post-## -->
