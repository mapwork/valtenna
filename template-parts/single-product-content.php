<div class="single-product-content">
   <div class="container-fluid px-md-0">
      <div class="row no-gutters flex-column flex-md-row">
         <div class="col col-left">
            <?php if( has_post_thumbnail() ): ?>
            <figure class="mb-0">
               <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" title="<?php echo esc_attr( strip_tags( get_the_title( get_post_thumbnail_id() ) ) ); ?>" data-fancybox="product-<?php the_ID(); ?>">
               <?php the_post_thumbnail('large', ['class' => 'img-fluid lazyload']); ?>
               <noscript><?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?></noscript>
               </a>
            </figure>
            <?php endif; ?>
         </div>
         <div class="col col-right">
            <h1 class="text-center mb-4 text-md-left"><?php the_title(); ?></h1>
            <div class="description">
            <?php the_content(); ?>
            </div>
         </div>
      </div>
   </div>

   <?php if( $gallery = get_field('product_gallery') ): ?>
   <div class="container">
      <div class="single-product-gallery-wrapper">
         <div class="row no-gutters single-product-gallery">
         <?php
         foreach( $gallery as $image ){
            echo sprintf(
               '<figure class="mb-0"><a class="d-block" href="%s" data-fancybox="product-%d" title="%s">%s<noscript>%s</noscript></a></figure>',
               wp_get_attachment_url($image['id']),
               $post->ID,
               esc_attr( strip_tags( $image['title'] ) ),
               wp_get_attachment_image( $image['id'], 'large', false, ['class' => 'img-fluid lazyload fitimage'] ),
               wp_get_attachment_image( $image['id'], 'large', false, ['class' => 'img-fluid'] )
            );
         }
         ?>
         </div>
      </div>
   </div>
   <?php endif; ?>
</div>
