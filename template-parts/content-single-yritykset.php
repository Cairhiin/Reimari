<?php
/**
 * @package reimari
 */
?>
<script>
	/* change the font color based on the background */
	function pickTextColorBasedOnBgColorSimple(bgColor, lightColor, darkColor) {
	  var color;
	  var r;
	  var g;
	  var b;
	  
	  if (bgColor.charAt(0) === '#') {
	  	color = bgColor.substring(1, 7);
	  	r = parseInt(color.substring(0, 2), 16); // hexToR
	  	g = parseInt(color.substring(2, 4), 16); // hexToG
	  	b = parseInt(color.substring(4, 6), 16); // hexToB
	  }

	  if (bgColor.charAt(0) === 'r') {
	  	color = bgColor.substring(4, bgColor.length - 1);
	  	var colorArray = color.split(', ');
	  	 r = colorArray[0];
	  	 g = colorArray[1];
	  	 b = colorArray[2];
	  }
	  return (((r * 0.299) + (g * 0.587) + (b * 0.114)) > 186) ?
	    darkColor : lightColor;
	}

	window.addEventListener('load', function () {
		var background = document.getElementById("yritysColor");
		var captions = document.getElementsByClassName("wp-caption-text");
		var toColor = document.getElementsByClassName("toColor");
		var bgColor = window.getComputedStyle(background, null).getPropertyValue("background-color");

		for (var i = 0; i < toColor.length; i++) {
			toColor[i].style.color = pickTextColorBasedOnBgColorSimple(bgColor, "white", "#111");
		}

		for (var i = 0; i < captions.length; i++) {
			captions[i].style.color = pickTextColorBasedOnBgColorSimple(bgColor, "white", "#111");
		}
	});
</script>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header" id="yritykset-single">

			<?php 
				$myImagesDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/images/';
        		$bg_image = $myImagesDir . "yritykset.png";
				$postID = get_the_ID();
				$tag = get_the_tags(); 
			?>

				<div class="entry-meta">
					<div class="author-date text-muted-juttu author-date-header <?php echo $tag[0]->name ?>" id="yritysColor">
		                <div class="toColor" id="header-bar"><i class='fas fa-ad'></i>&nbsp;&nbsp;ILMOITUS
		                	<span>ILMOITUS&nbsp;&nbsp;<i class='fas fa-ad'></i></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="col-md-3">
							<img src="<?php echo $bg_image; ?>">
						</div>
					</div>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->


			<div class="entry-content">
				<?php the_content(); ?>		
			</div><!-- .entry-content -->
		<script src="<?php echo $scriptUrl ?>"></script>
		</article><!-- #post-## -->

