<?php
/**
 * Jutut page template
 *
 * @package reimari
 */

get_header(); ?>

	<main class="container-fluid article-front" id="main">
		
		<!--TEMPORARY FOR BANNER 
        <div class="container">
          <div class="row">
            <?php 
              $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              $image = $myImagesDir . "suurlippu_banner_wide.png";
            ?>
            <a href="https://www.mesenaatti.me/campaign/?id=514#single/view" target="_blank"><img src="<?php echo $image; ?>" class="top-banner" alt="Suurlippu banner" /></a>
                
          </div>
        </div>
    END TEMP -->

        <div class="container extra-margin-top">
        	<div class="row">
	        	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- ReimariMainAds -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-5509460802498044"
				     data-ad-slot="2898840675"
				     data-ad-format="auto"
				     data-full-width-responsive="true"></ins>
				<script>
				     (adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
        	<div class="row googleAd" id="post-background">
        		<div class="col-xs-12 entry-content" id="ilmakuvat">
        			<?php
                		$query = array (
                  'posts_per_page' => 1,
                  'cat' => 280,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                );
               
               $the_query = new WP_Query( $query );    // Checking for 12 newest articles (cat 5 = juttu)
               $i = 1;
               while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                
               	<header class="entry-header">
               		<div class="entry-meta">
               			<h1>
		               	<?php
		               		the_title();
		               	?>
		               	</h1>
		            </div>
		        </header>
				<!-- Go to www.addthis.com/dashboard to customize your tools -->

				<div class="addthis_sharing_toolbox"></div> 
               	<?php
               		the_content();
               	?>
               	
				<?php
               	endwhile;
               ?> 
        		</div>
        	</div>  <!-- END ROW -->

           <!-- / 3x .col-lg-4 ** Main articles - Forcing equal height on all 4 columns ** -->
           
        </div><!-- /.container -->
    </main><!-- /.main -->
      

<?php get_footer(); ?>