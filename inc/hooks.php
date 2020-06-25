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
         }
         $query->set('products_cat', $category_term);
         $query->set('posts_per_page', 8);
      }
      return $query;
   }
}
add_action('pre_get_posts', 'alter_product_archive_query', 1);

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
?>
