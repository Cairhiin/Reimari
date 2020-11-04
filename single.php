<?php
/**
 * The template for displaying all single posts.
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid jutut" id="main">
        <div class="container">

        <?php
        	

        	$categories = get_the_category();
			$category_id = $categories[0]->cat_ID;

        	if ($category_id != 8) : ?>
			<div id="post-background" class="col-md-7" role="main">
			
		<?php else: ?>		
			<div class="col-xs-12" role="main">
		<?php endif; ?>		
		<?php while ( have_posts() ) : the_post(); ?>

			<!-- Update post count -->
			<!-- mfunc wpb_set_post_views(get_the_ID()); --><!-- /mfunc -->
			<?php 
				$prev_post = get_adjacent_post(true, '', true);
				$next_post = get_adjacent_post(true, '', false);
				$page_id = get_option( 'page_for_posts' );
			?>

			<?php if ($category_id == 5) : ?>

				<?php get_template_part( 'template-parts/content', 'single-juttu' ); ?>

			<?php elseif (($category_id == 269) || ($category_id == 271)) : ?>

				<?php get_template_part( 'template-parts/content', 'single-hp' ); ?>

			<?php elseif (($category_id == 6) ||  ($category_id == 7)) : ?>

				<?php get_template_part( 'template-parts/content', 'single-kolumni' ); ?>
				

			<?php elseif ($category_id == 8) : ?>

				<?php get_template_part( 'template-parts/content', 'single-nakois' ); ?>

			<?php elseif ($category_id == 234) : ?>

				<?php get_template_part( 'template-parts/content', 'single-kuntavaalit' ); ?>		

			<?php elseif ($category_id == 284) : ?>

				<?php get_template_part( 'template-parts/content', 'single-yritykset' ); ?>

			<?php endif; ?>	
			
			<div class="post-navigation">
        		<div>
        			<?php	
        				if(!empty($prev_post)) {
						echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"><i class="fa fa-chevron-left" aria-hidden="true"></i> ' . $prev_post->post_title . '</a>'; }
					?>
        			<!-- <?php previous_post_link('%link', '<i class="fa fa-chevron-left" aria-hidden="true"></i> %title', TRUE); ?> -->
        		</div>
        		<div>
        			<?php
        				if(!empty($next_post)) {
						echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '"><i class="fa fa-chevron-right" aria-hidden="true"></i> ' . $next_post->post_title . '</a>'; }
					?>
        			<!-- <?php next_post_link('%link', '%title <i class="fa fa-chevron-right" aria-hidden="true"></i>', TRUE); ?> -->
        		</div>
        	</div>

		<?php endwhile; // end of the loop. ?>
			</div><!-- #main -->
			
			 <div class="col-md-4" id="sidebar">
				<?php if ($category_id != 8) : ?>
				<?php get_sidebar(); ?>
			</div><!-- #sidebar -->

			<div class="col-md-1" id="tertiary">
				<!-- #advertisement area -->
				
				<!-- TEMPORARY BANNER 
        		
            		<?php 
              			$myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              			$image = $myImagesDir . "suurlippu_banner_side.png";
            		?>
            		
            		<a href="https://www.mesenaatti.me/campaign/?id=514#single/view" target="_blank"><img src="<?php echo $image ?>" alt="Banner Image" class="img-responsive" /></a>
        		
				END TEMP -->	

			</div>
			<?php endif; ?>	
		</div><!-- #container -->
	</main><!-- #primary -->

<?php get_footer(); ?>
<!-- 00000000000000000000000000000000000 -->
<?php echo "<!--  $category_id -->"; ?>