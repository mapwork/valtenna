<?php get_header(); ?>
<article id="product-<?php the_ID(); ?>">
<?php
while( have_posts() ){
   the_post();
   get_template_part('template-parts/single-product','header');
   get_template_part('template-parts/single-product','content');
}
?>
</article>
<section id="similar-products">
   <div class="container">
      <h3 class="text-uppercase text-center mb-4 mb-lg-5"><?php echo __('Prodotti simili','valtenna'); ?></h3>
      <div class="slideshow-wrapper">
         <div class="slideshow">
         <?php echo mapcomm_get_similar_products(); ?>
         </div>
      </div>
   </div>
</section>
<section class="products-tag-reminder">
   <div class="container">
      <div class="row no-gutters flex-column flex-md-row">
         <?php
         $tags = [
            get_msls_term_id(4), //scatole rigide
            get_msls_term_id(5) //scatole pieghevoli
         ];
         foreach( $tags as $tag ){
            echo mapcomm_get_product_tags_block($tag);
         }
         ?>
      </div>
   </div>
</section>
<?php get_footer(); ?>
