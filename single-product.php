<?php get_header(); ?>
<article id="product-<?php the_ID(); ?>">
<?php
while( have_posts() ){
   the_post();
   get_template_part('template-parts/product');
}
?>
</article>
<?php get_footer(); ?>
