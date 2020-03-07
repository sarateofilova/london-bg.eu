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
        <div class="post-navigation"><?php  the_post_navigation( $args = array(
		'prev_text'          => '<i class="fas fa-angle-left"></i>' . '<div class="post-nav-text">' . '<h4>Предишен</h4>' . '<p class="post-nav-title">%title</p>' . '</div>',
		'next_text'          => '<div class="post-nav-text">' . '<h4>Следващ</h4>' . '<p class="post-nav-title">%title</p>' . '</div>' . '<i class="fas fa-angle-right"></i>',
		'screen_reader_text' => 'Post navigation'
        ));   
?></div>
	</div>
</header><!-- .entry-header -->

<article class="page-article posts-news" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="the-post">
		
		<div class="post">
		
			<div class="blog-title">
				<div class="edit-pic-single-post">
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
				<div class="the-post-content">
				<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'london-school' ),
		'after'  => '</div>',
	) );
	?>
		
</article><!-- #post-<?php the_ID(); ?> -->
