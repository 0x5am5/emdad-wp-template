<?php
/**
 * emdad-portfolio functions and definitions
 *
 * @package emdad-portfolio
 */

if ( ! function_exists( 'emdad_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function emdad_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on emdad-portfolio, use a find and replace
	 * to change 'emdad' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'emdad', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'emdad' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'emdad_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // emdad_setup
add_action( 'after_setup_theme', 'emdad_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function emdad_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'emdad_content_width', 640 );
}
add_action( 'after_setup_theme', 'emdad_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function emdad_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'emdad' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'emdad_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function emdad_scripts() {
	wp_enqueue_style( 'emdad-style', get_stylesheet_uri() );

	wp_enqueue_script("jquery");

	wp_enqueue_script( 'emdad-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'emdad-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'emdad-main', get_template_directory_uri() . '/js/scripts.js', array('jquery'), 1, true);
}
add_action( 'wp_enqueue_scripts', 'emdad_scripts' );

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
  		show_admin_bar(false);
	}
}

add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}

function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/emdad.png);
            padding-bottom: 30px;
            margin: 0;
    				width: 320px;
    				height: auto;
    				background-size: 320px;
        }
        .login .button.button-large
        {
					background: #0b5fc8;
			    -webkit-appearance: none;
			    -moz-appearance: none;
			    appearance: none;
			    border: 0;
			    border-radius: 0;
        }
        .login form input[type="text"],
        .login form input[type="password"]
        {
					padding: 10px;
			    background: #e1e1e1;
			    border: 1px solid #898989;
			    width: 100%;
			    font-size: 18px;
        }
        .login form input[type="text"]:focus,
        .login form input[type="password"]:focus
        {
        	border-color: #0b5fc8;
        	box-shadow: none;
        	background: #fff;
    			outline: 0;
        }
        .login form label
        {
          display: block;
    			margin-bottom: 6px;
    			font-size: 20px;
    			color: #000;
        }
        .login .message {
    			border-left-color: #0b5fc8;
    		}
    		.login #nav a:hover,
    		.login #backtoblog a:hover
    		{
    			color: #0b5fc8;
    			text-decoration: underline;
    		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Emdad Rashid Senior UX Consultant';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//functions tell whether there are previous or next 'pages' from the current page
//returns 0 if no 'page' exists, returns a number > 0 if 'page' does exist
//ob_ functions are used to suppress the previous_posts_link() and next_posts_link() from printing their output to the screen

function has_previous_posts() {
	ob_start();
	previous_posts_link();
	$result = strlen(ob_get_contents());
	ob_end_clean();
	return $result;
}

function has_next_posts() {
	ob_start();
	next_posts_link();
	$result = strlen(ob_get_contents());
	ob_end_clean();
	return $result;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
