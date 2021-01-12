<?php
/**
 * Jutut page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid article-front" id="main-jutut">
      
        <div class="container">     
          <div class="row"> <!-- / 3x .col-lg-4 ** Main articles - Forcing equal height on all 4 columns ** -->
            <div class="col-md-8" id="jutut">
              <div class="row display-flex">
                <?php
                  $query = array (
                    'posts_per_page' => 20,
                    'cat' => 5,
                    'orderby' => 'date',
                    'order'   => 'DESC',
                  );
                 $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';  
                 $the_query = new WP_Query( $query );    // Checking for 12 newest articles (cat 5 = juttu)
                 $i = 1;
                 while ($the_query -> have_posts()) : $the_query -> the_post();
                          /* Checking for attachments to find thumbnail picture */
                          $attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                          $my_index = 0; 
                          if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                            $image = $attachments->src( 'full', $my_index );
                          else:
                            $image = $myImagesDir . "default.jpg";
                          endif;

                    if ($i > 4) {
                  ?>
                        <article class="col-md-6 content-small">
                          <div class="row">
                            <div class="col-xs-4">
                              <img class="img-article-feature" src="<?php echo $image ?>" alt="Feature image" />
                            </div>
                            <div class="col-xs-8">
                              <a href="<?php the_permalink(); ?>">
                                <div class="info">
                                    <h2><?php the_title(); ?></h2>
                                    <p class="subheader"><?php the_time('j.n.'); ?> | <?php the_author(); ?></p>
                                </div>
                              </a>
                            </div>
                          </div>
                        </article> 
                        <?php if ($i % 2 == 0) { ?>                
                            </div> <!-- /.row -->
                          <div class="row display-flex"> 
                  <?php 
                      }     
                   } else {
                 ?>
                     <article class="col-md-6"> <!-- article column -->
                      <a href="<?php the_permalink(); ?>">
                        <div>
                          <img class="img-article-feature" src="<?php echo $image ?>" alt="Feature image" />
                          <div class="content">
                            <h3><?php the_title(); ?></h3>
                            <p class="subheader"><?php the_time('j.n.'); ?> | <?php the_author(); ?></p>
                            <?php the_excerpt(__('(Lue lisää)')); ?>
                          </div>
                        </div>
                      </a>
                    </article> 
                <?php 
                  }
                   
                   if ($i%2==0) {   /* Starting a new row when 2 articles have been displayed */
                    echo '</div>';
                    echo '<div class="row display-flex">';
                   }

                   $i++;
                   endwhile;
                   wp_reset_postdata();
                  
                  ?>

            </div><!-- /.row -->
          </div>
          <div class="col-md-4" id="sidebar">
              <aside>
                <div class="sidebar-header">
                  <h2>Luetuimmat</h2>
                </div>
                <div class="sidebar-content">
                  <ul>
            <?php
                $query = array( 
                  'date_query' => array(array('after' => '90 days ago')), 
                  'posts_per_page' => 8, 
                  'cat' => 5, 
                  'meta_key' => 'wpb_post_views_count', 
                  'orderby' => 'meta_value_num', 
                  'order' => 'DESC'  
                ); 
                $the_query = new WP_Query( $query );    // Checking for 4 newest articles
                
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
          </div>
        </div><!-- /.container -->
      </main>
      
<?php get_footer(); ?>