<div class="similar-product-item similar-product-item-<?php echo get_the_ID(); ?>">
   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="d-block wrapper">
   <?php
   if( has_post_thumbnail() ){
      echo sprintf(
         '<figure>%s<noscript>%s</noscript></figure>',
         get_the_post_thumbnail(get_the_ID(),'large', ['class' => 'img-fluid slick-lazy fitimage']),
         get_the_post_thumbnail(get_the_ID(),'large', ['class' => 'img-fluid'])
      );
   }
   ?>
   <h4 class="text-center text-md-left"><?php the_title(); ?></h4>
   </a>
</div>
