<?php get_header(); ?>

<section id="product-area" class="spacer">
   <div class="wrapper d-flex flex-column flex-lg-row flex-lg-between">
      <?php
      $hardBoxes = get_term( get_msls_term_id(4), 'products_tag' );
      $foldableBoxes = get_term( get_msls_term_id(5), 'products_tag' );
      ?>
      <div class="area-item d-flex flex-row align-items-stretch" id="hard-boxes">
         <a class="d-flex flex-column justify-content-end flex-grow-1" href="<?php echo get_term_link( $hardBoxes ); ?>" title="<?php echo esc_attr( $hardBoxes->name ); ?>">
            <div class="detail">
               <h2 class="text-uppercase"><?php echo get_string_last_word_bold( $hardBoxes->name ); ?></h2>
               <button class="line-through-but"><span><?php echo __('Get more info','valtenna'); ?></span></button>
            </div>
         </a>
      </div>
      <div class="area-item d-flex flex-row align-items-stretch" id="foldable-boxes">
         <a class="d-flex flex-column justify-content-end flex-grow-1" href="<?php echo get_term_link( $foldableBoxes ); ?>" title="<?php echo esc_attr( $foldableBoxes->name ); ?>">
            <div class="detail">
               <h2 class="text-uppercase"><?php echo get_string_last_word_bold( $foldableBoxes->name ); ?></h2>
               <button class="line-through-but reverse"><span><?php echo __('Get more info','valtenna'); ?></span></button>
            </div>
         </a>
      </div>
   </div>
</section>
<section id="products-preview" class="products-block">
   <div class="container">
      <div class="intro text-center">
         <h3 class="mb-4"><?php echo get_theme_mod('products_cat_title'); ?></h3>
         <p class="mb-0">
            <?php
            if( $intro = get_theme_mod('products_cat_intro') ){
               echo apply_filters( 'the_content', $intro );
            }
            ?>
         </p>
      </div>
      <?php
      $orderby = get_theme_mod('products_cat_orderby', 'name');
      $order = get_theme_mod('products_cat_order', 'ASC');
      $number = get_theme_mod('products_cat_num', 0 );
      $shortcode = sprintf('[products_cat_slideshow orderby="%s" order="%s" number="%d"]', $orderby, $order, $number);
      echo do_shortcode($shortcode);
      ?>
   </div>
</section>
<section id="homepage-claim">
   <div class="container">
      <div class="claim-text text-uppercase text-center">
      <?php
      if( $claim = get_theme_mod('home_slideshow_claim') ){
         echo nl2br( $claim );
      }
      ?>
      </div>
      <div id="claim-slideshow">
      <?php
         $slides = get_theme_mod('homepage_slideshow_slides', []);
         if( $slides && count( $slides ) > 0 ){
            foreach( $slides as $slide ){
               set_query_var( 'slide', $slide );
               get_template_part( 'template-parts/claim-slide' );
            }
         }
      ?>
      </div>
   </div>
</section>
<section id="our-clients">
   <div class="container">
      <h3 class="text-uppercase text-center area-title"><?php echo get_string_last_word_bold( __('Our clients','valtenna') ); ?></h3>
      <div class="row no-gutters flex-column">
         <div class="col">
            <figure class="mb-0">
               <img data-src="<?php echo get_theme_file_uri( 'assets/images/our-clients.jpg' ); ?>" class="img-fluid lazyload"/>
               <noscript>
                  <img src="<?php echo get_theme_file_uri( 'assets/images/our-clients.jpg' ); ?>" class="img-fluid"/>
               </noscript>
            </figure>
         </div>
         <div class="col">
            <ul class="reset-list text-center clients-list">
               <li>John Stone</li>
               <li>Ponnappa Priya</li>
               <li>Mia Wong</li>
               <li>Peter Stanbridge</li>
               <li>Natalie Lee-Walsh</li>
               <li>Ang Li</li>
               <li>Nguta Ithya</li>
               <li>Tamzyn French</li>
               <li>Salome Simoes</li>
               <li>Trevor Virtue</li>
            </ul>
         </div>
         <div class="col">
            <ul class="reset-list text-center clients-list">
               <li>Tarryn Campbell-Gillies</li>
               <li>Eugenia Anders</li>
               <li>Andrew Kazantzis</li>
               <li>Verona Blair</li>
               <li>Jane Meldrum</li>
               <li>Maureen M. Smith</li>
               <li>Desiree Burch</li>
               <li>Daly Harry</li>
               <li>Hayman Andrews</li>
               <li>Ruveni Ellawala</li>
            </ul>
         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>
