<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Education_Center
 */

get_header(); ?>

	<div class="content-area" id="primary">
        <div class="container">
			<div class="page-grid">
				<div id="main" class="site-main">
					<div class="grid-layout-wrap layout-col-2">
						<div class="row">
							<?php
							if ( have_posts() ) : 
							
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>	
						</div>
						<?php education_center_navigation(); ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>					
	</div>

<?php
get_footer();
