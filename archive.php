<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package London_School
 */

get_header();
?>

	<div id="primary" class="content-area archive-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<div class="container">
					<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					get_breadcrumb();
					?>
				</div>
			</header><!-- .page-header -->

			<ul class="page-article posts-news">
				<?php endif; ?>

				<?php 
				// the query

				$custom_query_args = array( 'post_type' => 'post', 'posts_per_page=10', 'post_status' => 'publish', 'orderby' => 'date',);

				// Get current page and append to custom query parameters array
				$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

				// Instantiate custom query
				$custom_query = new WP_Query( $custom_query_args );

				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $custom_query;
				?>
				<?php if ( $custom_query->have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( $custom_query->have_posts() ) :
						$custom_query->the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
