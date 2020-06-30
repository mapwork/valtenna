<div class="archive-news-item news-item-<?php the_ID(); ?>">
   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="wrapper d-flex flex-column flex-lg-row">
      <div class="col col-left">
      <?php
      if( has_post_thumbnail() ){
         echo sprintf(
            '<figure class="mb-lg-0">%s<noscript>%s</noscript></figure>',
            get_the_post_thumbnail( get_the_ID(), 'news_thumbnail', ['class' => 'img-fluid lazyload fitimage']),
            get_the_post_thumbnail( get_the_ID(), 'news_thumbnail', ['class' => 'img-fluid'])
         );
      }
      ?>
      </div>
      <div class="col col-right">
         <div class="post-content">
            <div class="post-content-wrapper" data-title="<?php echo __('Descrizione','valtenna'); ?>">
               <h2><?php the_title(); ?></h2>
               <div class="excerpt">
               <?php
               echo excerpt(50);
               ?>
               </div>
               <p class="mb-0 cta">
                  <button type="button"><span><?php echo __('Continua','valtenna'); ?></span></button>
               </p>
            </div>
         </div>
      </div>
   </a>
</div>
