<?php
/**
 * @package London_School
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'london-school' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="header-top" class="top-header">
			<div class="container">
				<?php
	
				if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>
					<div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
					<?php dynamic_sidebar( 'custom-header-widget' ); ?>
					</div>
					
				<?php endif; ?>
			</div>
		</div>
		<div class="bottom-header-container large shrink" id='nav-bar-bottom'>
			<div id="navbar" class="container"> 
				<nav id="site-navigation" class="main-navigation">
					<div class="logo">
						<?php the_custom_logo(); ?>
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container_class' => 'stellarnav', 
						'depth'			 => '3',
						'walker' 		 => new Nav_Walker_Nav_Menu(),
					) );
					?>

				</nav><!-- #site-navigation -->
			</div>
		</div>	
	</header><!-- #masthead -->

	<div id="content" class="site-content">


