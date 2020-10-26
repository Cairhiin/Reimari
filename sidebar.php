<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package reimari
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-3" role="complementary">



<div id="newest-stories">

<h2>Uusimmat</h2>
	<?php
	global $post;
	$myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';  
	$categories = get_the_category();
	$cat_array = array();
  				foreach($categories as $category) {
					$cat_id = $category->cat_ID;
  				}
    
	$newestpost = new WP_Query( array( 
                  'posts_per_page' => 7,
                  'cat' => $cat_id,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                  ) ); ?>
    
<?php 
	$counter = 0;
	while ( $newestpost->have_posts() ) : $newestpost->the_post(); 
	if ($counter == 0) :	
?>
	<div class="sidebar-item first-li"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="text-muted"> (<?php the_time('j.n.Y'); ?>)</span>

	<div class="PopupBox">
		<?php
			$cats = get_the_category();  // Get the category name
			$cat_id = $cats[0]->cat_ID;
			if ($cat_id == 5) :
				$attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
            	$my_index = 0; 
            	if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
            	  $image = $attachments->src( 'full', $my_index );
            	else:
            	$image = $myImagesDir . "default.jpg";
            	endif;
            
       	?>
       	<img src="<?php echo $image ?>" class="img-no-markup" />
       	<?php endif; ?>  
       	<h4 class="tags"><?php the_title(); ?><br /><span class="text-muted"><?php the_time('j.n.Y'); ?></span></h4>
                      <?php the_excerpt(__('(Lue lisää)')); ?>
                      <p><?php the_author(); ?></p>
                    
	</div></a></div>

<?php else: ?>
	<div class="sidebar-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="text-muted"> (<?php the_time('j.n.Y'); ?>)</span>

<div class="PopupBox">
		<?php
			if ($cat_id == 5) :
				$attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
            	$my_index = 0; 
            	if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
            	  $image = $attachments->src( 'full', $my_index );
            	else:
            	$image = $myImagesDir . "default.jpg";
            	endif;

       	?>
       	<img src="<?php echo $image ?>" class="img-no-markup" />
       	<?php endif; 

       	?>
       	<h4 class="tags"><?php the_title(); ?><br /><span class="text-muted"><?php the_time('j.n.Y'); ?></span></h4>
                      <?php the_excerpt(__('(Lue lisää)')); ?>
                      <p><?php the_author(); ?></p>
	</div></a></div>
<?php endif;
$counter++;
endwhile;
?>
	
</div>

<div id="most-liked">	
<h2>Luetuimmat</h2>
		
	<?php 
$popularpost = new WP_Query( array( 'date_query' => array( array( 'after' => '90 days ago' ) ), 'posts_per_page' => 7, 'cat' => $cat_id, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );

	$counter = 0;
	while ( $popularpost->have_posts() ) : $popularpost->the_post(); 
	if ($counter == 0) :	
?>
	<div class="sidebar-item first-li"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="text-muted"> (<?php the_time('j.n.Y'); ?>)</span>

	<div class="PopupBox">
		<?php
			if ($cat_id == 5) :
				$attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
            	$my_index = 0; 
            	if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
            	  $image = $attachments->src( 'full', $my_index );
            	else:
            	$image = $myImagesDir . "default.jpg";
            	endif;
            
       	?>
       	<img src="<?php echo $image ?>" class="img-no-markup" />
       	<?php endif; ?>
       	<h4 class="tags"><?php the_title(); ?><br /><span class="text-muted"><?php the_time('j.n.Y'); ?></span></h4>
                      <?php the_excerpt(__('(Lue lisää)')); ?>
                      <p><?php the_author(); ?></p>
	</div></a></div>
<?php else: ?>
	<div class="sidebar-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="text-muted"> (<?php the_time('j.n.Y'); ?>)</span>

	<div class="PopupBox">
		<?php
			if ($cat_id == 5) :
				$attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
            	$my_index = 0; 
            	if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
            	  $image = $attachments->src( 'full', $my_index );
            	else:
            	$image = $myImagesDir . "default.jpg";
            	endif;
            
       	?>
       	<img src="<?php echo $image ?>" class="img-no-markup" />
       	<?php endif; ?>
       	<h4 class="tags"><?php the_title(); ?><br /><span class="text-muted"><?php the_time('j.n.Y'); ?></span></h4>
                      <?php the_excerpt(__('(Lue lisää)')); ?>
                      <p><?php the_author(); ?></p>
	</div></a></div>
<?php endif;
$counter++;
endwhile;
?>

</div>

<div id="meta">
<?php dynamic_sidebar( 'sidebar-1' ); ?>

<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
<div class="input-group">
     <input type="text" class="form-control" placeholder="Hae" name="s" id="s1">
     <div class="input-group-btn">
       <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
     </div>
   </div>
</form>
</div><!-- #secondary -->

<div id="tag-list">	
<h2>Avainsanat</h2>
<ul><?php top_tags(); ?></ul>
</div>
</div><!-- #secondary -->
