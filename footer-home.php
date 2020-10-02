<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package valtenna
 */

?>
</main>
<div class="gsap-item d-block" id="gsap-item-1">
<img class="lazyload" data-src="<?php echo get_theme_file_uri('assets/images/anm-box-1.png'); ?>"/>
</div>
<footer id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="wrap no-gutters d-flex flex-column py-5 border-top flex-lg-row">
				<div class="col text-center flex-lg-grow-1 text-lg-left">
					<div class="col-header">
						<span><?php echo __('Valtenna'); ?></span>
					</div>
					<div class="col-content">
						<?php
						wp_nav_menu([
							'theme_location' 	=> 'footer-menu',
							'menu_id' 			=> 'footer-menu',
							'menu_class'      => 'menu reset-list',
							'container' 		=> 'nav',
						]);
						?>
					</div>
				</div>
				<div class="col text-center flex-lg-grow-1 text-lg-left">
					<div class="col-header">
						<span><?php echo __('Resta in contatto', 'valtenna'); ?></span>
					</div>
					<div class="col-content text-left">
						<form method="post" enctype="multipart/form-data" id="subscribe-form" onsubmit="return false;">
							<div class="input-wrap d-flex flex-row flex-nowrap mb-4">
								<div class="field flex-grow-1">
									<input data-cons-subject="email" autocomplete="off" type="email" name="email" class="form-control" id="subscribe-email" placeholder="<?php echo __('Il tuo indirizzo e-mail', 'valtenna'); ?>" />
								</div>
								<button disabled type="submit" id="subscribe-submit"><span><i class="fas fa-chevron-right"></i><i class="fas fa-circle-notch"></i></span></button>
							</div>
							<div class="_checkbox">
								<input data-cons-preference="privacy_policyy" type="checkbox" name="privacy_policy" id="subscribe_policy"/>
								<label for="subscribe_policy">
									<span class="disclaimer">
										<?php
										echo do_shortcode(__('Letto e compreso la [privacy_policy_link label="Privacy Policy" privacy_policy_id="22408243"], acconsento al trattamento dei miei dati per finalità di marketing', 'valtenna'));
										?>
									</span>
								</label>
							</div>
							<input data-cons-exclude type="hidden" name="action" value="subscribe"/>
							<input data-cons-subject="id" type="hidden" name="user_id" id="nl_user_id" value=""/>
							<input data-cons-exclude type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('subscribe'); ?>"/>
						</form>
					</div>
				</div>
				<div class="col text-center company-info flex-lg-grow-1 text-lg-right">
					<div class="col-header">
						<figure class="mb-0">
							<img id="footer-logo" src="<?php echo get_theme_file_uri('assets/images/logo.png'); ?>" srcset="<?php echo get_theme_file_uri('assets/images/logo@2x.png'); ?> 2x" alt="<?php echo get_bloginfo('name') ?>, <?php echo get_bloginfo('description') ?>" />
						</figure>
					</div>
					<div class="col-content">
						<?php echo get_company_info_data(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom text-center text-lg-right">
		<div class="container">
			<div id="footer-links" class="reset-list">
				<a href="https://www.iubenda.com/privacy-policy/22408243" class="iubenda-nostyle no-brand iubenda-embed">Privacy Policy</a>
				<span class="mx-3 mx-lg-2">|</span>
				<a href="https://www.iubenda.com/privacy-policy/22408243/cookie-policy" class="iubenda-nostyle no-brand iubenda-embed" title="Cookie Policy ">Cookie Policy</a>
				<span class="mx-3 mx-lg-2">|</span>
				<a href="https://www.mapcommunication.it" target="_blank" title="Map Communication - Marketing, Communication, E-Business">Credits</a>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
