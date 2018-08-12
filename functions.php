<?php

require 'inc/services.php';
require 'inc/form.php';

// Initial Mammen Page Builder Setup
require get_template_directory() . '/page-builder/page-builder.php';

// Initial ShortCodes
//require get_template_directory() . '/template-parts/shortcodes/include-shortcode-files.php';

// Initial AJAX handlers
//require get_template_directory() . '/template-parts/ajax/include-ajax-files.php';

// Переносим в подвал скрипты
function footer_enqueue_scripts(){
	// if (wp_is_mobile()) {
		remove_action('wp_head','wp_print_scripts');
		remove_action('wp_head','wp_print_head_scripts',9);
		remove_action('wp_head','wp_enqueue_scripts',1);
		add_action('wp_footer','wp_print_scripts',5);
		add_action('wp_footer','wp_enqueue_scripts',5);
		add_action('wp_footer','wp_print_head_scripts',5);
	// }
}
//add_action('after_setup_theme','footer_enqueue_scripts');

// Переменная для ajax и js/css файлы
function ajaxurl_scripts () {
    wp_localize_script( 'jquery', 'ajaxurl',
                       array(
                           'url' => admin_url('admin-ajax.php')
                       ));
    $v = '0.020';

    wp_enqueue_script("jquery");
    
    wp_register_script('init', get_template_directory_uri() . '/js/init.js');
    wp_enqueue_script('init');

	wp_register_script('dev-kk', get_template_directory_uri() . '/js/dev-kk.js', array(), $v);
	wp_enqueue_script('dev-kk');

    wp_register_script('fullpage', get_template_directory_uri() . '/js/jquery.fullpage.min.js');
    wp_enqueue_script('fullpage');
    
    wp_register_script('slick', get_template_directory_uri() . '/js/slick.min.js');
    wp_enqueue_script('slick');
    
    wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js');
    wp_enqueue_script('plugins');

    wp_register_script('main', get_template_directory_uri() . '/js/main.js', array(), $v);
    wp_enqueue_script('main');
    
    wp_register_script('form', get_template_directory_uri() . '/js/form.js');
    wp_enqueue_script('form');

    wp_register_script('scrollbar', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js');
    wp_enqueue_script('scrollbar');

    wp_register_script('main-ext', get_template_directory_uri() . '/js/main-ext.js', array(), $v);
    wp_enqueue_script('main-ext');


	wp_register_style( 'g-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' );
	wp_enqueue_style( 'g-font' );

	wp_register_style( 'Myriad-Pro',  get_template_directory_uri() . '/fonts/MyriadPro/stylesheet.css' );
	wp_enqueue_style( 'Myriad-Pro' );

    wp_register_style( 'fullpage',  get_template_directory_uri() . '/css/jquery.fullpage.min.css' );
    wp_enqueue_style( 'fullpage' );

    wp_register_style( 'slick',  get_template_directory_uri() . '/css/slick.css' );
    wp_enqueue_style( 'slick' );

    wp_register_style( 'scrollbar',  get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css' );
    wp_enqueue_style( 'scrollbar' );

    wp_register_style( 'main',  get_template_directory_uri() . '/css/main.css', array(), $v );
    wp_enqueue_style( 'main' );

    wp_register_style( 'main-ext',  get_template_directory_uri() . '/css/main-ext.css', array(), $v );
    wp_enqueue_style( 'main-ext' );

	wp_register_style( 'dev-kk',  get_template_directory_uri() . '/css/dev-kk.css', array(), $v );
	wp_enqueue_style( 'dev-kk' );

    wp_register_style( 'media-t',  get_template_directory_uri() . '/css/media.css', array(), $v );
    wp_enqueue_style( 'media-t' );
}
add_action('wp_enqueue_scripts', 'ajaxurl_scripts', 40);


// убрать непонятные ссылки для Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// отключить вывод мета тэга "generator"
remove_action('wp_head', 'wp_generator');

// скрыть версию WordPress
function gb_hide_wp_ver()
{
    return '';
}
add_filter('the_generator','gb_hide_wp_ver');


/**
 * Tell WordPress to run foghorn_setup() when the 'after_setup_theme' hook is run.
 */
 
add_action( 'after_setup_theme', 'foghorn_setup' );

if ( ! function_exists( 'foghorn_setup' ) ):

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override foghorn_setup() in a child theme, add your own foghorn_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Foghorn 0.1
 */
 
function foghorn_setup() {

	/**
 	* Set the content width based on the theme's design and stylesheet.
 	*/
	if ( ! isset( $content_width ) )
		$content_width = 560;

	// Make Foghorn translatable
	load_theme_textdomain( 'foghorn', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// Styles the visual editor with editor-style.css to match the theme style
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'foghorn' ) );

	// Adds support for custom backgrounds
	add_custom_background();

	// Adds theme support for thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Creates an image thumbnail size for multiple displays
	add_image_size( 'multiple-thumb', 325, 205, true );
	
	// Sets up the option panel functions
	require_once(TEMPLATEPATH . '/extensions/options-functions.php');

}
endif; // foghorn_setup

/**
 * Sets the post excerpt length to 40 characters.
 */
 
function foghorn_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'foghorn_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
 
function foghorn_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Читать далее <span class="meta-nav">&rarr;</span>', 'foghorn' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and foghorn_continue_reading_link().
 *
 */
 
function foghorn_auto_excerpt_more( $more ) {
	return ' &hellip;' . foghorn_continue_reading_link();
}
add_filter( 'excerpt_more', 'foghorn_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
 
function foghorn_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= foghorn_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'foghorn_custom_excerpt_more' );

/**
 * Adds custom body for singular vs multiple layouts
 */
function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

/**
 * Registers the sidebars and widgetized areas.
 *
 * @since Foghorn 0.1
 */
 
function foghorn_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Sidebar', 'foghorn' ),
		'id' => 'sidebar',
		'description' => __( 'The right sidebar for posts and pages.', 'foghorn' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
}
add_action( 'widgets_init', 'foghorn_widgets_init' );

/**
 * Display navigation to next/previous pages when applicable
 */
 
function foghorn_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'foghorn' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'foghorn' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'foghorn' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

/**
 * Comments
 */
 
if ( ! function_exists( 'foghorn_comment' ) ) :

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Foghorn 0.1
 */
 
function foghorn_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'foghorn' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'foghorn' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 60;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 40;

						echo get_avatar( $comment, $avatar_size );

						printf( __( '%1$s on %2$s%3$s at %4$s%5$s <span class="says">said:</span>', 'foghorn' ),
							sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ),
							'<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '"><time pubdate datetime="' . get_comment_time( 'c' ) . '">',
							get_comment_date(),
							get_comment_time(),
							'</time></a>'
						);
					?>

					<?php edit_comment_link( __( '[Edit]', 'foghorn' ), ' ' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'foghorn' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply &darr;', 'foghorn' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for foghorn_comment()