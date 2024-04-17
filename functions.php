<?php
/**
 * axyum functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package axyum
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'axyum_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function axyum_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on axyum, use a find and replace
		 * to change 'axyum' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'axyum', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'axyum' ),
				'menu-2' => esc_html__( 'Mobile', 'axyum' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'axyum_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'axyum_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function axyum_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'axyum_content_width', 640 );
}
add_action( 'after_setup_theme', 'axyum_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function axyum_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'axyum' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'axyum' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'axyum_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function axyum_scripts() {
	// deregister default jQuery included with Wordpress
	wp_deregister_script( 'jquery' );
	add_action( 'widgets_init', 'axyum_widgets_init' );

	$jquery_cdn = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js';
	wp_enqueue_script( 'jquery', $jquery_cdn, array(), '3.4.1', true );
	add_action( 'wp_enqueue_scripts', 'axyum_scripts' );
	wp_enqueue_style( 'axyum-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_enqueue_style( 'axyum-header', get_template_directory_uri() . '/css/header.css', array(), _S_VERSION );
	
	wp_enqueue_script( 'modernizr-custom', get_template_directory_uri() . '/js/modernizr-custom.js', array(), _S_VERSION, true );
	
	wp_enqueue_style( 'axyum-footer', get_template_directory_uri() . '/css/footer.css', array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), _S_VERSION );
	 wp_enqueue_style( 'MDB', get_template_directory_uri() . '/css/mdb.min.css' );
        wp_enqueue_style( 'Style', get_template_directory_uri() . '/css/style.css' );
	if ( is_front_page() ) {
		wp_enqueue_style( 'axyum-home', get_template_directory_uri() . '/css/home.css', array(), _S_VERSION );
	}
	if ( !is_front_page() ) {
		wp_enqueue_style( 'axyum-internal', get_template_directory_uri() . '/css/internal.css', array(), _S_VERSION );
	}
	
	wp_enqueue_style( 'axyum-fonts', get_template_directory_uri() . '/css/fonts.css', array(), _S_VERSION );
	wp_style_add_data( 'axyum-style', 'rtl', 'replace' );
	wp_enqueue_script( 'axyum-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'axyum-custom-js', get_template_directory_uri() . '/js/customjs.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_style( 'axyum-atf', get_template_directory_uri() . '/css/atf.css', array(), _S_VERSION );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	 //wp_enqueue_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );
       // wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
       
        //wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true );
        wp_enqueue_script( 'Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
       // wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'axyum_scripts' );




/**
 * Include CSS files
 */
/*function theme_enqueue_scripts() {
        wp_enqueue_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );
        wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'MDB', get_template_directory_uri() . '/css/mdb.min.css' );
        wp_enqueue_style( 'Style', get_template_directory_uri() . '/css/style.css' );
        wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true );
        wp_enqueue_script( 'Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true );

        }
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );*/



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}

function wpb_list_child_pages() { 
 
global $post; 
 
if ( is_page() && $post->post_parent )
 
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
 
if ( $childpages ) {
 
    $string = '<ul class="wpb_page_list">' . $childpages . '</ul>';
}
 
return $string;
 
}
 
add_shortcode('children', 'wpb_list_child_pages');

/* GLOBAL FIELDS*/

function editglobalcustomfields() {
	?>
	<div class='wrap'>
	<h2>Global Custom Fields</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>
	
		
	<h2>HOME PAGE HEADER</h2>
		
	<p><strong>Main Header Tag:</strong><br />
	<input type="text" name="headtag" size="45" value="<?php echo get_option('headtag'); ?>" /></p>

	<p><strong>Header Paragraph: </strong><br />
	<textarea name="headerpara" cols="100%" rows="3"><?php echo get_option('headerpara'); ?></textarea></p>
	
	<h2>FOCUS SECTION</h2>
	<p><strong>Focus Box 1 Title:</strong><br />
	<input type="text" name="focusTitle1" size="45" value="<?php echo get_option('focusTitle1'); ?>" /></p>

	<p><strong>Focus Box 1 Content: </strong><br />
	<textarea name="focusContent1" cols="100%" rows="2"><?php echo get_option('focusContent1'); ?></textarea></p>
	
	<p><strong>Focus Box 2 Title:</strong><br />
	<input type="text" name="focusTitle2" size="45" value="<?php echo get_option('focusTitle2'); ?>" /></p>

	<p><strong>Focus Box 2 Content: </strong><br />
	<textarea name="focusContent2" cols="100%" rows="2"><?php echo get_option('focusContent2'); ?></textarea></p>
		
	<p><strong>Focus Box 3 Title:</strong><br />
	<input type="text" name="focusTitle3" size="45" value="<?php echo get_option('focusTitle3'); ?>" /></p>

	<p><strong>Focus Box 3 Content: </strong><br />
	<textarea name="focusContent3" cols="100%" rows="2"><?php echo get_option('focusContent3'); ?></textarea></p>

	<p><strong>Focus Box 4 Title:</strong><br />
	<input type="text" name="focusTitle4" size="45" value="<?php echo get_option('focusTitle4'); ?>" /></p>

	<p><strong>Focus Box 4 Content: </strong><br />
	<textarea name="focusContent4" cols="100%" rows="2"><?php echo get_option('focusContent4'); ?></textarea></p>
		
	<h2>SHOWCASE SECTION</h2>
	<p><strong>Showcase Section Title:</strong><br />
	<input type="text" name="showtitle" size="45" value="<?php echo get_option('showtitle'); ?>" /></p>
		
	<p><strong>Showcase Paragraph </strong><br />
	<textarea name="showpara" cols="100%" rows="5"><?php echo get_option('showpara'); ?></textarea></p>
		
	<p><strong>Show Box 1:</strong><br />
	<input type="text" name="sb1" size="45" value="<?php echo get_option('sb1'); ?>" /></p>
		
	<p><strong>Show Box 2:</strong><br />
	<input type="text" name="sb2" size="45" value="<?php echo get_option('sb2'); ?>" /></p>
		
	<p><strong>Show Box 3:</strong><br />
	<input type="text" name="sb3" size="45" value="<?php echo get_option('sb3'); ?>" /></p>
		
	<p><strong>Show Box 4:</strong><br />
	<input type="text" name="sb4" size="45" value="<?php echo get_option('sb4'); ?>" /></p>
		
	<p><strong>Show Box 5:</strong><br />
	<input type="text" name="sb5" size="45" value="<?php echo get_option('sb5'); ?>" /></p>
		
	<h2>OTHER SECTION</h2>
	<p><strong>Other Things Title:</strong><br />
	<input type="text" name="othertitle" size="45" value="<?php echo get_option('othertitle'); ?>" /></p>
		
	<p><strong>Other Things Content: </strong><br />
	<textarea name="othercontent" cols="100%" rows="5"><?php echo get_option('othercontent'); ?></textarea></p>
		
	<h2>HOMEPAGE BOTTOM</h2>
	<p><strong>Who Is Title:</strong><br />
	<input type="text" name="whoistitle" size="45" value="<?php echo get_option('whoistitle'); ?>" /></p>
		
	<p><strong>Who Is Content: </strong><br />
	<textarea name="whoiscontent" cols="100%" rows="5"><?php echo get_option('whoiscontent'); ?></textarea></p>
		
	<p><strong>Lets Talk Title:</strong><br />
	<input type="text" name="talktitle" size="45" value="<?php echo get_option('talktitle'); ?>" /></p>
		
	<p><strong>Talk Content: </strong><br />
	<textarea name="talkcontent" cols="100%" rows="5"><?php echo get_option('talkcontent'); ?></textarea></p>
		
	<h2>WHAT WE DO PAGE</h2>
		
	<p><strong>What we do Title 1:</strong><br />
	<input type="text" name="wwdt1" size="45" value="<?php echo get_option('wwdt1'); ?>" /></p>
		
	<p><strong>What we do Content 1: </strong><br />
	<textarea name="wwdc1" cols="100%" rows="5"><?php echo get_option('wwdc1'); ?></textarea></p>
		
	<p><strong>What we do Title 2:</strong><br />
	<input type="text" name="wwdt2" size="45" value="<?php echo get_option('wwdt2'); ?>" /></p>
		
	<p><strong>What we do Content 2: </strong><br />
	<textarea name="wwdc2" cols="100%" rows="5"><?php echo get_option('wwdc2'); ?></textarea></p>
		
	<p><strong>What we do Title 3:</strong><br />
	<input type="text" name="wwdt3" size="45" value="<?php echo get_option('wwdt3'); ?>" /></p>
		
	<p><strong>What we do Content 3: </strong><br />
	<textarea name="wwdc3" cols="100%" rows="5"><?php echo get_option('wwdc3'); ?></textarea></p>
		
	<p><strong>What we do Title 4:</strong><br />
	<input type="text" name="wwdt4" size="45" value="<?php echo get_option('wwdt4'); ?>" /></p>
		
	<p><strong>What we do Content 4: </strong><br />
	<textarea name="wwdc4" cols="100%" rows="5"><?php echo get_option('wwdc4'); ?></textarea></p>

	<h2>FOOTER INFORMATION</h2>
		
	<p><strong>Address:</strong><br />
	<input type="text" name="footadd" size="45" value="<?php echo get_option('footadd'); ?>" /></p>
		
	<p><strong>Phone:</strong><br />
	<input type="text" name="footph" size="45" value="<?php echo get_option('footph'); ?>" /></p>
		
	<p><strong>Copyright:</strong><br />
	<input type="text" name="copy" size="45" value="<?php echo get_option('copy'); ?>" /></p>

	<p><input type="submit" name="Submit" value="Update Options" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="headtag,headerpara,focusTitle1,focusContent1,focusTitle2,focusContent2,focusTitle3,focusContent3,focusTitle4,focusContent4,showtitle,showpara,sb1,sb2,sb3,sb4,sb5,othertitle,othercontent,whoistitle,whoiscontent,talktitle,talkcontent,wwdt1,wwdc1,wwdt2,wwdc2,wwdt3,wwdc3,wwdt4,wwdc4,footadd,footph,copy" />

	</form>
	</div>
	<?php
}


/* GLOBAL FIELDS END */


