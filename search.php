<?php
/**
 * The template for displaying search results pages.
 *
 * @package start
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main class="container-fluid jutut" id="main">
			<div class="container" id="post-background">
		<?php if ( have_posts() ) : ?>

			<header class="page-header bottom-border">
				<h1><?php printf( esc_html__( 'Tuloksia: %s', 'start' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<div class="entry-content">
			<?php /* Start the Loop */ 
			$posts = query_posts($query_string); 
			 ?>
			<?php while ( have_posts() ) : the_post(); 
					$attachments = new Attachments( 'attachments' ); /* pass the instance name */ 
                        $my_index = 0; 
                        if( $attachment = $attachments->get_single( $my_index ) ) :  /* Only need first attachment as thumbnail picture - in case there is none default.jpg is set as backup */
                          $image = $attachments->src( 'full', $my_index );
                        else:
                          $image = $myImagesDir . "default.jpg";
                        endif;
                        
                        $cats = get_the_category();  // Get the category name
						$cat_name = $cats[0]->name;
						
						if (($cat_name == "Juttu") || ($cat_name == "Pääkirjoitus") || ($cat_name == "Kolumni")) :
			?>		
					
						<div class="row tags-row article-list"><div class="col-sm-2">
                    	<a href="<?php the_permalink(); ?>">
						<?php if ($cat_name == "Juttu") : ?>
                    		<img class="img-article-feature" src="<?php echo $image ?>" />
                    	<?php else: ?>
                    		<div class="haku"><?php userphoto_the_author_photo(); ?></div>
                    	<?php endif; ?>
                    </div>	
                  	<header class="col-sm-10"><h4 class="tags"><?php the_title(); ?></h4>
                    <p><?php 

                    echo $cat_name; ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> <?php the_time('j.n.Y'); ?>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> <?php the_author(); ?></p><p><?php the_excerpt(__('(Lue lisää)')); ?></p>
                  	</header>
                  	</a></div>
                  
                 <?php 
                 	endif;
                 /*
				get_template_part( 'template-parts/content', 'search' ); */
				?>

			<?php endwhile; ?>
			</div>

			<?php start_the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
