<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
$page = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
 
$popularpost = new WP_Query( array( 'date_query' => array( array( 'after' => '60 days ago' ) ),'posts_per_page' => $numPosts, 'offset' => $page, 'cat' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC' ) );
 
// our loop
while ( $popularpost->have_posts() ) : $popularpost->the_post(); 
		$attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                        $my_index = 0; 
                        if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                          $image = $attachments->src( 'full', $my_index );
                        else:
                          $image = $myImagesDir . "default.jpg";
                        endif;
		?>
        <div class="row tags-row article-list">
                      <a href="<?php the_permalink(); ?>" class="article-list">
                        <div class="col-xs-2">
                          <img src="<?php echo $image ?>" class="tags-image-wide" alt="Feature image" />
                        </div>
                        <div class="col-xs-10"><h4 class="tags"><?php the_title(); ?></h4>
                          <p><?php the_author(); ?><span class="text-muted"> <?php the_time('j.n.Y'); ?></span></p>
                          
                          
                        </div>
                      </a>
                      
                     </div>               
<?php       
endwhile;
wp_reset_query();
?>