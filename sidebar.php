<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package reimari
 */
	function display_sidebar_part($cat, $id) {
		?>
			<aside>
	        	<div class="sidebar-header">
	        		<?php  
	        			if ($id == "liked"): 
	        				$query = array('date_query' => 
	        					array(array('after' => '90 days ago')), 
	        					'posts_per_page' => 10, 
	        					'cat' => $cat, 
	        					'meta_key' => 'wpb_post_views_count', 
	        					'orderby' => 'meta_value_num', 
	        					'order' => 'DESC' 
	        				);
	        		?>
	        			<h2>Luetuimmat</h2>
	        		<?php  
	        			else: 
	        				$query = array (
			                  'posts_per_page' => 10,
			                  'cat' => $cat,
			                  'orderby' => 'date',
			                  'order'   => 'DESC',
			                );  
    				?>
	        			<h2>Uusimmat</h2>
        			<?php  endif; ?>	
            	</div>
            	<div class="sidebar-content">
        			<ul>
		<?php	
			$the_query = new WP_Query( $query );    
			while ($the_query -> have_posts()) : $the_query -> the_post()
		?>
			<a href="<?php the_permalink(); ?>">
				<li>
					<?php the_title(); ?><br /><span><?php the_time('j.n.'); ?> | <?php the_author(); ?></span>
				</li>
			</a>
		<?php
			endwhile;
			wp_reset_postdata();
		?> 
					</ul>
				</div>
			</aside>
		<?php
	}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php
	$cats = get_the_category();  // Get the category name
	$cat_id = $cats[0]->cat_ID;
	display_sidebar_part($cat_id, "liked"); 
   	display_sidebar_part($cat_id, "newest"); 
?>
