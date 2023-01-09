<?php 
//Header Style
$wp_customize->add_setting(
    'style_header',
    array(
        'default'           => themesflat_customize_default('style_header'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_RadioImages($wp_customize,
    'style_header',
    array (
        'type'      => 'radio-images',           
        'section'   => 'section_options',
        'priority'  => 1,
        'label'         => esc_html__('Header Style', 'bixos'),
        'choices'   => array (
            'header-default' => array (
                'tooltip'   => esc_html__( 'Header Default','bixos' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header-default.jpg'
            ),
            'header-01'=>  array (
                'tooltip'   => esc_html__( 'Header 01','bixos' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header01.jpg'
            ),
            'header-02'=>  array (
                'tooltip'   => esc_html__( 'Header 02','bixos' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header02.jpg'
            ),
            'header-02'=>  array (
                'tooltip'   => esc_html__( 'Header 03','bixos' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header02.jpg'
            ),
        ),
    ))
); 

// Enable Header Absolute
$wp_customize->add_setting(
  'header_absolute',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_absolute'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_absolute',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Header Absolute ( OFF | ON )', 'bixos'),
        'section' => 'section_options',
        'priority' => 1,
    ))
);

// Enable Header Sticky
$wp_customize->add_setting(
  'header_sticky',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_sticky'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_sticky',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Header Sticky ( OFF | ON )', 'bixos'),
        'section' => 'section_options',
        'priority' => 2,
    ))
);    



// Social Header
$wp_customize->add_setting(
    'social_header',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('social_header'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'social_header',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Social ( OFF | ON )', 'bixos'),
          'section' => 'section_options',
          'priority' => 8,
      ))
  );
