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
		add_image_size( 'news_thumbnail', 700, 785, true );
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

if( !function_exists( 'valtenna_app_icons' ) ){
	/**
	 * favicon e app icons
	 * @return html
	 */
	function valtenna_app_icons(){
		$root_url = site_url();
		$output = <<<HTML
		<link rel="apple-touch-icon" sizes="57x57" href="{$root_url}/app-icons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="{$root_url}/app-icons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="{$root_url}/app-icons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="{$root_url}/app-icons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="{$root_url}/app-icons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="{$root_url}/app-icons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="{$root_url}/app-icons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="{$root_url}/app-icons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="{$root_url}/app-icons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="{$root_url}/app-icons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="{$root_url}/app-icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="{$root_url}/app-icons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="{$root_url}/app-icons/favicon-16x16.png">
		<link rel="manifest" href="{$root_url}/app-icons/manifest.php">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="{$root_url}/app-icons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		HTML;
		echo $output;
	}
}
add_action('wp_head','valtenna_app_icons');

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

add_action( 'mapcomm_importer_after_insert_post', 'mapcomm_gallery_import', 10, 3 );
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
 * [get_products_tag_block description]
 * @param  [type] $tag_id [description]
 * @return [html]         [blocco html]
 */
function mapcomm_get_product_tags_block( $tag_id ){
	$tag = get_term( $tag_id, 'products_tag' );
	if( $image = get_field( 'products_cat_image', 'products_tag_' . $tag_id ) ){
		$imagehtml = wp_get_attachment_image( $image['ID'], 'large', false, ['class' => 'img-fluid lazyload fitimage'] );
		$imagehtml .= '<noscript>' . wp_get_attachment_image( $image['ID'], 'large', false, ['class' => 'img-fluid fitimage'] ) . '</noscript>';
	}else{
		$imagehtml = '<img data-src="https://via.placeholder.com/960x830/?text=' . __('tag prodotti','valtenna') . '" class="img-fluid lazyload fitimage" alt="' . get_the_title() . '"/><noscript><img src="https://via.placeholder.com/960x830/?text=' . __('tag prodotti','valtenna') . '" class="img-fluid fitimage" alt="' . get_the_title() . '"/></noscript>';
	}
	$output =  '<div class="products_tag_block">';
	$output .= '	<a class="wrapper d-block" href="' . get_term_link( $tag ) . '" title="' . esc_html__($tag->name) . '">';
	$output .= '	<figure>' . $imagehtml . '</figure>';
	$output .= '	<h3 class="text-uppercase">' . get_string_last_word_bold( $tag->name ) . '</h3>';
	$output .= '	<button class="line-through-but"><span>' . __('Scopri di più','valtenna') . '</span></button>';
	$output .= '	</a>';
	$output .= '</div>';
	return $output;
}

/**
 * [mapcomm_get_product_header_image description]
 * @param  [type] $post_id [description]
 * @return [type]          [description]
 */
function mapcomm_get_product_header_image($post_id = null){
	global $post;
	$post_id = !$post_id ? $post->ID : $post_id;
	$terms = get_the_terms( $post_id, 'products_cat' );
	if( $terms && count( $terms ) > 0 ){
		$first = array_shift($terms);
		if( $header = get_field('products_cat_header', 'products_cat_' . $first->term_id) ){
			return $header['url'];
		}
	}
	return;
}

/**
 * [mapcomm_get_tax_header_image description]
 * @param  [type] $tern_id [description]
 * @return [type]          [description]
 */
function mapcomm_get_tax_header_image(){
	if( is_tax() ){
		$queried_object = get_queried_object();
		if( $queried_object ){
			$header = get_field('products_cat_header', $queried_object->taxonomy . '_' . $queried_object->term_id);
			if( $header ){
				return $header['url'];
			}
		}
	}
	return '';
}

function mapcomm_get_products_tag_intro(){
	if( is_tax('products_tag') ){
		$queried_object = get_queried_object();
		if( $queried_object ){
			$intro = get_field('products_tag_intro', $queried_object->taxonomy . '_' . $queried_object->term_id);
			if( $intro ){
				return apply_filters('the_content', $intro);
			}
		}
	}
	return '';
}

/**
 * [mapcomm_get_tax_thumbnail description]
 * @param  string $size  [description]
 * @param  array  $attrs [description]
 * @return [type]        [description]
 */
function mapcomm_get_tax_thumbnail($size = 'thumbnail', $attrs = []){
	if( is_tax() ){
		$queried_object = get_queried_object();
		if( $queried_object ){
			$thumbnail = get_field('products_cat_image', $queried_object->taxonomy . '_' . $queried_object->term_id);
			if( $thumbnail ){
				return wp_get_attachment_image( $thumbnail['ID'], $size, false, $attrs );
			}
		}
	}
	return '';
}
/**
 * [function description]
 * @var [type]
 */
function mapcomm_get_similar_products( $post_id = null ){
	global $post;
	if ( !$post ) {
		return '';
   }
	$post_id = !$post_id ? $post->ID : $post_id;
	$terms = get_the_terms( $post_id, 'products_cat' );
	if( $terms && count( $terms ) > 0 ){
		$term_ids = array_map(function($v){
			return $v->term_id;
		}, $terms);
		$query = new WP_Query([
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => 8,
			'post__not_in' => [$post_id],
			'tax_query' => [
				[
					'taxonomy' => 'products_cat',
					'field' => 'term_id',
					'terms' => $term_ids,
					'operator' => 'IN'
				]
			]
		]);
		if( $query->have_posts() ){
			ob_start();
			while( $query->have_posts() ){
				$query->the_post();
				get_template_part('template-parts/product','similar');
			}
			return ob_get_clean();
		}
		wp_reset_query();
	}
	return '';
}
/**
 * [excerpt description]
 * @param  [type] $limit [description]
 * @return [type]        [description]
 */
function excerpt( $limit ) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

/**
 * [content description]
 * @param  [type] $limit [description]
 * @return [type]        [description]
 */
function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

if( !function_exists('get_queried_posts_terms') ){
	/**
	 * [get_queried_post_terms description]
	 * @return [type] [description]
	 */
	function get_queried_post_terms($taxonomy, $exclude = []){
		$current_term = get_queried_object();
		$query = new WP_Query([
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'tax_query' => [
				[
					'taxonomy' => $current_term->taxonomy,
					'field'    => 'term_id',
					'terms'    => $current_term->term_id
				]
			]
		]);
		$taxonomy_ids = [];
		if( $query->have_posts() ){
			while( $query->have_posts() ){
				$query->the_post();
				$products_cat = wp_get_post_terms(get_the_ID(), $taxonomy, array('exclude' => $exclude));
				if( $products_cat && count( $products_cat ) > 0 ){
					foreach( $products_cat as $pc ){
						if( !in_array( $pc->term_id, $taxonomy_ids ) ){
							$taxonomy_ids[] = $pc->term_id;
						}
					}
				}
			}
		}
		wp_reset_query();
		$list_items = [];
		$options = [
			sprintf(
				'<option value="%s">%s</option>',
				get_term_link($current_term),
				__('Select filter','valtenna')
			)
		];

		$filterableTerms = get_terms([
		  'taxonomy' => $taxonomy,
		  'include' => $taxonomy_ids
		]);
		$output = '';
		if( $filterableTerms && count($filterableTerms) > 0 ){
			$queryvar = 'filter_' . $taxonomy;
			foreach( $filterableTerms as $fi ){
				$current = $_GET[$queryvar] == $fi->slug ? ' class="selected"':'';
				$list_items[] = sprintf(
					'<li%s><a href="%s" title="%s">%s</a></li>',
					$current,
					add_query_arg([$queryvar => $fi->slug], get_term_link($current_term)),
					esc_html( $fi->name ),
					$fi->name
				);
				$options[] = sprintf(
               '<option %s value="%s">%s</option>',
               selected( $_GET[$queryvar], $fi->slug, false ),
               add_query_arg([$queryvar => $fi->slug], get_term_link($current_term)),
               $fi->name
            );
			}
			$list_items[] = sprintf(
				'<li class="reset-all-filters"><a href="%s" title="%s">%s</a></li>',
				get_term_link($current_term),
				__('Reimposta i filtri','valtenna'),
				__('Reimposta','valtenna')
			);
			$output .= '<nav id="categories-nav" class="filters-' . $taxonomy . '">';
			$output .= '<ul class="reset-list d-none d-xl-flex flex-lg-row flex-lg-wrap text-uppercase justify-content-center">';
			$output .= join('', $list_items);
			$output .= '</ul>';
			$output .= '<div class="select-push d-xl-none">';
			$output .= '<div class="fixit d-flex flex-column justify-content-stretch">';
			$output .= '<select class="custom-select" id="mobile-category-selector">';
			$output .= join('', $options);
			$output .= '</select>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</nav>';
		}
		return $output;
	}
}

function create_ACF_meta_in_REST() {
    $postypes_to_exclude = ['acf-field-group','acf-field'];
    $extra_postypes_to_include = ["page"];
    $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field( $post_type, 'ACF', [
            'get_callback'    => 'expose_ACF_fields',
            'schema'          => null,
       ]
     );
    }

}

function expose_ACF_fields( $object ) {
    $ID = $object['id'];
    return get_fields($ID);
}

add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Hooks
 * @var [type]
 */
require get_template_directory() . '/inc/hooks.php';
/**
 * [require description]
 * @var [type]
 */
require get_template_directory() . '/inc/walker.php';
