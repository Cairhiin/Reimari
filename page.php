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

	<div id="primary" class="content-area container-fluid top-offset">
		<div class="container">
		<main id="main" class="site-main col-md-7" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div><!-- #container -->
	</div><!-- #primary -->

<?php get_footer(); ?>
