<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package London_School
 */

?>


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

