<?php
/**
 * valtenna functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package valtenna
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'valtenna_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function valtenna_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on valtenna, use a find and replace
		 * to change 'valtenna' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'valtenna', get_template_directory() . '/languages' );

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
				'main-menu' => esc_html__( 'Primary', 'valtenna' ),
				'footer-menu' => esc_html__( 'Footer', 'valtenna' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * gutenberg
		 * @var [type]
		 */
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support('editor-styles');
		add_editor_style( 'editor-style.min.css' );

		/**
		 * [add_theme_support post-formats]
		 * @var [type]
		 */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'video'
			)
		);
		add_post_type_support( 'post', 'post-formats' );

		/**
		 * [add_image_size description]
		 * @var [type]
		 */
		add_image_size( 'post_preview', 400, 500, true );
	}
endif;
add_action( 'after_setup_theme', 'valtenna_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function valtenna_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'valtenna_content_width', 640 );
}
add_action( 'after_setup_theme', 'valtenna_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function valtenna_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'valtenna' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'valtenna' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'valtenna_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function valtenna_scripts() {
	wp_enqueue_style( 'valtenna-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_script( 'valtenna-vendor-js', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), _S_VERSION, true );
	$valtenna = [
		'ajaxurl' => admin_url('admin-ajax.php')
	];
	wp_enqueue_script( 'valtenna-main-js', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery','wp-i18n'), _S_VERSION, true );
	wp_localize_script( 'valtenna-main-js', 'valtenna', $valtenna );
}
add_action( 'wp_enqueue_scripts', 'valtenna_scripts', 999 );

/**
 * [get_company_info_data description]
 * @return [type] [description]
 */
function get_company_info_data(){
	$output = '';
	if( $businessName = get_theme_mod('business_name') ){
		$output .= sprintf( '<strong>%s</strong>', $businessName );
	}
	if( $companyAddress = get_theme_mod('company_address') ){
		$output .= '<br/>' . nl2br($companyAddress);
	}
	if( $vat = get_theme_mod('company_vat') ){
		$output .= '<br/>' . sprintf( __('VAT: %s'), $vat );
	}
	if( $mail = get_theme_mod('company_email') ){
		$output .= '<br/>' . $mail;
	}
	if( $tel = get_theme_mod('company_tel') ){
		$output .= '<br/>' . $tel;
	}
	return $output;
}

function get_string_last_word_bold( $string, $numwords = 1 ){
	$string = explode( ' ', $string );
	$boldedArray = array_splice($string, count($string) - $numwords, $numwords);
	return join( ' ', $string ) . ' <span class="strong">' . join( ' ', $boldedArray ) . '</span>';
}

//add_action( 'mapcomm_importer_after_insert_post', 'mapcomm_gallery_import', 10, 3 );
function mapcomm_gallery_import( $post_id, $args, $postdata ){
	$togallery = get_post_meta($post_id, '__tmp_gallery');
	$tmp = [];
	foreach( $togallery as $item ){
		$tmp[] = $item;
	}
	if( count( $tmp ) > 0 ){
		update_field('product_gallery', $tmp[0], $post_id);
	}
	delete_post_meta( $post_id, '__tmp_gallery' );
}

/**
 * [get_special_projects_slideshow description]
 * @param  [type] $limit [description]
 * @return [type]        [description]
 */
function mapcomm_get_special_projects_slideshow($limit)
{
	$query = new WP_Query([
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => $limit,
		'tax_query' => [
			[
				'taxonomy' => 'products_tag',
				'field'    => 'term_id',
				'terms'    => get_msls_term_id(14),
			]
		]
	]);
	if( $query->have_posts() ){
		$html = <<<HTML
		<div id="special-projects-slideshow">
		HTML;
		while( $query->have_posts() ){
			$query->the_post();
			ob_start();
			get_template_part( 'template-parts/special-product-slide' );
			$html .= ob_get_clean();
		}
		$html .= <<<HTML
		</div>
		HTML;
		return $html;
	}
	wp_reset_query();
	return;
}

/**
 * [mapcomm_get_latest_news_slideshow description]
 * @param  [type] $count [description]
 * @return [type]        [description]
 */
function mapcomm_get_latest_news_slideshow( $count ){
	$latestNews = new WP_Query([
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $count
	]);
	if( $latestNews->have_posts() ){
		$html = <<<HTML
		<div id="latest-news">
		HTML;
		while( $latestNews->have_posts() ){
			$latestNews->the_post();
			ob_start();
			get_template_part( 'template-parts/post-preview' );
			$html .= ob_get_clean();
		}
		$html .= <<<HTML
		</div>
		HTML;
		return $html;
	}
	wp_reset_query();
	return;
}

/**
 * [mapcomm_add_lazyload_to_attachment_image description]
 * @param [type] $attr       [description]
 * @param [type] $attachment [description]
 */
function mapcomm_add_lazyload_to_attachment_image( $attr, $attachment ){
	$classes = $attr['class'];
	$current_src = $attr['src'];
	$current_srcset = $attr['srcset'];
	if( strpos( $classes, 'slick-lazy' ) !== false ){
		$attr['data-lazy'] = $current_src;
		unset( $attr['src'] );
	}elseif( strpos( $classes, 'lazyload' ) !== false ){
		$attr['data-src'] = $current_src;
		$attr['data-srcset'] = $current_srcset;
		unset( $attr['src'] );
		unset( $attr['srcset'] );
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'mapcomm_add_lazyload_to_attachment_image', 10, 2 );
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';
