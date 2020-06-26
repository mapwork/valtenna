<?php
global $post;
$terms = get_the_terms( $post->ID, 'products_cat' );
$first = new stdClass();
if( $terms && count( $terms ) > 0 ){
   $first = array_shift($terms);
}
?>
<header class="archive-header">
   <figure class="mb-0 fixed-background z-index-1">
      <div class="inside lazyload" data-background-image="<?php echo mapcomm_get_product_header_image(get_the_ID()); ?>"></div>
   </figure>
   <div class="container position-relative z-index-2">
      <div class="wrapper row no-gutters flex-column justify-content-end">
         <div class="content text-center text-md-left">
            <h2 class="mb-3 mb-md-4">
               <?php echo get_term_field( 'name', $first, 'products_cat' ); ?>
            </h2>
            <div class="description">
               <?php echo term_description($first); ?>
            </div>
         </div>
      </div>
   </div>
</header>
