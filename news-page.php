<?php
/**
 * Template Name: News
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package London_School
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <header class="entry-header">
                <div class="container">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php get_breadcrumb(); ?>
                </div>
            </header><!-- .entry-header -->

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
            
            <ul class="page-article posts-news">

            <?php
            // Output custom query loop
            if ( $custom_query->have_posts() ) :
                while ( $custom_query->have_posts() ) :
                    $custom_query->the_post();?>

                    <div class="the-post">
                        <div class="edit-pic-desctop">
                            <div class="icon-container">
                                <i class="fas fa-pen"></i>
                            </div>
                        </div>
                    
                        <div class="post">
                        
                            <div class="blog-title">
                                    <div class="edit-pic-mobile">
                                        <div class="icon-container">
                                            <i class="fas fa-pen"></i>
                                        </div>
                                    </div>
                                <a href="<?php the_permalink(); ?>">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                            </div>

                            <div class="blog-info-box">
                                <div class="date">
                                    <span><i class="fas fa-calendar-alt"></i></span>
                                    <span class="content"><?php echo the_date() ?></span>
                                </div>

                                <div class="comments">
                                    <i class="fas fa-comment"></i>
                                    <span class="content">
                                    <?php 
                                        $totalcomments = get_comments_number(); 
                                        if ($totalcomments == 0) {
                                            echo 'Няма коментари';
                                        } else {
                                            echo $totalcomments . ' коментар'; 
                                        }
                                    ?>
                                    </span>
                                </div>
                                    
                                <div class="category">
                                    <div><i class="fas fa-folder-open"></i></div>
                                    <div class="content"><?php the_category(); ?></div>    
                                </div>
                            </div>

                            <div class="post-content">
                                <div class="image"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div>
                                <div class="the-post-content">
                                <?php wpe_excerpt('wpe_excerptlength_news_blog', 'new_excerpt_more'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
                <!-- end of the loop -->
                <div class="pagination">
                    <div class="pagination-border">
                    <?php 
                        echo paginate_links(array(  
                            'prev_text' => __('«'),
                            'next_text' => __('»'),
                            ));         
                    ?>
                    </div>
                </div>

            
            </ul>
            
        
                <?php wp_reset_postdata(); ?>
            
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

