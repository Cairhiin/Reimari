<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package reimari
 */
get_header(); ?>

	<main class="container-fluid jutut" id="main">
        <div class="container">
        <?php 
			$query = array (
		               	'posts_per_page' => 1,
        	       		'cat' => 7
              	);
			$the_query = new WP_Query( $query );    // Checking for newest kolumni (cat 7 = kolumni)
              	while ($the_query -> have_posts()) : $the_query -> the_post();
        ?>
			<div id="post-background" class="col-md-7" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<header class="entry-header">
		<div class="entry-meta">
            
            <h1><?php the_title(); ?></h1>
            <p class="author-date text-muted-juttu author-date-header">
                <i class="fa fa-calendar-o" aria-hidden="true"></i> <?php the_time('j.n.Y'); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> <?php the_author_posts_link(); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-tag" aria-hidden="true"></i> Kolumni
                <?php $postID = get_the_ID(); ?>
            </p>
        </div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
    
        <?php the_content(); ?>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div> 
        <div class="user-content">
            <div class="row">
                <div class="col-xs-3">
                    <?php userphoto_the_author_photo(); ?>
                </div>
                <div class="col-xs-9">
                    <h3><?php the_author_posts_link(); ?></h3>
                    <?php the_author_meta('description'); ?>
                </div>
            </div>
        </div>
        
         <?php echo do_shortcode('[fbcomments count="off" num="5" countmsg=""]'); ?>
    </div><!-- .entry-content -->

	<div class="entry-footer">
		<?php start_entry_footer(); ?>
	</div><!-- .entry-footer -->
 		<?php endwhile; ?>
 		</article><!-- #article -->
		</div><!-- #main -->
			<?php get_sidebar(); ?>
		</div><!-- #container -->
	</main><!-- #primary -->

<?php get_footer(); ?>