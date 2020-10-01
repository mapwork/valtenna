<?php get_header(); ?>
<header class="archive-header">
   <figure class="mb-0 fixed-background z-index-1">
      <div class="inside lazyload" data-background-image="<?php echo (string)get_theme_file_uri('assets/images/header-archivio-prodotti.jpg'); ?>"></div>
   </figure>
   <div class="container position-relative z-index-2">
      <div class="wrapper row no-gutters flex-column justify-content-end">
         <div class="content text-center text-md-left">
            <h1 class="mb-3 mb-md-4"><?php post_type_archive_title(); ?></h1>
            <div class="description">
               <p class="mb-0"><?php echo __('Da oltre 50 anni realizziamo e produciamo Scatole rigide, astucci e scatole pieghevoli i settore calzaturiero, alimentare, per aziende del beauty, brand di gioielli e accessori, editoria e multimedia, oggettistica ed espositori.','valtenna'); ?></p>
            </div>
         </div>
      </div>
   </div>
</header>
<section id="product-archive-categories">
   <div class="container">
      <?php
      $categories = get_terms([
         'taxonomy' => 'products_cat',
         'hide_empty' => false,
      ]);
      ?>
      <?php
      $join = 'join';
      if( $categories && count( $categories ) > 0 ){
         $options = [
            sprintf(
               '<option value="%s">%s</option>',
               get_post_type_archive_link('product'),
               __('Select filter','valtenna')
            )
         ];
         $listitems = [];
         foreach( $categories as $category ){
            $options[] = sprintf(
               '<option %s value="%s">%s</option>',
               selected( get_query_var('products_cat'), $category->slug, false ),
               add_query_arg( [ 'products_cat' => $category->slug ], get_post_type_archive_link('product') ),
               $category->name
            );
            $current = get_query_var('products_cat') == $category->slug ? ' class="selected"':'';
            $listitems[] = sprintf(
               '<li%1$s data-slug="%2$s"><a href="%3$s" title="%4$s">%4$s</a></li>',
               $current,
               $category->slug,
               add_query_arg( [ 'products_cat' => $category->slug ], get_post_type_archive_link('product') ),
               $category->name
            );
         }
         $html = <<<HTML
         <nav id="categories-nav">
            <ul class="reset-list d-none d-xl-flex flex-lg-row flex-lg-wrap text-uppercase justify-content-center">
               {$join($listitems)}
            </ul>
            <div class="select-push d-xl-none">
               <div class="fixit d-flex flex-column justify-content-stretch">
                  <select class="custom-select" id="mobile-category-selector">
                     {$join($options)}
                  </select>
               </div>
            </div>
         </nav>
         HTML;
         echo $html;
      }
      ?>
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
