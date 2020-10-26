<?php
/**
 * Rivarit page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid jutut" id="main">
        <div class="container">
        	<div class="row" id="post-background">
        		<div class="col-lg-7" id="rivarit">
        			<h1>Rivarit Reimariin</h1>				
				</div>
				<div class="col-lg-5" id="rivarit">
        							
				</div>
				<div class="col-lg-7" id="rivarit">
        			<?php $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';  ?> 				
					<p>Hinta yksityisille 8 €, yrityksille 16 €.</p>

					<p>Tallenna rivarit-kuponki PDF-muodossa</p>
				</div>
				<div class="col-lg-5" id="rivarit">
        			<img src="<?php echo $myImagesDir; ?>/rivarit.png">		
        			<p></p>			
				</div>
           </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.main -->
      

<?php get_footer(); ?>