<?php
global $query;
$big = 999999999;
$pagination = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $query->max_num_pages,
    'prev_text' => '<i class="fas fa-chevron-left"></i>',
    'next_text' => '<i class="fas fa-chevron-right"></i>',
    'type' => 'array'
) );
?>
<?php if( $pagination && count($pagination) > 0 ): ?>
<div id="news-archive-pagination" class="d-flex flex-row flex-wrap justify-content-center align-items-center flex-grow-1 align-items-lg-center">
   <div class="pagination-wrapper d-flex flex-row flex-wrap align-items-center">
      <?php
      foreach( $pagination as $link ){
         echo $link;
      }
      ?>
   </div>
</div>
<?php endif; ?>
