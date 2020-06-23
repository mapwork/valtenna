<div class="post-preview-item">
   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="d-block">
   <?php
   if( has_post_thumbnail() ){
      echo sprintf(
         '<figure class="mb-0">%s<noscript>%s</noscript></figure>',
         get_the_post_thumbnail( $post->ID, 'post_preview', ['class' => 'img-fluid slick-lazy'] ),
         get_the_post_thumbnail( $post->ID, 'post_preview', ['class' => 'img-fluid'] )
      );
   }
   ?>
   <div class="overlay d-flex flex-column justify-content-end">
      <?php
      $categories = get_the_category( $post->ID );
      $catnames = array_map(function($c){
         return $c->name;
      },$categories);
      ?>
      <div class="category-name text-uppercase"><?php echo join( ' ', $catnames ); ?></div>
      <h4><?php the_title(); ?></h4>
   </div>
   </a>
</div>
