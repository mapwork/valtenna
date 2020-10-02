<?php
/**
* [alter_product_archive_query description]
* @param  [type] $query [description]
* @return [type]        [description]
*/
if( !function_exists('alter_product_archive_query') ){
   function alter_product_archive_query( $query ){
      if( !is_admin() && $query->is_main_query() && is_post_type_archive('product') && 'product' === $query->get('post_type') ){
         $categories = get_terms([
            'taxonomy' => 'products_cat',
            'hide_empty' => false,
         ]);
         $category_term = $categories[0]->slug;
         if( isset( $_REQUEST['products_cat'] ) && !empty( $_REQUEST['products_cat'] ) ){
            $category_term = $_REQUEST['products_cat'];
            $query->set('products_cat', $category_term);
         }

         $query->set('posts_per_page', 8);
         $query->set('orderby', 'id');
         $query->set('order', 'asc');
      }
      return $query;
   }
}
add_action('pre_get_posts', 'alter_product_archive_query', 1);

/**
* [alter_taxonomies_archive_query description]
* @param  [type] $query [description]
* @return [type]        [description]
*/
if( !function_exists('alter_taxonomies_archive_query') ){
   function alter_taxonomies_archive_query( $query ){
      if( !is_admin() && $query->is_main_query() && ( is_tax('products_tag') || is_tax('products_cat') ) ){
         $query->set('posts_per_page', 8);
         $query->set('orderby', 'id');
         $query->set('order', 'asc');
      }
      if( !is_admin() && $query->is_main_query() ){
         if( is_tax('products_tag') && isset($_GET['filter_products_cat']) && !empty($_GET['filter_products_cat']) ){
            $taxquery = array(
               array(
               'taxonomy' => 'products_cat',
               'field' => 'slug',
               'terms' => $_GET['filter_products_cat'],
               )
            );
            $query->set( 'tax_query', $taxquery );
            $query->set('orderby', 'id');
            $query->set('order', 'asc');
         }
         if( is_tax('products_cat') && isset($_GET['filter_products_tag']) && !empty($_GET['filter_products_tag']) ){
            $taxquery = array(
               array(
               'taxonomy' => 'products_tag',
               'field' => 'slug',
               'terms' => $_GET['filter_products_tag'],
               )
            );
            $query->set( 'tax_query', $taxquery );
            $query->set('orderby', 'id');
            $query->set('order', 'asc');
         }
      }
      return $query;
   }
}
add_action('pre_get_posts', 'alter_taxonomies_archive_query', 1);

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
 * [add_leading_zeros_to_pagination description]
 * @param [type] $format [description]
 */
function add_leading_zeros_to_pagination( $format ){
	$number = intval( $format );
	if( intval( $number / 10 ) > 0 ) {
		return $format;
	}
	return '0' . $format;
}

/**
 * [remove_tax_name_from_archive_title description]
 * @param  [type] $title [description]
 * @return [type]        [description]
 */
function remove_tax_name_from_archive_title( $title ){
   if( is_tax('products_tag') ){
      return sprintf( __( '%1$s' ), single_term_title( '', false ) );
   }
   return $title;
}
add_filter( 'get_the_archive_title', 'remove_tax_name_from_archive_title' );


if( !function_exists('mapcomm_add_page_body_class') ){
   /**
    * [mapcomm_add_page_body_class description]
    * @param [type] $classes [description]
    */
   function mapcomm_add_page_body_class($classes){
      if( is_page( get_msls_post_id(187) ) ){
         $classes[] = 'page-azienda';
      }elseif( is_page( get_msls_post_id(2) ) ){
         $classes[] = 'archivio-news';
      }
      return $classes;
   }
}
add_filter('body_class', 'mapcomm_add_page_body_class');
?>
