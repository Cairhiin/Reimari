<?php
/**
 * Painotyöt page template
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid jutut" id="main">
        <div class="container">
        	<div class="row" id="post-background">
        		<div class="col-xs-12" id="painotyot">
        		<h2>Painotyöt</h2>

				<p>Reimarista saat kätevästi laadukkaat kopiot ja kaikenlaiset painotyöt mukaanlukien käyntikortit, kutsut, esitteet, ohjelmalehdet, julisteet ym. Kysy lisää ja pyydä tarjous: risto.soikkeli@reimari.fi, puh. 0104 210 201 tai tule käymään Reimarin toimistolla!</p>
				<ul class="text">
					<li>ajanvarauskortit</li> 
					<li>esitteet</li> 
					<li>flyerit</li> 
					<li>julisteet</li> 
					<li>kirjekuoret, ikkunalla tai ilman</li> 
					<li>kopiot (suurin koko SRA3), säänkestävät A3-kokoon asti</li> 
					<li>kutsut (syntymäpäivä- ja hääkutsut ym.)</li> 
					<li>käsiohjelmat</li> 
					<li>käyntikortit</li> 
					<li>lahjakortit</li> 
					<li>seuralehdet</li> 
				</ul>
            </div>
            <div class="col-xs-12">

            	<div id="myCarousel" class="carousel slide" data-ride="carousel">
 				 <!-- Indicators -->
 				 <ol class="carousel-indicators">
 				   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
 				   <li data-target="#myCarousel" data-slide-to="1"></li>
 				   <li data-target="#myCarousel" data-slide-to="2"></li>
 				   <li data-target="#myCarousel" data-slide-to="3"></li>
 				   <li data-target="#myCarousel" data-slide-to="4"></li>
 				   <li data-target="#myCarousel" data-slide-to="5"></li>
 				   <li data-target="#myCarousel" data-slide-to="6"></li>
 				   <li data-target="#myCarousel" data-slide-to="7"></li>
 				   <li data-target="#myCarousel" data-slide-to="8"></li>
 				   <li data-target="#myCarousel" data-slide-to="9"></li>
 				   <li data-target="#myCarousel" data-slide-to="10"></li>
 				   <li data-target="#myCarousel" data-slide-to="11"></li>
 				 </ol>
				<?php $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';  ?>
				 				 <!-- Wrapper for slides -->
				 				 <div class="carousel-inner" role="listbox">
				 				   <div class="item active">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/01.jpg">
				 				   </div>
				
				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/02.jpg">
				 				   </div>
				
				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/03.jpg">
				 				   </div>
				
				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/04.jpg">
				 				   </div>

				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/05.jpg">
				 				   </div>
				
				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/06.jpg">
				 				   </div>
				
				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/07.jpg">
				 				   </div>

				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/08.jpg">
				 				   </div>
				
				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/09.jpg">
				 				   </div>
				
				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/10.jpg">
				 				   </div>

				 				   <div class="item">
				 				     <img src="<?php echo $myImagesDir; ?>/kortti/11.jpg">
				 				   </div>
				 				 </div>
				
				 				 <!-- Left and right controls -->
				 				 <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				 				   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				 				   <span class="sr-only">Previous</span>
				 				 </a>
				 				 <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				 				   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				 				   <span class="sr-only">Next</span>
				 				 </a>
				 				 <p></p>
								</div>	
     			</div>
           </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.main -->
      

<?php get_footer(); ?>