<?php get_header(); ?>
<header class="archive-header">
   <figure class="mb-0 fixed-background z-index-1">
      <div class="inside lazyload" data-background-image="<?php echo (string)mapcomm_get_tax_header_image(); ?>"></div>
   </figure>
   <div class="container position-relative z-index-2">
      <div class="wrapper row no-gutters flex-column justify-content-end">
         <div class="content text-center text-md-left">
            <h1 class="mb-3 mb-md-4"><?php the_archive_title(); ?></h1>
            <div class="description">
               <?php echo mapcomm_get_products_tag_intro(); ?>
            </div>
         </div>
      </div>
   </div>
</header>
<div class="products-tag-content">
   <div class="container-fluid px-md-0">
      <div class="row no-gutters flex-column flex-md-row">
         <div class="col col-left">
            <div class="col-wrapper">
               <figure class="mb-0">
               <?php echo mapcomm_get_tax_thumbnail('full', ['class' => 'img-fluid lazyload fitimage']); ?>
               <noscript><?php echo mapcomm_get_tax_thumbnail('full', ['class' => 'img-fluid']); ?></noscript>
               </figure>
            </div>
         </div>
         <div class="col col-right">
            <div class="col-wrapper">
               <div class="text-center mb-4 text-md-left heading-title"><?php echo __('Descrizione','valtenna'); ?></div>
               <div class="description">
               <?php echo term_description(); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section id="filters-by-categories">
   <div class="container">
      <nav id="filters">
         <?php echo get_queried_post_terms('products_cat'); ?>
      </nav>
   </div>
</section>
<section id="products-grid">
   <div class="container-fluid px-xl-0">
      <div class="row no-gutters flex-column flex-md-row" id="products-grid-container">
         <?php
         if( have_posts() ){
            while( have_posts() ){
               the_post();
               get_template_part( 'template-parts/product-grid-item' );
            }
            get_template_part( 'template-parts/product-grid-pagination' );
         }else{
            get_template_part( 'template-parts/no-products-found' );
         }
         ?>
      </div>
   </div>
</section>
<section id="products-preview" class="products-block">
   <div class="container">
      <div class="intro text-center">
         <h3 class="mb-4"><?php echo get_theme_mod('products_cat_title'); ?></h3>
         <?php
         if( $intro = get_theme_mod('products_cat_intro') ){
            echo apply_filters( 'the_content', $intro );
         }
         ?>
      </div>
      <?php
      $orderby = get_theme_mod('products_cat_orderby', 'name');
      $order = get_theme_mod('products_cat_order', 'ASC');
      $number = get_theme_mod('products_cat_num', 0 );
      $shortcode = sprintf('[products_cat_slideshow orderby="%s" order="%s" number="%d"]', $orderby, $order, $number);
      echo do_shortcode($shortcode);
      ?>
   </div>
</section>
<?php get_footer(); ?>
