<?php 

// Button Url
$wp_customize->add_setting(
    'header_info_phone_number',
    array(
        'default' => themesflat_customize_default('header_info_phone_number'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_info_phone_number',
    array(
        'label' => esc_html__( 'Phone Number', 'bixos' ),
        'section' => 'section_info',
        'type' => 'text',
        'priority' => 2
    )
);