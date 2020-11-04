<?php
/**
 * @package reimari
 */
?>
<div class="row">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<header class="entry-header">
		<div class="entry-meta">
			<h1><?php the_title(); ?></h1>
            <?php
                global $post;
                $postID = get_the_ID(); 
                $typeofarticle = get_the_category($postID);
                $thisCat = $typeofarticle[0]->term_id;


            ?>    
            <p class="author-date">
                <?php the_time('j.n.Y'); ?>
                &nbsp;|&nbsp;<?php the_author_posts_link(); ?> 
                <?php $postID = get_the_ID(); ?>
            </p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
        
        <?php 
            the_content();
         ?>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div> 
        
    </div><!-- .entry-content -->


</article><!-- #post-## -->