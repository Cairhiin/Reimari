<?php
/**
 * @package reimari
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<header class="entry-header">
		<div class="entry-meta">
			<h1><?php the_title(); ?></h1>
            <?php
                global $post;
                $postID = get_the_ID(); 
                $typeofarticle = get_the_category($postID);
                $thisCat = $typeofarticle[0]->term_id;

                /* Stripping extras from the content like the facebook plugin, and adding it manually later */
                $content = $post->post_content; 
                $str = wpautop( $content );
            ?>    
            <p class="author-date text-muted-juttu author-date-header">
                <i class="fa fa-calendar-o" aria-hidden="true"></i> <?php the_time('j.n.Y'); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> <?php the_author_posts_link(); ?> 
                &nbsp;&nbsp;&nbsp;<i class="fa fa-tag" aria-hidden="true"></i> <?php if ($thisCat == 7) : ?> Kolumni <?php else: ?> Pääkirjoitus <?php endif; ?>
                <?php $postID = get_the_ID(); ?>
            </p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
        
        <?php echo $str; ?>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div> 
        <div class="user-content">
            <div class="row">
                <div class="col-xs-3">
                
                    <?php userphoto_the_author_photo(); ?>
                </div>
                <div class="col-xs-9">
                    <h3><?php the_author_posts_link(); ?> </h3>
                    <?php the_author_meta('description'); ?>
                </div>
            </div>
        </div>
        <?php echo do_shortcode('[fbcomments count="off" num="5" countmsg=""]'); ?>
    </div><!-- .entry-content -->


</article><!-- #post-## -->