<div class="category-box-item">
   <a href="<?php echo get_term_link( $item ); ?>" title="<?php echo esc_attr( $item->name ); ?>" class="d-flex flex-column">
   <?php
   if( $image = get_field( 'products_cat_image', 'products_cat_' . $item->term_id ) ){
      echo '<figure class="mb-0">' . wp_get_attachment_image( $image['ID'], 'full', false, ['class' => 'img-fluid'] ) . '</figure>';
   }else{
      echo '<figure class="mb-0"><img src="' . get_theme_file_uri('assets/images/products_cat_placeholder.jpg') . '" class="img-fluid"/></figure>';
   }
   ?>
   <div class="name d-flex flex-column text-uppercase">
      <?php echo $item->name; ?>
   </div>
   </a>
</div>
