<?php
/**
 * Template part for displaying page content in home-page.php
 *
 * @package London_School
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
