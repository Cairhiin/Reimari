<?php
/**
 * Yhteytiedot page template
 *
 * @package reimari
 */
get_header(); 
$myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';
$image = $myImagesDir . "Rekry_pieni.jpg";
?>

	<main class="container-fluid jutut" id="main">
        <div class="container">
        	<div class="row" id="post-background">
        		<div class="col-lg-12" id="painotyot">
        			<h1>Rekry</h1>
        		</div>
        	
        		<div class="col-lg-12" id="painotyot">	

        			


    <img src="<?php echo $image ?>" alt="Rekry" />

       			</div>
           </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.main -->
      

<?php get_footer(); ?>   		