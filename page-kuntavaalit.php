<?php
/**
 * Kuntavaalit page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid kuntavaalit" id="main">
        
        <!--TEMPORARY FOR KUNTAVAALIT -->
        <!-- <div class="container">
          <div class="row">
            <?php 
              $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              $image = $myImagesDir . "kuntavaalit_banner_top.png";
            ?>
            <a href="http://www.reimari.fi/2017/04/11/kuntavaalit-2017/" target="_self">
              <img class="top-banner" src="<?php echo $image ?>" />
            </a>
          </div>
        </div> -->
        <!-- END TEMP -->

        <div class="container">
          <div class="row"> <!-- / 3x .col-lg-4 ** Main articles - Forcing equal height on all 4 columns ** -->

              <?php
                $query = array (
                  
                  'cat' => 234,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                  'year'  => '2019'
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
                <img class="img-article-feature" src="<?php echo $image ?>" />
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
        </main>     

<?php get_footer(); ?>