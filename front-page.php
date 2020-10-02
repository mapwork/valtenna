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
               <button class="line-through-but"><span><?php echo __('Scopri di più','valtenna'); ?></span></button>
            </div>
         </a>
      </div>
      <div class="area-item d-flex flex-row align-items-stretch" id="foldable-boxes">
         <a class="d-flex flex-column justify-content-end flex-grow-1" href="<?php echo get_term_link( $foldableBoxes ); ?>" title="<?php echo esc_attr( $foldableBoxes->name ); ?>">
            <div class="detail">
               <h2 class="text-uppercase"><?php echo get_string_last_word_bold( $foldableBoxes->name ); ?></h2>
               <button class="line-through-but reverse"><span><?php echo __('Scopri di più','valtenna'); ?></span></button>
            </div>
         </a>
      </div>
   </div>
</section>
<section id="products-preview" class="products-block toanimate">
   <div class="container">
      <div class="intro text-center">
         <h3 class="mb-4"><?php echo get_theme_mod('products_cat_title'); ?></h3>
         <?php
         if( $intro = get_theme_mod('products_cat_intro') ){
            echo apply_filters( 'the_content', $intro );
         }
         ?>
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
<section id="homepage-claim" class="toanimate">
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
<section id="our-clients" class="toanimate">
   <a href="<?php echo get_permalink( get_msls_post_id( 277 ) ); ?>" class="d-block">
      <div class="container">
         <h3 class="text-uppercase text-center area-title"><?php echo get_string_last_word_bold( __('I nostri clienti','valtenna') ); ?></h3>
         <div class="row no-gutters flex-column flex-md-row flex-md-nowrap">
            <div class="col first d-md-flex flex-md-column justify-content-md-center">
               <figure class="mb-0">
                  <img data-src="<?php echo get_theme_file_uri( 'assets/images/our-clients.jpg' ); ?>" class="img-fluid lazyload"/>
                  <noscript>
                     <img src="<?php echo get_theme_file_uri( 'assets/images/our-clients.jpg' ); ?>" class="img-fluid"/>
                  </noscript>
               </figure>
            </div>
            <div class="col second">
               <ul class="reset-list text-center clients-list">
                  <li>KASPERSKY</li>
                  <li>AZIENDA AGRICOLA MANCINI</li>
                  <li>CANTINA SOCIALE TOLLO</li>
                  <li>WONDERBOX</li>
                  <li>IL SOLE 24 ORE</li>
                  <li>MONDADORI</li>
                  <li>THUN</li>
                  <li>CIRE TRUDON</li>
                  <li>BORMIOLI LUIGI</li>
                  <li>BROSWAY</li>
                  <li>BRIONI</li>
               </ul>
            </div>
            <div class="col third">
               <ul class="reset-list text-center clients-list">
                  <li>GUCCI</li>
                  <li>BALENCIAGA</li>
                  <li>LUXOTTICA</li>
                  <li>FABIANA FILIPPI</li>
                  <li>CUCINELLI</li>
                  <li>BEAUTYCOM</li>
                  <li>LONGCHAMP</li>
                  <li>MANIFATTURE SIGARO TOSCANO</li>
                  <li>DEICHMANN</li>
                  <li>BATA</li>
                  <li>ZALANDO</li>
                  <li>PRIMIGI</li>
               </ul>
            </div>
         </div>
      </div>
   </a>
</section>
<section id="special-projects-preview" class="toanimate">
   <div class="container">
      <div class="row no-gutters flex-column flex-lg-row special-projects-slideshow">
         <div class="col col-left">
            <?php
            echo mapcomm_get_special_projects_slideshow(get_theme_mod('special_projects_slides_num', 5));
            ?>
         </div>
         <div class="col col-right d-lg-flex flex-lg-column justify-content-lg-center">
            <div class="intro text-center">
               <h3 class="text-uppercase text-center area-title mb-4">
                  <?php echo get_string_last_word_bold( get_theme_mod('special_projects_title', ''), 3 ); ?>
               </h3>
               <p class="mb-4">
                  <?php echo nl2br( get_theme_mod('special_projects_text', '') ); ?>
               </p>
               <p class="mb-0">
                  <a href="<?php echo get_term_link( get_msls_term_id(14), 'products_tag' ); ?>" class="line-through-but"><span><?php echo __('Scopri di più','valtenna'); ?></span></a>
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="news-preview" class="toanimate">
   <div class="container">
      <div class="intro text-center">
         <h3 class="text-uppercase text-center area-title mb-4"><?php echo get_string_last_word_bold( __('Le novità valtenna','valtenna') ); ?></h3>
         <p class="mb-0">
            <?php echo __('Non perdere le ultime novità, consigli e informazioni sui nostri prodotti e servizi. In questa sezione troverai progetti, creazioni, spunti per creare il packaging perfetto per il tuo brand.','valtenna'); ?>
         </p>
      </div>
      <?php
      echo mapcomm_get_latest_news_slideshow(4);
      ?>
   </div>
</section>
<section id="instagram">
   <div class="container">
      <h3 class="text-uppercase text-center area-title mb-4 mb-xxl-5"><?php echo get_string_last_word_bold( __('Instagram @valtenna','valtenna') ); ?></h3>
      <div id="instagram-wall" data-tag="valtennapackaging" data-user_id="7742624923" data-count="15">
         <div class="spinner-border mx-auto" role="status">
           <span class="sr-only">Loading...</span>
         </div>
      </div>
   </div>
</section>
<?php get_footer('home'); ?>
