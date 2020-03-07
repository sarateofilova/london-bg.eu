<?php
/**
 * Template part for displaying page content in contact-page.php
 *
 * @package London_School
 */

?>
<div class="container">
    <main class="contact">
    
        <article>
            <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
            
            <div class="contact-form">
                <?php echo do_shortcode( '[contact-form-7 id="185" title="Contact"]' ); ?>
            </div>
        </article>

        <div class="contact-sidebar">
            <div class="container">
                <?php dynamic_sidebar( 'contact-sidebar' ); ?>
            </div>
        </div>
    </main>
</div>
