<?php

/**
 * Template Name: Team
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<?php
$args = array(
    'post_type' => 'team',
    'posts_per_page' => -1, // Unlimited posts
	'orderby' => 'title', // Order alphabetically by name
    
);
 
// The Query
$the_query = new WP_Query( $args );
 
// The Loop
if ( $the_query->have_posts() ) :
    ?>
    <div class="team">
        <div class="container">
            <?php
            while ( $the_query->have_posts() ) :
                $the_query->the_post();
                ?>

            <article>
            
                <h3 class="name"><?php printf( get_the_title() );?></h3>

                <div class="image"><?php printf( get_the_post_thumbnail() ); ?></div>

                <section><?php the_content()?></section>
            </article>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

    <?php
else :
  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
endif;
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();