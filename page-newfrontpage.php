<?php
/**
 * Template to show the front page.
 *
 * @package reimari
 */
?>

<?php 
	get_header(); 

	function display_sidebar($cat) {
		$query = array( 'date_query' => array( array( 'after' => '90 days ago' ) ), 'posts_per_page' => 5, 'cat' => $cat, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) ; 
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
	}
?>

	
   <!-- Row of 4 newest articles
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
      <!-- START OF ARTICLES ROW -->
      <main class="container-fluid" id="main-page">

      <!--TEMPORARY FOR BANNER  -->
  
        <!-- <div class="container">
          <div class="row">
            <?php 
              $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              $image = $myImagesDir . "Banner_roseprint.png";
            ?>
            <a href="/yritykset">
              <img src="<?php echo $image; ?>" class="top-banner" alt="Roseprint" />
            </a>
          </div>
        </div> -->
        
      <!-- END TEMP -->
     
      
        <div class="container" id="main-articles">
          <div class="row"> 
          	<div class="col-md-1">

          	</div>
          	<div class="col-md-6"> <!-- article column -->
              <?php
              $query = array (
                  'posts_per_page' => 6,
                  'cat' => array(5, 6, 7),
                  'orderby' => 'date',
                  'order'   => 'DESC',
                ); 
               $the_query = new WP_Query( $query );    // Checking for 4 newest articles
               $i = 0;
               while ($the_query -> have_posts()) : $the_query -> the_post();
                        /* Checking if the post actually has a featured image */
                       /* Checking for attachments to find thumbnail picture */
                       	$tags = get_the_tags();
                        $attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                        $my_index = 0; 
                        if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                          $image = $attachments->src( 'full', $my_index );
                        else:
                          $image = $myImagesDir . "default.jpg";
                        endif;

                        if (get_the_category()[0]->term_id == 6) {
                        	?>
                        	<article class="opinion-piece">
				            	<a href="<?php the_permalink(); ?>">
				            		<div class="kolumni content">
				            			<div class="photo">
				            				<?php userphoto_the_author_photo(); ?>
				            			</div>
				            			<div class="kolumni-header">
					            			<h2><?php the_title(); ?></h2>
					            			<p><?php the_time('j.n.'); ?> | Pääkirjoitus | <?php the_author(); ?></p>
				            			</div>
				            		</div>
				            	</a>
				            </article>
				            <?php
                        }

                        elseif (get_the_category()[0]->term_id == 7) {
                        	?>
                        	<article class="opinion-piece">
				            	<a href="<?php the_permalink(); ?>">
				            		<div class="kolumni content">
				            			<div class="photo">
				            				<?php userphoto_the_author_photo(); ?>
				            			</div>
				            			<div class="kolumni-header">
					            			<h2><?php the_title(); ?></h2>
					            			<p><?php the_time('j.n.'); ?> | Kolumni | <?php the_author(); ?></p>
				            			</div>
				            		</div>
				            	</a>
				            </article>
				            <?php
                        } else {
                          
               ?>
	              <article>
		              <a href="<?php the_permalink(); ?>">
		                <img src="<?php echo $image; ?>" alt="feature image" />
		              </a>
		                <div class="content">
		               		<a href="<?php the_permalink(); ?>">
		                		<h2><?php the_title(); ?></h2>
		                		<p><?php the_time('j.n.'); ?> | Juttu | <?php the_author() ?></p>
		                	</a>
	                	
	                	<div class="content__tags">	                			
		                		<?php
		                			foreach ($tags as $tag) {
		                				echo '<a href="' . get_tag_link($tag) . '"><div class="content__tags tag">' . $tag->name .'</div></a>';
		                			}
	            				?>       				
            			</div>
	                </div>
	              </article>
            	
            <?php
          		}
               endwhile;
               wp_reset_postdata();         
            ?>  
              </div> 
              	
              <div class="col-md-4" id="sidebar"> <!-- sidebar column -->
	            	<aside>
	            		<div class="sidebar-header">
		            		<h2>Luetuimmat</h2>
		            	</div>
		            	<div class="sidebar-content">
		            		<ul>
				            	<?php display_sidebar(5); ?>
		               		</ul>
		            	</div>
            		</aside>
            		<aside>
		            	<div class="sidebar-header">
		            		<h2>Pääkirjoitus</h2>
		            	</div>
		            	<div class="sidebar-content">
		            		<ul>
				            	<?php display_sidebar(6); ?>
               				</ul>
		            	</div>
            		</aside>
            		<aside>
		            	<div class="sidebar-header">
		            		<h2>Kolumni</h2>
		            	</div>
		            	<div class="sidebar-content">
		            		<ul>
				            	<?php display_sidebar(7); ?>
               				</ul>
		            	</div>
            		</aside>
            		<aside>
		            	<div class="sidebar-content">
		            		<iframe class="google-map" src="https://maps.google.com/maps?q=60.566981,27.194273&amp;num=1&amp;ie=UTF8&amp;t=m&amp;ll=60.566264,27.194209&amp;spn=0.007381,0.018239&amp;z=15&amp;output=embed"></iframe>
		            		<div class="sidebar-content-levikki">
			            		<h2>Reimari ilmestyy kerran viikossa keskiviikkoisin!</h2>
						          <p class="lead">Maariankatu 14 | 49400 Hamina</p>
						          <p>Levikki: 15.800 kpl
						          | Jakelu: Jakelusuora Oy
						          | Jakelualue: Hamina, Miehikkälä, Virolahti, Liikkala ja Ruotila</p>
						    </div>
		            	</div>
            		</aside>
            	</div>
            	<div class="col-md-1">

          		</div>
         	
                
          </div>
		<div class="row banner">
	            <?php 
	              $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
	              $image = $myImagesDir . "auki.png";
	            ?>
            <img src="<?php echo $image; ?>" class="top-banner" alt="Reimarin asiakaspalvelu on suljettu toistaiseksi" />
         	</div><!-- /.row -->
        </div><!-- /.container -->
      </main>

<?php get_footer(); ?>