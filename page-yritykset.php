<?php
/**
 * Jutut page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid article-front" id="main">
      
        <div class="container" id="yritykset">     
          <?php
            $query = array (
              'posts_per_page' => 12,
              'cat' => 284,
              'orderby' => 'date',
              'order'   => 'DESC',
            );
           $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';  
           $the_query = new WP_Query( $query );    // Checking for 12 newest articles (cat 284 = yritykset)
           $i = 1;
           while ($the_query -> have_posts()) : $the_query -> the_post();
                    /* Checking for attachments to find thumbnail picture */
                    $attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                    $my_index = 0;
                    $tags = get_the_tags(); 
                    if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                      $image = $attachments->src( 'full', $my_index );
                    else:
                      $image = $myImagesDir . "default.jpg";
                    endif;
            ?>
        	<div class="row main "> <!-- / 1x .col-lg-12 ** Newest article  ** -->
               	<a href="<?php the_permalink(); ?>">
	               <article class="row no-padding <?php echo $tags[0]->name ?>"> <!-- article column -->
                  <div class="col-md-5 logo">
	                   <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="col-md-7 content">
	                   <h4><?php the_title(); ?>&nbsp;
                     <span><?php the_time('j.n.Y'); ?></span></h4>
                  </div>
	              </article>
                </a>
            </div> 
	        <?php 
            $i++;
            endwhile;
            wp_reset_postdata();           
            ?>

          </div><!-- /.row -->
        </div><!-- /.container -->
    </main>
      

<?php get_footer(); ?>