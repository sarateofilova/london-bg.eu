<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package London_School
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="footer1">
				  <?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<div class="footer2">
				  <?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<div class="footer3">
				  <?php dynamic_sidebar( 'footer-3' ); ?>
				</div>			
				<div class="footer4">
				  <?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			</div>
		</div>

		
	</footer><!-- #colophon -->

	<footer class="bottom-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'london-school' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				// printf( esc_html__( 'Proudly powered by %s', 'london-school' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				// printf( esc_html__( 'Theme: %1$s by %2$s.', 'london-school' ), 'london-school', '<a href="http://underscores.me/">Sara Teofilova</a>' );
				?>
		</div><!-- .site-info -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
