<?php
if( has_post_thumbnail() ){
   echo sprintf('<figure class="mb-0">%s<noscript>%s</noscript></figure>', get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-fluid slick-lazy']), get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-fluid']));
}
?>
