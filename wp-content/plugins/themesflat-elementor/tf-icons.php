<?php 
add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );

function themesflat_iconpicker_register( $icons = array() ) {
	
	$icons['Bixos_icon'] = array(
		'name'          => 'Bixos_icon',
		'label'         => esc_html__( 'Bixos Icons', 'bixos' ),
		'labelIcon'     => 'bixos-icon',
		'prefix'        => 'bixos-icon-',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-bixos.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/bixos_fonts_default.json',
		'ver'           => '1.0.0',
	);

	// $icons['30_Digital_Marketing_Icons'] = array(
	// 	'name'          => '30_Digital_Marketing_Icons',
	// 	'label'         => esc_html__( '30 Digital Marketing Icons', 'bixos' ),
	// 	'labelIcon'     => 'bixos-icon',
	// 	'prefix'        => 'bixos-icon-',
	// 	'displayPrefix' => '',
	// 	'url'           => THEMESFLAT_LINK . 'css/icon-bixos.css',
	// 	'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/30_digital_marketing_icon.json',
	// 	'ver'           => '1.0.0',
	// );

	$icons['36_Digital_Marketing_Outline'] = array(
		'name'          => '30_Digital_Marketing_Outline',
		'label'         => esc_html__( '36 Digital Marketing Outline', 'bixos' ),
		'labelIcon'     => 'bixos-icon',
		'prefix'        => 'bixos-icon-',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-bixos.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/36_digital_marketing_outline.json',
		'ver'           => '1.0.0',
	);
	
	$icons['Flaticon'] = array(
		'name'          => 'Flaticon',
		'label'         => esc_html__( 'Flaticon', 'bixos' ),
		'labelIcon'     => 'flaticon',
		'prefix'        => 'flaticon-',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/flaticon.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/bixos_fonts_flaticon.json',
		'ver'           => '1.0.0',
	);
	return $icons;
}