<?php
/**
 * [products_cat_slideshow_funx description]
 * @param  [type] $atts [description]
 * @return [type]       [description]
 */
function products_cat_slideshow_funx( $atts ){
   $a = shortcode_atts( [
      'orderby'  => 'name',
   	'order'    => 'ASC',
      'number'   => 0
   ], $atts );

   $cats = get_terms([
      'taxonomy'  => 'products_cat',
      'orderby'   => $a['orderby'],
      'order'     => $a['order'],
      'number'    => $a['number'],
      'hide_empty' => false
   ]);
   $output = '<div class="products-cat-carousel">';
   $output .= '<div class="wrapper">';
   if( $cats && count( $cats ) > 0 ){
      ob_start();
      foreach( $cats as $item ){
         set_query_var( 'item', $item );
         get_template_part( 'template-parts/products-cat' );
      }
      $output .= ob_get_clean();
   }
   $output .= '</div>';
   $output .= '</div>';
   return $output;
}
add_shortcode( 'products_cat_slideshow', 'products_cat_slideshow_funx' );

/**
 * [privacy_policy_link_funx description]
 * @method privacy_policy_link_funx
 * @param  [type]                   $atts [description]
 * @return [type]                         [description]
 */
function privacy_policy_link_funx($atts){
   $a = shortcode_atts( [
      'label' => 'Privacy Policy',
      'privacy_policy_id' => '97120592',
   ], $atts );
   return '<a href="https://www.iubenda.com/privacy-policy/' . $a['privacy_policy_id'] . '" class="iubenda-nostyle no-brand iubenda-embed">' . $a['label'] . '</a>';
}
add_shortcode('privacy_policy_link','privacy_policy_link_funx');
?>
