<?php
/**
 * Painotyöt page template
 *
 * @package reimari
 */
get_header(); ?>
<?php require "contactformhandler.php"; ?>
<?php get_header(); ?>

	<main class="container-fluid jutut" id="main">
        <div class="container">
        	<div class="row" id="post-background">
        		<div class="col-xs-12" id="painotyot">
        			<h1>Palaute</h1>
        			<?php 
						$wpContactFormObj = new ContactFormHandler();  
						$wpContactFormObj->handleContactForm(); 
					?>

        		</div>
           </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.main -->
      

<?php get_footer(); ?>