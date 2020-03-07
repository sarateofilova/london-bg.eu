<?php /* Template Name: Homepage */ 

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="rslides">
			<li><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/london-title.jpg" alt=""></li>
			<li><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/slide-1.jpg" alt=""></li>
			<li><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/slide-2.jpg" alt=""></li>		
			<li><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/slide-3.jpg" alt=""></li>		
		</div>

        <?php
 
			if ( is_active_sidebar( 'custom-courses-widget' ) ) : ?>
				<div class="courses-wrapper" role="complementary">
					<div class="container">
					<h3 class="widgettitle"> Курсове</h3>

					<div class="courses-content">
						<?php dynamic_sidebar( 'custom-courses-widget' ); ?>
					</div>
					</div>
				</div>
				
			<?php endif; ?>

			<div class="news">
				<div class="container">

					<h2 class="news-title">Новини</h2>

					<div class="posts">
						<!-- // Define our WP Query Parameters -->
						<?php $the_query = new WP_Query( 'posts_per_page=10' ); ?>

						<!-- // Start our WP Query -->
						<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						
						<div class="post">
							<div class="post-image">
								<!-- // Display the Post Image with Hyperlink -->
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
							</div>	

							<div class="post-main">
								<h4 class="post-title">
									<!-- // Display the Post Title with Hyperlink -->
									<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</h4>
								<div class="post-content">
									<!-- // Display the Post Excerpt -->
									<?php wpe_excerpt('wpe_excerptlength_news_homepage', 'new_excerpt_more'); ?>
								</div>
							</div>
						</div>

						<!-- // Repeat the process and reset once it hits the limit -->
						<?php 
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>

			<div class="sponsors-slider">
				<div class="container">
				<h3 class="widgettitle">Партньори</h3>
				<ul class="slider-slick">
					<li><a href="https://www.vicesoft.com/" target="_blank"><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/vicesoft-logo-site.jpg" alt=""></a></li>
					<li><a href="https://www.decathlon.bg/" target="_blank"><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/dekatlon.png" alt=""></a></li>
					<li><a href="http://www.georgos.bg/" target="_blank"><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/georgos.png" alt=""></a></li>
					<li><a href="http://pluvai.com/" target="_blank"><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/pluvai.gif" alt=""></a></li>
					<li><a href="http://www.vitoshaparkhotel.com/" target="_blank"><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/phv.jpg" alt=""></a></li>
					<li><a href="https://www.dclean.eu/" target="_blank"><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/dcl.png" alt=""></a></li>
					<li><a href="http://miras-sport.com/" target="_blank"><img src="http://localhost:8888/londonschool/wp-content/uploads/2019/12/arena.png" alt=""></a></li>
				</ul>
				</div>
			</div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'homepage' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>