<?php
/**
 * Jutut page template
 *
 * @package reimari
 */
ini_set("pcre.backtrack_limit", "-1");
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
              $image = $myImagesDir . "auki.png";
            ?>
            <img src="<?php echo $image; ?>" class="top-banner" alt="Reimarin asiakaspalvelu on suljettu toistaiseksi" />
                
          </div>
        </div>
      <!-- END TEMP -->

  
        <div class="container extra-margin-top">
        	<div class="row">
        		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ReimariMainAds -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
        	
        	<div class="row googleAd">
        		<div class="col-xs-12">
        			<?php
                		$query = array (
                  'posts_per_page' => 1,
                  'cat' => 8,
                  'orderby' => 'date',
                  'order'   => 'DESC',
                );
               
               $the_query = new WP_Query( $query );    
               $i = 1;
              ?>
        		</div>
        	</div>  <!-- END ROW -->
        <div class="row" height=1450px>
        	<div class="col-sm-12">
        		<?php
	        		while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	                <article id="post-<?php the_ID(); ?>" <?php post_class('entry') ?>>        
        				<div class="entrycontent">
          					<?php 
          						$post = get_post(get_the_ID());
          						$content = wpautop( $post->post_content );
          						$content = do_shortcode($content);
          						echo $content  ?>
        				</div>
      				</article>
			      <?php	               	
			      endwhile;
               	?> 
        	</div>
        </div><!-- END ROW -->

           <!-- / 3x .col-lg-4 ** Main articles - Forcing equal height on all 4 columns ** -->


       
<?php
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $query_args = array(
    'cat' => 8,
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order'   => 'DESC', 
  );
?>
  <?php 
  	$counter = 0;
  	$the_query = new WP_Query( $query_args );
  	if ($the_query->have_posts()) { ?>
  	
    <div class="row" id="loadExtraResults">
    <?php while ($the_query->have_posts()) { $the_query->the_post(); ?>
    <?php if ($counter >= 52) : ?>
    <div class="page col-xs-3 center">
    	<article id="post-<?php the_ID(); ?>" <?php post_class('entry') ?>>        
        	<div class="entrycontent">
          		<h4 class="entrytitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        	</div>
      	</article>
	</div>
	<?php 
		$counter++;
		if ($counter%4 == 0) :
    	?> </div><!-- END ROW -->


    <div class="row"> <?php endif;
    else: ?>
    <div class="page col-xs-3 center">
      <article id="post-<?php the_ID(); ?>" <?php post_class('entry') ?>>
        
        <div class="entrycontent">
          <?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
          <img src="<?php echo $image ?>" alt="Reimari" />
          <h4 class="entrytitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        </div>
      </article>
	</div>
        
    <?php
    	$counter++; 
    	if ($counter%4 == 0) :
    		?> </div><!-- END ROW -->

    	 <?php endif; 
	endif;
	} ?>
    

   
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <div class="errorMessage">

      </div>

      <button type="button" class="btn btn-primary loadButton center-block">Näytä Lisää</button>
    </div>
    <div class="col-lg-4"></div>
  </div>
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <div id="loader"> 
        <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
      </div> 
    </div>
    <div class="col-lg-4"></div>
  </div>
  <?php } ?>


           
        </div><!-- /.container -->
    </main><!-- /.main -->
      

<?php get_footer(); ?>