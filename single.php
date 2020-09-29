<?php get_header(); ?>
<article id="news-<?php the_ID(); ?>">
<?php
while( have_posts() ){
   the_post();
   get_template_part('template-parts/single-news','content');
}
?>
</article>
<?php get_footer(); ?>
