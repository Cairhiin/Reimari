<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
$page = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
 
$popularpost = new WP_Query( array( 'posts_per_page' => $numPosts, 'offset' => $page, 'cat' => 40, 'orderby' => 'date', 'order' => 'DESC' ) );
 
// our loop
while ( $popularpost->have_posts() ) : $popularpost->the_post(); 
		
		?>
        <div class="row tekstari">
          <div class="col-xs-12">
            <?php the_content(); ?> <span class="text-muted"><?php the_time('j.n.Y');  ?></span>
          </div>
        </div>          
<?php       
endwhile;
wp_reset_query();
?>