<div id="product-grid-pagination" class="d-flex flex-row flex-wrap justify-content-center align-items-end flex-grow-1 align-items-lg-center">
   <div class="pagination-wrapper d-flex flex-row flex-wrap align-items-end">
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
