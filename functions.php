<?php
/**
 * @package London_School
 */

if ( ! function_exists( 'london_school_setup' ) ) :

	function london_school_setup() {

		load_theme_textdomain( 'london-school', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'london-school' ),
		) );

		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	}
endif;
add_action( 'after_setup_theme', 'london_school_setup' );


function london_school_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'london_school_content_width', 640 );
}
add_action( 'after_setup_theme', 'london_school_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function london_school_widgets_init() {
	// topBarContactHeader
	register_sidebar( array(
        'name'          => 'top-bar',
        'id'            => 'custom-header-widget',
	) );

	// homepage courses
	register_sidebar( array(
        'name'          => 'courses',
        'id'            => 'custom-courses-widget',
	) );
	
	// homepage news
	register_sidebar( array(
        'name'          => 'news',
        'id'            => 'custom-news-widget',
    ) );
	// homepage sponsors slider
	register_sidebar( array(
        'name'          => 'Sponsors Slider',
        'id'            => 'sponsors-slider',
    ) );

	register_sidebar( array(
		'name'          => esc_html__( 'Contact Sidebar', 'london-school' ),
		'id'            => 'contact-sidebar',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer1', 'london-school' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'london-school' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer2', 'london-school' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'london-school' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer3', 'london-school' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'london-school' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer4', 'london-school' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'london-school' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'london_school_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function london_school_scripts() {
	wp_enqueue_style( 'Open Sans', "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap&subset=cyrillic,cyrillic-ext" );
	wp_enqueue_style( 'fontawesome', "https://use.fontawesome.com/releases/v5.11.2/css/all.css" );

	wp_enqueue_style( 'london-school-style', get_template_directory_uri() . '/assets/dist/css/theme.css' );
	wp_enqueue_style( 'london-school-slider', get_template_directory_uri() . '/assets/dist/css/slik.css' );
	wp_enqueue_style( 'london-school-slider-theme', get_template_directory_uri() . '/assets/dist/css/slik-theme.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'london-school-slimmenu', get_template_directory_uri() . '/assets/dist/js/navigation-menu-mobile.min.js', array(), '', true );
	wp_enqueue_script( 'london-school-slider', get_template_directory_uri() . '/assets/dist/js/responsiveslides.min.js', array(), '', true );
	wp_enqueue_script( 'london-school-sponsors-slider', get_template_directory_uri() . '/assets/dist/js/slik.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'london-school-script', get_template_directory_uri() . '/assets/dist/js/main.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'london_school_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



class Nav_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	   global $wp_query;
	   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	   $class_names = '';

	   $classes = empty( $item->classes ) ? array() : (array) $item->classes;

	   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	   $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

	   $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	   $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	   $output .= $indent . '<li' . $id .'>';

	   $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	   $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

	   $item_output = $args->before;
	   $item_output .= '<a'. $attributes .'>';
	   
	   if ( 'menu-1' == $args->theme_location ) {
		$submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
		$item_output .= ( 0 == $depth ? '<span' . $class_names .'>'.'</span>' : '' );
	}
	   $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

	   $item_output .= '</a>';
	   $item_output .= $args->after;

	   $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
   }
}


  
/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb() {
	
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		
		if( !empty($_GET['album']) ) { // If album id is passed

			if ( isset($_GET['album']) && !empty($_GET['album']) ) {
				$post_ids = $_GET['album'];
				$album_page 		= get_permalink();
			}
			
			echo "<span><a class='aigpl-breadcrumb' href='{$album_page}'>".__('Галерия', 'album-and-image-gallery-plus-lightbox')."</a>  &raquo;  ".get_the_title($post_ids)."</span>";

		} else {
			echo the_title();
		}
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
	}
}

// EXCERPT

// Changing excerpt length

function wpe_excerptlength_news_blog( $length ) {
	return 57;
}
function wpe_excerptlength_news_homepage( $length ) {
	
	return 20;
}


// Changing excerpt more
function new_excerpt_more($more) {

}

function wpmix_customize_readMore($output) {
	return $output .'<p><a class="read-more" href="'. get_permalink($post->ID) . '" title="Continue reading: '.get_the_title($post->ID).'">Read more...</a></p>';
}

function wpe_excerpt( $length_callback = '', $more_callback = '') {


    
    if ( function_exists( $length_callback ) )
        add_filter( 'excerpt_length', $length_callback );
    
    if ( function_exists( $more_callback ) )
        add_filter( 'excerpt_more', $more_callback );

    
    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    $output = $output .'<p><a class="read-more" href="'. get_permalink($post->ID) . '" title="Continue reading: '.get_the_title($post->ID).'">Read more...</a></p>';
    $output = '<p>' . $output . '</p>'; // maybe wpautop( $foo, $br )
    echo $output;
}


function team_post_type() {
   
	// Labels
	 $labels = array(
		 'name' => _x("Team", "post type general name"),
		 'singular_name' => _x("Team", "post type singular name"),
		 'menu_name' => 'Team Profiles',
		 'add_new' => _x("Add New", "team item"),
		 'add_new_item' => __("Add New Profile"),
		 'edit_item' => __("Edit Profile"),
		 'new_item' => __("New Profile"),
		 'view_item' => __("View Profile"),
		 'search_items' => __("Search Profiles"),
		 'not_found' =>  __("No Profiles Found"),
		 'not_found_in_trash' => __("No Profiles Found in Trash"),
		 'parent_item_colon' => ''
	 );
	 
	 // Register post type
	 register_post_type('team' , array(
		 'labels' => $labels,
		 'public' => true,
		 'has_archive' => false,
		 'rewrite' => false,
		 'supports' => array('title', 'editor', 'thumbnail')
	 ) );
 }
 add_action( 'init', 'team_post_type', 0 );


 // post pagination

 if ( ! function_exists( 'post_pagination' ) ) :
	function post_pagination() {
	  global $wp_query;
	  $pager = 999999999; // need an unlikely integer
  
		 echo paginate_links( array(
			  'base' => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
			  'format' => '?paged=%#%',
			  'current' => max( 1, get_query_var('paged') ),
			  'total' => $wp_query->max_num_pages
		 ) );
	}
 endif;



 add_filter( 'edit_post_link', '__return_false' );



 function wp_42573_fix_template_caching( WP_Screen $current_screen ) {
	// Only flush the file cache with each request to post list table, edit post screen, or theme editor.
	if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
		return;
	}
	$theme = wp_get_theme();
	if ( ! $theme ) {
		return;
	}
	$cache_hash = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
	$label = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
	$transient_key = substr( $label, 0, 29 ) . md5( $label );
	delete_transient( $transient_key );
}
add_action( 'current_screen', 'wp_42573_fix_template_caching' );

//Shortcode for page Opinions
function opinions($atts, $content = null) {
    extract(shortcode_atts(array(
        "slug" => '',
        "query" => ''
    ), $atts));
    global $wp_query,$post;
    $temp = $wp_query;
    $wp_query= null;
    $wp_query = new WP_Query(array( 
    'name'=> $slug,
    ));
    if(!empty($slug)){
        $query .= '&name='.$slug;
    }
    if(!empty($query)){
        $query .= $query;
    }
    $wp_query->query($query);
    ob_start();
    ?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<article>
        <div class="entry-content">

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
		</div><!-- .entry-content -->
		
    <?php endwhile; ?>

    <?php $wp_query = null; $wp_query = $temp;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
add_shortcode("opinion", "opinions");


//Move text area
function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

//delete website from comment_form
function remove_website_field($fields) {
    unset($fields['url']);    
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_website_field');

//placeholders for elements from comment_form
function my_update_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'text-domain' );
	$aria_req  = $req ? "aria-required='true'" : '';

	$fields['author'] =
		'<p class="comment-form-author">
			<label for="author">' . __( "Name", "text-domain" ) . $label . '</label>
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Name", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<label for="email">' . __( "Email", "text-domain" ) . $label . '</label>
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	// $fields['url'] =
	// 	'<p class="comment-form-url">
	// 		<label for="url">' . __( "Website", "text-domain" ) . '</label>
	// 		<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "http://google.com", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
	// 	'" size="30" />
	// 		</p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'my_update_comment_fields' );



/**
 * Change the text output that appears before the comment form
 * Note: Logged in user will not see this text.
 */
function cd_pre_comment_text( $arg ) {
  $arg['comment_notes_before'] = '<p class="comment-notes">Your email address will not be published.</p>';
  return $arg;
}
add_filter( 'comment_form_defaults', 'cd_pre_comment_text' );


