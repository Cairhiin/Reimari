<?php
/**
 * Jutut page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid article-front" id="main">
        
        <!--TEMPORARY FOR BANNER  -->
        <!-- <div class="container">
          <div class="row">
            <?php 
              $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              $image = $myImagesDir . "hamina-vanhat-ilmakuvat.png";
            ?>
            <a href="http://www.reimari.fi/ilmakuvat/" target="_self"><img src="<?php echo $image; ?>" class="top-banner" alt="Hamina ilmakuvat" /></a>
                
          </div>
        </div> -->

        <div class="container">
          <div class="row">
            <?php 
              $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              $image = $myImagesDir . "Banner_roseprint.png";
            ?>
            <a href="/yritykset">
              <img src="<?php echo $image; ?>" class="top-banner" alt="Roseprint" />
            </a>
          </div>
        </div>
      <!-- END TEMP -->
      

        <div class="container">     
          <div class="row"> <!-- / 3x .col-lg-4 ** Main articles - Forcing equal height on all 4 columns ** -->

              <?php
                $query = array (
                  'posts_per_page' => 12,
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
               ?>

               <a href="<?php the_permalink(); ?>">
               <article class="col-md-3"> <!-- article column -->
                <img class="img-article-feature" src="<?php echo $image ?>" alt="Feature image" />
                <h4><?php the_title(); ?><br /> <span class="text-muted"><?php the_time('j.n.Y'); ?></span></h4>
                <?php the_excerpt(__('(Lue lisää)')); ?>
              </article> 
            </a>
            <?php 
               if ($i%4==0){   /* Starting a new row when 4 articles have been displayed */
                echo '</div>';
                echo '<div class="row">';
               }
               $i++;
               endwhile;
               wp_reset_postdata();
              
              ?>

          </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="container">
          <div class="row">
            <?php 
              $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              $image = $myImagesDir . "auki.png";
            ?>
            <img src="<?php echo $image; ?>" class="top-banner" alt="Reimarin asiakaspalvelu on suljettu toistaiseksi" />
                
          </div>
        </div>
        </main>
        <div class="container-fluid jutut">
          <div class="container">
            <div class="row"> <!-- / 1x .col-xs-12 -->
              <div class="col-xs-12 featurette-header most-liked">
                <h2 class="featurette-heading">Luetuimmat</h2>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-4 col-sm-push-8 juttu-highlighted">
                  <div class="row">                 
                    <?php 
                      $popularpost = new WP_Query( array( 'date_query' => array( array( 'after' => '45 days ago' ) ),'posts_per_page' => 2, 'cat' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC' ) );
                      while ( $popularpost->have_posts() ) : $popularpost->the_post();
                        /* Checking for attachments to find thumbnail picture */
                        $attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                        $my_index = 0; 
                        if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                          $image = $attachments->src( 'full', $my_index );
                        else:
                          $image = $myImagesDir . "default.jpg";
                        endif;
                    ?>

                    <a href="<?php the_permalink(); ?>">
                    <div class="col-sm-12 highlight-article">
                    <img src="<?php echo $image ?>" class="tags-image-full-width" alt="Feature image" />
                    <h4 class="tags"><?php the_title(); ?><br /><span class="text-muted"><?php the_time('j.n.Y'); ?></span></h4>
                      <?php the_excerpt(__('(Lue lisää)')); ?>
                      <div class="author-highlight"><?php the_author(); ?>
                      <div class="juttu-count"><p><?php echo wpb_get_post_views(get_the_ID()); ?></p></div></div>
                    </div>
                    </a>
                <?php 
                  endwhile;
                ?>
                  </div><!-- /.row -->
                </div><!-- /.column -->
                <div class="col-sm-8 col-sm-pull-4 extra-margin">
                  <div id="jututLoader">
                <?php
                  $popularpost = new WP_Query( array( 'date_query' => array( array( 'after' => '45 days ago' ) ),'posts_per_page' => 12, 'cat' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC' ) );
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
                  if ($counter > 2){ ?>
                    <div class="row tags-row article-list">
                      <a href="<?php the_permalink(); ?>" class="article-list">
                        <div class="col-xs-2">
                          <img src="<?php echo $image ?>" class="tags-image-wide" alt="Feature image" />
                        </div>
                        <div class="col-xs-10"><h4 class="tags"><?php the_title(); ?></h4>
                          <p><?php the_author(); ?><span class="text-muted"> <?php the_time('j.n.Y'); ?></span></p>
                          
                          
                        </div>
                      </a>
                      
                     </div><!-- /.row --> 
                     
                <?php } 
                  endwhile; 
                ?>   <div class="addedContent"></div>
                    </div>           
                  <div class="row"><div class="col-xs-12"><button type="button" class="btn btn-default loadButtonJuttu center-block">Näytä Lisää</button><button type="button" class="btn btn-default center-block collapseButtonJuttu">Piilota</button></div></div> 
                  
                </div><!-- /.column --> 
              </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.container -->
      

<?php get_footer(); ?>