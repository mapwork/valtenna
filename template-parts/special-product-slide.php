<?php
if( has_post_thumbnail() ){
   echo sprintf(
      '<figure class="mb-0"><a class="d-block" href="%s" title="%s">%s</a><noscript>%s</noscript></figure>',
      get_permalink($post->ID),
      the_title_attribute(['post' => get_the_ID(), 'echo' => false]),
      get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-fluid slick-lazy fitimage']),
      get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-fluid fitimage']));
}
?>
