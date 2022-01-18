<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package education_center
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

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

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
	</div><!-- #primary -->

<?php
get_footer();
