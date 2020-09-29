<header class="archive-header">
   <?php if( has_post_thumbnail() ): ?>
   <figure class="mb-0 z-index-1 inside lazyload">
      <?php the_post_thumbnail('full', ['class' => 'img-fluid lazyload fitimage']); ?>
      <noscript><?php the_post_thumbnail('full', ['class' => 'img-fluid fitimage']); ?></noscript>
   </figure>
   <?php endif; ?>
</header>

<div class="container post-content-wrapper">
   <div class="row no-gutters">
      <div class="post-content">
         <h1><?php the_title(); ?></h1>
         <div class="the-content">
            <?php the_content(); ?>
         </div>
      </div>
   </div>
</div>
