<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package London_School
 */

?>

<header class="entry-header">
	<div class="container">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php get_breadcrumb(); ?>
	</div>
</header><!-- .entry-header -->

<article class="page-article posts-news" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="container">
		<?php london_school_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'london-school' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
