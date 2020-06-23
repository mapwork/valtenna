<?php
/**
 * valtenna Theme Customizer
 *
 * @package valtenna
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function valtenna_customize_register( $wp_customize ) {
	global $wp_customize;
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'custom_css' );

	Kirki::add_config( 'valtenna', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	Kirki::add_panel( 'general_settings', array(
		'title'          => esc_html__( 'Impostazioni Generali'),
		'description'    => esc_html__( 'Varie impostazioni generali del sito'),
		'priority'       => 160,
	) );

	Kirki::add_section( 'company_info', array(
		'title'          => esc_html__( 'Info azienda', 'valtenna' ),
		'description'    => esc_html__( 'Imposta le informazioni dell&raquo;azienda' ),
		'priority'       => 160,
		'panel'          => 'general_settings',
	) );

	Kirki::add_field( 'valtenna', [
		'type'     => 'text',
		'settings' => 'business_name',
		'label'    => esc_html__( 'Ragione Sociale'),
		'section'  => 'company_info',
		'priority' => 10,
	] );

	Kirki::add_field( 'valtenna', [
		'type'     => 'textarea',
		'settings' => 'company_address',
		'label'    => esc_html__( 'Indirizzo completo' ),
		'section'  => 'company_info',
		'priority' => 20,
	] );

	Kirki::add_field( 'valtenna', [
		'type'     => 'text',
		'settings' => 'company_vat',
		'label'    => esc_html__( 'Partita IVA'),
		'section'  => 'company_info',
		'priority' => 30,
	] );

	Kirki::add_field( 'valtenna', [
		'type'     => 'text',
		'settings' => 'company_email',
		'label'    => esc_html__( 'E-mail'),
		'section'  => 'company_info',
		'priority' => 40,
	] );

	Kirki::add_field( 'valtenna', [
		'type'     => 'text',
		'settings' => 'company_tel',
		'label'    => esc_html__( 'Telefono'),
		'section'  => 'company_info',
		'priority' => 50,
	] );

	Kirki::add_panel( 'homepage', array(
		'title'          => esc_html__( 'Homepage'),
		'description'    => esc_html__( 'Impostazioni elementi di layout della home' ),
		'priority'       => 160,
	) );

	Kirki::add_section( 'product_categories', array(
		'title'          => esc_html__( 'Categorie prodotti' ),
		'description'    => esc_html__( 'Imposta il blocco delle categorie di prodotto' ),
		'priority'       => 10,
		'panel'          => 'homepage',
	) );

	Kirki::add_field( 'valtenna', [
		'type'     => 'text',
		'settings' => 'products_cat_title',
		'label'    => esc_html__( 'Titolo del blocco' ),
		'section'  => 'product_categories',
		'priority' => 10,
	] );

	Kirki::add_field( 'valtenna', [
		'type'        => 'textarea',
		'settings'    => 'products_cat_intro',
		'label'       => esc_html__( 'Testo di introduzione' ),
		'section'     => 'product_categories',
		'priority' 	  => 20,
	] );

	$cats = get_terms([
      'taxonomy'  => 'products_cat',
      'hide_empty' => false
   ]);
	Kirki::add_field( 'valtenna', [
		'type'        => 'number',
		'settings'    => 'products_cat_num',
		'label'       => esc_html__( 'Limite numero categorie da mostrare' ),
		'section'     => 'product_categories',
		'default'     => 0,
		'priority' 	  => 30,
		'choices'     => [
			'min'  => 0,
			'max'  => count( $cats ),
			'step' => 1,
		],
	] );

	Kirki::add_field( 'valtenna', [
		'type'        => 'select',
		'settings'    => 'products_cat_orderby',
		'label'       => esc_html__( 'Ordinamento delle categorie' ),
		'section'     => 'product_categories',
		'default'     => 'name',
		'placeholder' => esc_html__( 'Seleziona'),
		'priority'    => 40,
		'multiple'    => 0,
		'choices'     => [
			'name' => esc_html__( 'Nome'),
			'slug' => esc_html__( 'Slug' ),
			'term_id' => esc_html__( 'Term ID' )
		],
	] );

	Kirki::add_field( 'valtenna', [
		'type'        => 'radio-buttonset',
		'settings'    => 'products_cat_order',
		'label'       => esc_html__( 'Direzione di ordinamento' ),
		'section'     => 'product_categories',
		'default'     => 'ASC',
		'priority'    => 50,
		'choices'     => [
			'ASC'   => esc_html__( 'ASC' ),
			'DESC' => esc_html__( 'DESC' ),
		],
	] );

	Kirki::add_section( 'homepage_slideshow', array(
		'title'          => esc_html__( 'Slideshow' ),
		'description'    => esc_html__( 'Imposta il blocco slideshow' ),
		'priority'       => 20,
		'panel'          => 'homepage',
	) );

	Kirki::add_field( 'valtenna', [
		'type'        => 'textarea',
		'settings'    => 'home_slideshow_claim',
		'label'       => esc_html__( 'Claim/Citazione introduttiva' ),
		'section'     => 'homepage_slideshow',
		'priority' 	  => 10,
	] );

	Kirki::add_field( 'valtenna', [
		'type'        => 'repeater',
		'label'       => esc_html__( 'Slides' ),
		'section'     => 'homepage_slideshow',
		'priority'    => 20,
		'row_label' => [
			'type'  => 'text',
			'value' => esc_html__( 'slide' ),
		],
		'button_label' => esc_html__('Aggiungi una slide' ),
		'settings'     => 'homepage_slideshow_slides',
		'fields' => [
			'slide_image' => [
				'type'        => 'image',
				'label'       => esc_html__( 'Immagine slide' ),
				'default'     => '',
			]
		]
	] );

	Kirki::add_section( 'special_projects', array(
		'title'          => esc_html__( 'Progetti speciali' ),
		'description'    => esc_html__( 'Gestisci l&rsquo;anteprima dei progetti speciali in homepage' ),
		'priority'       => 20,
		'panel'          => 'homepage',
	) );

	Kirki::add_field( 'valtenna', [
		'type'     => 'text',
		'settings' => 'special_projects_title',
		'label'    => esc_html__( 'Titolo' ),
		'section'  => 'special_projects',
		'priority' => 10,
	] );

	Kirki::add_field( 'valtenna', [
		'type'     => 'textarea',
		'settings' => 'special_projects_text',
		'label'    => esc_html__( 'Testo introduttivo', ),
		'section'  => 'special_projects',
		'priority' => 20,
	] );

	Kirki::add_field( 'valtenna', [
		'type'        => 'number',
		'settings'    => 'special_projects_slides_num',
		'label'       => esc_html__( 'Numero di slides da visualizzare' ),
		'section'     => 'special_projects',
		'default'     => 5,
		'choices'     => [
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		],
		'priority' => 30,
	] );
}
add_action( 'customize_register', 'valtenna_customize_register' );
