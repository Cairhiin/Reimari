<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package start
 */

get_header(); ?>

	<main class="container-fluid jutut" id="main">
        <div class="container">
          <div class="row">
          	<div class="col-md-7" role="main">
		<?php if ( have_posts() ) : ?>

			<header class="entry-header bottom-border post-background-archive">
				<?php
					$countPosts = $wp_the_query->post_count;
					start_the_archive_title( '<h1>', ' (' . $countPosts . ') </h1>' );
					start_the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php start_the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
				</div>
				<?php get_sidebar(); ?>
			</div><!-- END OF ROW -->
         	
        </div><!-- /.container -->
    </main>      
    <?php get_footer(); ?>
