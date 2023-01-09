<?php 
// Top bar show
$wp_customize->add_setting( 
  'topbar_show',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('topbar_show'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'topbar_show',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Topbar ( OFF | ON )', 'bixos'),
        'section' => 'section_topbar',
        'priority' => 2,
    ))
);     

// Address Label
$wp_customize->add_setting(
    'topbar_address_label',
    array(
        'default' => themesflat_customize_default('topbar_address_label'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_address_label',
    array(
        'label' => esc_html__( 'Address Label', 'bixos' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 5
    )
);
// Address Number
$wp_customize->add_setting(
    'topbar_address',
    array(
        'default' => themesflat_customize_default('topbar_address'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_address',
    array(
        'label' => esc_html__( 'Address', 'bixos' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 6
    )
);

// Email Label
$wp_customize->add_setting(
    'topbar_email_label',
    array(
        'default' => themesflat_customize_default('topbar_email_label'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_email_label',
    array(
        'label' => esc_html__( 'Email Label', 'bixos' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 7
    )
);
// Email Number
$wp_customize->add_setting(
    'topbar_email',
    array(
        'default' => themesflat_customize_default('topbar_email'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_email',
    array(
        'label' => esc_html__( 'Email', 'bixos' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 8
    )
);

// Social Topbar
$wp_customize->add_setting(
  'social_topbar',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('social_topbar'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'social_topbar',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Social ( OFF | ON )', 'bixos'),
        'section' => 'section_topbar',
        'priority' => 9,
    ))
);

// Topbar Box control
$wp_customize->add_setting(
    'topbar_controls',
    array(
        'default' => themesflat_customize_default('topbar_controls'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control( new themesflat_BoxControls($wp_customize,
    'topbar_controls',
    array(
        'label' => esc_html__( 'Box Controls (px)', 'bixos' ),
        'section' => 'section_topbar',
        'type' => 'box-controls',
        'priority' => 10
    ))
);