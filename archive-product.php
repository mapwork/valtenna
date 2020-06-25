<?php get_header(); ?>
<header class="archive-header">
   <div class="container">
      <div class="wrapper row no-gutters flex-column justify-content-end">
         <div class="content text-center">
            <h1 class="mb-3"><?php post_type_archive_title(); ?></h1>
            <div class="description">
               <p class="mb-0"><?php echo __('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.”','valtenna'); ?></p>
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
         $options = [];
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
               '<li%1$s><a href="%2$s" title="%3$s">%3$s</a></li>',
               $current,
               add_query_arg( [ 'products_cat' => $category->slug ], get_post_type_archive_link('product') ),
               $category->name
            );
         }
         $html = <<<HTML
         <nav id="categories-nav">
            <ul class="reset-list d-none d-lg-block">
               {$join($listitems)}
            </ul>
            <div class="select-push d-lg-none">
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
   <div class="container-fluid">
      <div class="row no-gutters flex-column" id="products-grid-container">
         <?php
         if( have_posts() ){
            while( have_posts() ){
               the_post();
               get_template_part( 'template-parts/product-grid-item' );
            }
         }
         ?>
         <div id="product-grid-pagination" class="d-flex flex-row flex-wrap justify-content-center align-items-end flex-grow-1">
         <?php
         add_filter( 'number_format_i18n', 'add_leading_zeros_to_pagination' );
         global $wp_query;
         $big = 999999999;
         echo paginate_links( array(
             'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
             'format' => '?paged=%#%',
             'current' => max( 1, get_query_var('paged') ),
             'total' => $wp_query->max_num_pages,
             'prev_text' => '<i class="fas fa-chevron-left"></i>',
             'next_text' => '<i class="fas fa-chevron-right"></i>',
         ) );
         remove_filter( 'number_format_i18n', 'add_leading_zeros_to_pagination' );
         ?>
         </div>
      </div>
   </div>
</section>
<section class="products-tag-reminder">
   <div class="container">
      <div class="row no-gutters">
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
