<header class="archive-header">
   <figure class="mb-0 fixed-background z-index-1">
      <div class="inside lazyload" data-background-image="<?php echo mapcomm_get_product_header_image(get_the_ID()); ?>"></div>
   </figure>
   <div class="container position-relative z-index-2">
      <div class="wrapper row no-gutters flex-column justify-content-end">
         <div class="content text-center text-md-left">
            <h1 class="mb-3 mb-md-4"><?php the_title(); ?></h1>
            <div class="description">
               <?php the_content(); ?>
            </div>
         </div>
      </div>
   </div>
</header>
