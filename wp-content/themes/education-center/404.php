<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @todo MODIFY AS PER THEME
 * @package education_center
 */

$error_img = get_theme_mod( '404_image', get_template_directory_uri() . '/assets/img/404.png' );

get_header(); ?>

	<div class="content-area" id="primary">
		<div class="container">
			<main id="main" class="site-main">
				<section class="error-404 not-found">
					<figure class="m-0">
						<img src="<?php echo esc_url( $error_img ); ?>">
					</figure>
					<header class="page-header">
						<h1 class="page-title">
							<?php esc_html_e( 'Sorry We Can`t Find That Page!', 'education-center' ); ?>
						</h1>
						<div class="subtitle">
							<p><?php esc_html_e( 'The page you are looking for was moved, removed, renamed or never existed.', 'education-center' ); ?></p>
						</div>
						<div class="error404-search">
							<?php get_search_form(); ?>
						</div>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-lg btn-primary"><?php esc_html_e( 'Take Me Home', 'education-center' ); ?></a>
					</header><!-- .page-header -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
			<?php
			/**
			 * @see education_center_latest_posts
			*/
			do_action( 'education_center_latest_posts' ); ?>
		</div>
	</div><!-- #primary -->
    
<?php get_footer();