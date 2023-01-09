<?php 
// Page title heading
$wp_customize->add_setting(
  'page_title_heading_enabled',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('page_title_heading_enabled'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'page_title_heading_enabled',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Heading ( OFF | ON )', 'bixos'),
        'section' => 'section_page_title',
        'priority' => 1,
    ))
);

$wp_customize->add_setting('themesflat_options[info]', array(
        'type'              => 'info_control',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',            
    )
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'page-title-style', array(
    'label' => esc_html__('Page Title Style', 'bixos'),
    'section' => 'section_page_title',
    'settings' => 'themesflat_options[info]',
    'priority' => 20
    ) )
);

$wp_customize->add_setting(
    'page_title_styles',
    array(
        'default'           => themesflat_customize_default('page_title_styles'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'page_title_styles',
    array (
        'type'      => 'select',           
        'section'   => 'section_page_title',
        'priority'  => 21,
        'label'         => esc_html__('Page Title Style', 'bixos'),
        'choices'   => array (
            'inline' =>  esc_html__( 'Inline Heading & Breadcrumbs','bixos' ),
            'default' =>  esc_html__( 'Default','bixos' ),
            'parallax' =>  esc_html__( 'Parallax','bixos' ),
            'video' =>  esc_html__( 'Video','bixos' )
            ) ,
    )
);

$wp_customize->add_setting(
    'page_title_alignment',
    array(
        'default'           => themesflat_customize_default('page_title_alignment'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'page_title_alignment',
    array (
        'type'      => 'select',           
        'section'   => 'section_page_title',
        'priority'  => 22,
        'label'         => esc_html__('Page Title Alignment', 'bixos'),
        'choices'   => array (
            'left' =>  esc_html__( 'Left','bixos' ),
            'center' =>  esc_html__( 'Center','bixos' ),
            'right' =>  esc_html__( 'Right','bixos' )
            ) ,
    )
); 

//Page Title Background
$wp_customize->add_setting(
    'page_title_background_image',
    array(
        'default' => themesflat_customize_default('page_title_background_image'),
        'sanitize_callback' => 'esc_url_raw',
    )
);    
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'page_title_background_image',
        array(
           'label'          => esc_html__( 'Upload Background Image', 'bixos' ),
           'type'           => 'image',
           'section'        => 'section_page_title',
           'priority'       => 23,
        )
    )
);

$wp_customize->add_setting(
    'page_title_image_size',
    array(
        'default'           => themesflat_customize_default('page_title_image_size'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'page_title_image_size',
    array (
        'type'      => 'select',           
        'section'   => 'section_page_title',
        'priority'  => 24,
        'label'         => esc_html__('Page Title Image Size', 'bixos'),
        'choices'   => array (
            'auto' =>  esc_html__( 'Original','bixos' ),
            'contain' =>  esc_html__( 'Fit to Screen','bixos' ),
            'cover' =>  esc_html__( 'Fill Screen','bixos' )
            ) ,
    )
);

$wp_customize->add_setting (
    'page_title_video_url',
    array(
        'default' => themesflat_customize_default('page_title_video_url') ,
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'page_title_video_url',
    array(
        'type'      => 'text',
        'label'     => esc_html__('Page Title Background Video URL', 'bixos'),
        'section'   => 'section_page_title',
        'priority'  => 25
    )
);

// Page Title Overlay
$wp_customize->add_setting(
    'page_title_background_color',
    array(
        'default'           => themesflat_customize_default('page_title_background_color'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_ColorOverlay(
        $wp_customize,
        'page_title_background_color',
        array(
            'label'         => esc_html__('Background Color', 'bixos'),
            'section'       => 'section_page_title',
            'priority'      => 26
        )
    )
);   

$wp_customize->add_setting(
    'page_title_background_color_opacity',
    array(
        'default'   =>  themesflat_customize_default('page_title_background_color_opacity'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_Slide_Control( $wp_customize,
    'page_title_background_color_opacity',
        array(
            'type'      =>  'slide-control',
            'section'   =>  'section_page_title',
            'label'     =>  'Opacity for Background Color (%)',
            'priority'  => 27,
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ),
        )

    )
);  

// Box control
$wp_customize->add_setting(
    'page_title_controls',
    array(
        'default' => themesflat_customize_default('page_title_controls'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control( new themesflat_BoxControls($wp_customize,
    'page_title_controls',
    array(
        'label' => esc_html__( 'Page Title Controls (px)', 'bixos' ),
        'section' => 'section_page_title',
        'type' => 'box-controls',
        'priority' => 28
    ))
);  