<?php
/**
 * Template to show the front page.
 *
 * @package reimari
 */
?>

<?php get_header(); ?>

   <!-- Row of 4 newest articles
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
      <!-- START OF ARTICLES ROW -->
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
                  'posts_per_page' => 4,
                  'cat' => 5,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                ); 
               $the_query = new WP_Query( $query );    // Checking for 4 newest articles
               $i = 0;
               while ($the_query -> have_posts()) : $the_query -> the_post();
                        /* Checking if the post actually has a featured image */
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
                <img class="img-article-feature" src="<?php echo $image; ?>" alt="feature image" />
                <h4><?php the_title(); ?><br /> <span class="text-muted"><?php the_time('j-n-Y'); ?></span></h4>
                <?php the_excerpt(__('(Lue lisää)')); ?>
              </article> 
            </a>
              <?php
              $i++; 
               if ($i%4==0){   /* Starting a new row when 4 articles have been displayed */
                echo '</div>';
                echo '<div class="row">';
               }
               
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

      <!-- START OF COLUMNS ROW -->
      <div class="container-fluid kolumni">
      <div class="container">
        <!-- Two columns of text below the jumbotron -->
        <div class="row row-eq-height">
          <div class="col-md-6">
            <div class="col-lg-12 sub-col">
            <?php
              $query = array (
                  'posts_per_page' => 1,
                  'cat' => 6,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                );
               $the_query = new WP_Query( $query );     // Checking for newest pääkirjoitus
               while ($the_query -> have_posts()) : $the_query -> the_post();
            ?>  
              <h2 class="kolumni-feature">Pääkirjoitus</h2> 
              <p class="author"><?php the_author(); ?> <span class="label label-primary"><?php the_time('j-n-Y'); ?></span></p>
            </div>
            
            <div class="col-lg-12 sub-col">
              <h4><?php the_title(); ?></h4>  
              <?php the_excerpt(__('(Lue lisää)')); ?>
              <p><a class="btn btn-default" href="<?php the_permalink(); ?>">Lue lisää</a></p>   
            </div>
         
            <?php
               endwhile;
               wp_reset_postdata();
            ?>
         
          </div><!-- /.col-lg-6 ** Pääkirjoitus and Kolumni ** -->
          <div class="col-md-6">
            <div class="col-lg-12 sub-col">
            <?php
              $query = array (
                  'posts_per_page' => 1,
                  'cat' => 7,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                );
               $the_query = new WP_Query( $query );     // Checking for newest kolumni
               while ($the_query -> have_posts()) : $the_query -> the_post();
            ?>  
              <h2 class="kolumni-feature">Kolumni</h2> 
              <p class="author"><?php the_author(); ?> <span class="label label-primary"><?php the_time('j-n-Y'); ?></span></p>
            </div>
            
            <div class="col-lg-12 sub-col">
              <h4><?php the_title(); ?></h4>  
              <?php the_excerpt(__('(Lue lisää)')); ?> 
              <p><a class="btn btn-default" href="<?php the_permalink(); ?>">Lue lisää</a></p>   
            </div>

            <?php
               endwhile;
               wp_reset_postdata();
            ?>

         </div><!-- /.col-lg-6 ** Pääkirjoitus and Kolumni ** -->
       </div> <!-- end of first row -->
      </div>
      </div>

      <!-- START THE FEATURETTES -->

      <div class="container-fluid kolumni">
      <div class="container">
      <!-- <div class="row featurette1 well well-sm">
        <div class="col-md-8">
          <?php echo do_shortcode('[custom-facebook-feed]'); ?>
        </div>
        <div class="col-md-4">
           <div class="fb-page" data-href="https://www.facebook.com/Reimari.fi" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
            <div class="fb-xfbml-parse-ignore">
              <blockquote cite="https://www.facebook.com/facebook">
                <a href="https://www.facebook.com/Reimari.fi">Facebook</a>
                </blockquote>
            </div>
          </div>
        </div>
      </div> --> <!-- end of featurette row -->
      
      <!--
      <div class="row featurette1 well well-sm">
        <div class="col-md-4">
          <img src="<?php // echo $myImagesDir; ?>twitter-logo.png" />
        </div>
        <div class="col-md-8">
          <h2>Reimari on nyt myös Twitterissä</h2>
        </div>
      </div>  end of featurette row -->   
      
      <div class="row featurette1 well well-sm">
        <div class="col-md-4">
          <iframe class="google-map" src="https://maps.google.com/maps?q=60.566981,27.194273&amp;num=1&amp;ie=UTF8&amp;t=m&amp;ll=60.566264,27.194209&amp;spn=0.007381,0.018239&amp;z=15&amp;output=embed"></iframe>
        </div> 
        <div class="col-md-8">
          <h2>Reimari ilmestyy kerran viikossa keskiviikkoisin!</h2>
          <p class="lead">Maariankatu 14 | 49400 Hamina</p>
          <p>Levikki: 15.800 kpl
          | Jakelu: Jakelusuora Oy
          | Jakelualue: Hamina, Miehikkälä, Virolahti, Liikkala ja Ruotila</p>
        </div>
        
      </div>  <!-- end of featurette row -->      
      </div>  <!-- end of featurette container -->
      </div> <!-- end of fluid container -->

      <!-- /END THE FEATURETTES -->

<?php get_footer(); ?>