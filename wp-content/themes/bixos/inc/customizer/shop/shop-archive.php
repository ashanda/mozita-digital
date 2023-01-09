<?php 
//Sidebar Position
$wp_customize->add_setting(
    'shop_layout',
    array(
        'default'           => themesflat_customize_default('shop_layout'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'shop_layout',
    array (
        'type'      => 'select',           
        'section'   => 'section_shop_archive',
        'priority'  => 1,
        'label'         => esc_html__('Sidebar Position', 'bixos'),
        'choices'   => array (
            'sidebar-right'     => esc_html__( 'Sidebar Right','bixos' ),
            'sidebar-left'      =>  esc_html__( 'Sidebar Left','bixos' ),
            'fullwidth'         =>   esc_html__( 'Full Width','bixos' ),
            'fullwidth-small'   =>   esc_html__( 'Full Width Small','bixos' ),
            'fullwidth-center'  =>   esc_html__( 'Full Width Center','bixos' ),
        ),
    )
);

// Gird columns
$wp_customize->add_setting(
    'shop_columns',
    array(
        'default'           => themesflat_customize_default('shop_columns'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'shop_columns',
    array(
        'type'      => 'select',           
        'section'   => 'section_shop_archive',
        'priority'  => 2,
        'label'     => esc_html__('Columns', 'bixos'),
        'choices'   => array(
            2     => esc_html__( '2 Columns', 'bixos' ),
            3     => esc_html__( '3 Columns', 'bixos' ),
            4     => esc_html__( '4 Columns', 'bixos' ),
            5     => esc_html__( '5 Columns', 'bixos' ),                
        )
    )
);

// Number Posts Portfolios
$wp_customize->add_setting (
    'shop_products_per_page',
    array(
        'default' => themesflat_customize_default('shop_products_per_page'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'shop_products_per_page',
    array(
        'type'      => 'text',
        'label'     => esc_html__('Show Number Products', 'bixos'),
        'section'   => 'section_shop_archive',
        'priority'  => 3
    )
);

// Product Style
$wp_customize->add_setting(
    'product_style',
    array(
        'default'           => themesflat_customize_default('product_style'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    'product_style',
    array(
        'type'      => 'select',           
        'section'   => 'section_shop_archive',
        'priority'  => 4,
        'label'     => esc_html__('Product Style', 'bixos'),
        'choices'   => array(
            'product-style1'     => esc_html__( 'Product Style 1', 'bixos' ),
            'product-style2'     => esc_html__( 'Product Style 2', 'bixos' ),             
        )
    )
);