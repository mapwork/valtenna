<div class="product-grid-item">
   <a class="d-flex flex-column" href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ;?>">
      <figure class="mb-0">
      <?php
      if( has_post_thumbnail() ){
         the_post_thumbnail('large', ['class' => 'img-fluid lazyload fitimage']);
      }else{
         echo '<img data-src="https://via.placeholder.com/960x640/?text=' . __('prodotto','valtenna') . '" class="img-fluid lazyload fitimage" alt="' . get_the_title() . '"/><noscript><img src="https://via.placeholder.com/960x640/?text=' . __('prodotto','valtenna') . '" class="img-fluid fitimage" alt="' . get_the_title() . '"/></noscript>';
      }
      ?>
      </figure>
      <div class="content">
         <h2><?php the_title(); ?></h2>
      </div>
   </a>
</div>
