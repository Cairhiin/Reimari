<?php
/**
 * HP page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid article-front HP-page-bar" id="main">       
        <div class="container">     
          <div class="row"> 
            <div class="col-md-8"> <!-- article column -->
              
              <?php
                $counter = 0;
                $query = array (
                  'posts_per_page' => 6,
                  'cat' => 269,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                );
               $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';  
               $the_query = new WP_Query( $query );    
               while ($the_query -> have_posts()) : $the_query -> the_post();
                        /* Checking for attachments to find thumbnail picture */
                        $attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                        $my_index = 0; 
                        if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                          $image = $attachments->src( 'full', $my_index );
                        else:
                          $image = $myImagesDir . "default.jpg";
                        endif;
                        if ($counter % 2 == 0):
                        ?>
                      <div class="row">
                    <?php endif; ?>
               <a href="<?php the_permalink(); ?>">
               <article class="col-md-6 HP-page"> <!-- article column -->
                <img class="img-article-feature" src="<?php echo $image ?>" alt="Feature image" />
                <h4><?php the_title(); ?></h4>
              </article> 
            </a>
             <?php
                if ($counter % 2 != 0):
              ?>
                </div>
                    <?php endif;
                    $counter++; 
               endwhile;
               wp_reset_postdata();
              
              ?>
              
              <div class="row"> <!-- / 1x .col-xs-12 -->
                <div class="col-md-12">
                  <h2 class="featurette-heading">Tuoreimmat</h2>
                </div>
              </div>        

                <?php
                  $popularpost = new WP_Query( array( 'posts_per_page' => 20, 'cat' => 269, 'offset' => 0, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'date', 'order' => 'DESC' ) );
                  $counter = 0;
                  while ( $popularpost->have_posts() ) : $popularpost->the_post();
                    /* Checking for attachments to find thumbnail picture */
                    $attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                        $my_index = 0; 
                        if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                          $image = $attachments->src( 'full', $my_index );
                        else:
                          $image = $myImagesDir . "default.jpg";
                        endif;
                  $counter++;
                  if ($counter > 0){ ?>
                    <div class="row hp-list"> 
                      <div>
                      <a href="<?php the_permalink(); ?>">
                        <div class="col-xs-12">
                          <div class="hp-links">
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_author(); ?><span class="text-muted"> <?php the_time('j.n.Y'); ?></span></p>          
                          </div>
                        </div>
                      </a>
                      </div>
                    </div>

                     
                <?php } 
                  endwhile; 
                  wp_reset_postdata();
                ?> 
              </div><!-- /endof article column -->
            
            <div class="col-md-4 interviews-aside"><!-- Start of Väärät pois -->
              <div class="row">
                <div class="col-xs-12">
                  <div class="aside-box">
                  <?php
                    $query = array (
                        'posts_per_page' => 1,
                        'cat' => 271,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                    );
                    $the_query = new WP_Query( $query );    
                    while ($the_query -> have_posts()) : $the_query -> the_post();
                  ?>
                  
                  <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail();
                      }
                  ?>
                  <h4 class="vaarat-header"><?php the_title(); ?></h4>
                  <div class="hp-content">
                    <?php the_content(); ?>
                  </div>
                  <?php
                    endwhile;
                    wp_reset_postdata();  
                  ?>
                  <h3 class="interview-header">VÄÄRÄT POIS</h3>
                    <ul>
                      <?php
                      $query = array (
                        'posts_per_page' => 20,
                        'cat' => 271,
                        'offet' => 0,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                      );
                      $the_query = new WP_Query( $query );    
                      while ($the_query -> have_posts()) : $the_query -> the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>">
                      <li class="interviews-aside-list">
                        <?php the_title(); ?>
                      </li>
                    </a>
                    <?php
                    endwhile;
                    ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- End of Väärät pois -->
          </div><!-- /.row -->
        </div><!-- /.container -->
        </main>
      

<?php get_footer(); ?>