<?php
/**
 * Design and all PHP code by Frank van de Voorde
 *
 * Copyright by Reimari
 *
 * @package reimari
 */
?><!DOCTYPE html>
<html prefix="og: http://ogp.me/ns# 
          fb: http://www.facebook.com/2008/fbml">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="Haminan talousalueen uutislehti">
<meta name="author" content="Reimari">
<meta name="keywords" content="Hamina, Virolahti, Miehikkälä, Ruotila, Uutislehti, Paikallislehti">
<link rel="icon" href="favicon.ico">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
<![endif]-->
    
<!-- Custom styles for this template -->
    	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Homenaje' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Exo+2:400,400italic,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&family=Source+Serif+Pro:wght@700&display=swap' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">


<?php wp_head(); ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
</head>

<body <?php body_class(); ?>>

<!-- FACEBOOK -->
      
    
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1718524188413800',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/fi_FI/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<!--  Design and all PHP code by Frank van de Voorde - Copyright by Reimari -->
              <?php /* Setting the path to the images dir */
                $myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/'; 
              ?>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header">
		<div class="container-fluid" id="header-wrapper">
      	<div class="container logo-bar special-logo">
        <a href="http://www.reimari.fi" target="_self">
          <div class="reimari-logo"></div>
        </a>
        	
          </div><!-- .container -->
          <div class="container-fluid" id="menu-wrapper">
            <div class="container" >  
              <nav class="menu-main">
              <div class="menu-bars"><i aria-hidden="true"></i></div>
              
             <div class="skip-link screen-reader-text">
                 <a title="Skip to content" href="#content">Skip to content</a>
             </div>
             <?php wp_nav_menu( array( 'theme_location' => 'primary' , 'container' => '' , 'sub_menu' => true) ); ?>
          </nav><!-- .main -->
          </div>
      </div><!-- .container -->
    </div><!-- .container -->
    
    <div class="slider">
    <div class="arrow-prev hidden">
         <a href="#"><img src="<?php echo $myImagesDir ?>arrow-prev.png" alt="previous" /></a>
      </div>
      <div class="arrow-next hidden">
         <a href="#"><img src="<?php echo $myImagesDir ?>arrow-next.png" alt="next" /></a>
      </div>  
    
    <?php
    $query = array (
      'posts_per_page' => 4,
      'cat' => 5
    ); 
      $the_query = new WP_Query( $query ); 
      $i = 0;
      while ($the_query -> have_posts()) : $the_query -> the_post();
     
      if (has_post_thumbnail( $post->ID ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
      }
      if ($i == 0){
        ?> <div class="jumbotron slideMAIN active-slide" id="newsfeature-<?php echo $i+1; ?>" style="background-image: url('<?php echo $image[0]; ?>')">  <!-- active slide -->
        <?php
           } else {
        ?> <div class="jumbotron slideMAIN" id="newsfeature-<?php echo $i+1; ?>" style="background-image: url('<?php echo $image[0]; ?>')">  <!-- inactive slides -->
        <?php
           }
        ?>
      <div class="container-fluid newsfeature-header">          
          <a href="<?php the_permalink(); ?>">
            <div class="container">
              <div class="col-xs-12">
                <h2><?php the_title(); ?></h2> 
                    <span class="label label-primary"><?php echo the_time('j-n-Y'); ?></span>
                    <?php the_excerpt(__('(Lue lisää)')); ?>  
              </div>
            </div>  
          </a>
        </div>
    </div>

    <?php 
    $i++;
      endwhile;
      wp_reset_postdata();
    ?>

    </div> <!-- END OF SLIDER -->

	</header><!-- #masthead -->

	<div id="content">