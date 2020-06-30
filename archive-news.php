<?php
/*
Template name: News Archive
*/
get_header();
while ( have_posts() ){
	the_post();
	get_template_part('template-parts/archive-news', 'header');
}
?>
<section id="news-archive-posts">
	<div class="container">
		<div class="row flex-column no-gutters">
		<?php
		global $paged;
		if ( get_query_var('paged') ) {
			 $paged = get_query_var('paged');
		} else if ( get_query_var('page') ) {
			 $paged = get_query_var('page');
		} else {
			 $paged = 1;
		}
		$query = new WP_Query([
			'post_type' 		=> 'post',
			'post_status'		=> 'publish',
			'posts_per_page' 	=> 4,
			'paged' 				=> $paged
		]);
		$output = '';
		if( $query->have_posts() ){
			while( $query->have_posts() ){
				$query->the_post();
				get_template_part('template-parts/archive-news', 'post');
			}
			get_template_part( 'template-parts/archive-news-pagination' );
		}
		wp_reset_query();
		?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
