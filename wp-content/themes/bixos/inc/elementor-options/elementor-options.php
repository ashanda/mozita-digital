<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use Elementor\Modules\DynamicTags\Module as TagsModule;


class themesflat_options_elementor {
	public function __construct(){	
        add_action('elementor/documents/register_controls', [$this, 'themesflat_elementor_register_options'], 10);
        add_action('elementor/editor/before_enqueue_scripts', function() { wp_enqueue_script( 'elementor-preview-load', THEMESFLAT_LINK . 'js/elementor/elementor-preview-load.js', array( 'jquery' ), null, true );
        }, 10, 3);
    }

    public function themesflat_elementor_register_options($element){
        $post_id = $element->get_id();
        $post_type = get_post_type($post_id);

        if ( ($post_type !== 'post') && ($post_type !== 'portfolios') && ($post_type !== 'services') ) {
        	$this->themesflat_options_page_header($element);
            $this->themesflat_options_page_footer($element);        
        }
        
        $this->themesflat_options_page($element); 
        $this->themesflat_options_page_pagetitle($element);
        $this->themesflat_options_page_partner_box($element);

        if ( is_singular( 'services' ) ) {
            $this->themesflat_options_services($element);
        }
        if ( is_singular( 'post' ) ) {
            $this->themesflat_options_post($element);
        }
    }

    public function themesflat_options_page_header($element) {
        // TF Header
        $element->start_controls_section(
            'themesflat_header_options',
            [
                'label' => esc_html__('TF Header', 'bixos'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'h_options_topbar',
            [
                'label' => esc_html__( 'Topbar', 'bixos' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        
        // Top bar show
        $element->add_control(
            'topbar_show',
            [
                'label'     => esc_html__( 'Top Bar', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'bixos'),
                    0       => esc_html__( 'Hide', 'bixos'),
                    1       => esc_html__( 'Show', 'bixos'),                    
                ],
            ]
        ); 

        $element->add_responsive_control(
            'topbar_padding',
            [
                'label' => esc_html__( 'Padding', 'bixos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top','bottom'],
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .container-inside' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $element->add_control(
            'topbar_background_color',
            [
                'label' => esc_html__( 'Background', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'background: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'topbar_textcolor',
            [
                'label' => esc_html__( 'Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'color: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color',
            [
                'label' => esc_html__( 'Link Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a' => 'color: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color_hover',
            [
                'label' => esc_html__( 'Link Hover Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}}.header-04 .themesflat-top ul.flat-information li > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}}.header-default .themesflat-top ul.flat-information li > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themesflat-top .wrap-btn-topbar .btn-topbar:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'topbar_typography',
                'label' => esc_html__( 'Typography', 'bixos' ),
                'selector' => '{{WRAPPER}} .themesflat-top',
            ]
        );
        $element->add_control(
            'topbar_hide_btn',
            [
                'label'     => esc_html__( 'Hide Button', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'none',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'bixos'),
                    'block'      => esc_html__( 'No', 'bixos'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themesflat-top .wrap-btn-topbar' => 'display: {{VALUE}};',
                ],
            ]
        );
        $element->add_control(
            'topbar_textcolor_btn',
            [
                'label' => esc_html__( 'Button Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .wrap-btn-topbar .btn-topbar' => 'color: {{VALUE}};',                  
                ],
            ]
        );
        $element->add_control(
            'topbar_textbackground_btn',
            [
                'label' => esc_html__( 'Button Background Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#57B33E',
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .wrap-btn-topbar .btn-topbar' => 'background: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'h_options_header',
            [
                'label' => esc_html__( 'Header', 'bixos' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $element->add_control(
            'style_header',
            [
                'label'     => esc_html__( 'Header Style', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'bixos'),
                    'header-default' => esc_html__( 'Header Default', 'bixos'),
                    'header-01' => esc_html__( 'Header 01', 'bixos' ),
                    'header-02' => esc_html__( 'Header 02', 'bixos' ),
                    'header-03' => esc_html__( 'Header 03', 'bixos' ),
                ],
            ]
        );
        // Logo
        $element->add_control(
            'site_logo',
            [
                'label'   => esc_html__( 'Custom Logo', 'bixos' ),
                'type'    => Controls_Manager::MEDIA,
            ]
        );
        $element->add_responsive_control(
            'logo_width',
            [
                'label'      => esc_html__( 'Logo Width', 'bixos' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range'      => [
                    'px' => [
                        'min' => 30,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 50,
                        'max' => 150,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} #header #logo a img, {{WRAPPER}} .modal-menu__panel-footer .logo-panel a img' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $element->add_control(
            'header_absolute',
            [
                'label'     => esc_html__( 'Header Absolute', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'bixos'),
                    0       => esc_html__( 'No', 'bixos'),
                    1       => esc_html__( 'Yes', 'bixos'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_sticky',
            [
                'label'     => esc_html__( 'Header Sticky', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'bixos'),
                    0       => esc_html__( 'No', 'bixos'),
                    1       => esc_html__( 'Yes', 'bixos'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );

        $element->add_control(
            'header_backgroundcolor',
            [
                'label' => esc_html__( 'Header Background', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header.header-default' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-1' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-2' => 'background: {{VALUE}};',                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_backgroundcolor_sticky',
            [
                'label' => esc_html__( 'Header Background Sticky', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header.header-sticky' => 'background: {{VALUE}};',                  
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_height',
            [
                'label' => esc_html__( 'Header Height', 'bixos' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li > a, {{WRAPPER}} #header .show-search, {{WRAPPER}} header .block a, {{WRAPPER}} #header .mini-cart-header .cart-count, {{WRAPPER}} #header .mini-cart .cart-count, {{WRAPPER}} .button-menu' => 'line-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} #header .header-wrap' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'header_search_box',
            [
                'label'     => esc_html__( 'Header Search', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'bixos'),
                    0       => esc_html__( 'No', 'bixos'),
                    1       => esc_html__( 'Yes', 'bixos'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );

        $element->add_control(
            'header_sidebar_toggler',
            [
                'label'     => esc_html__( 'Header Sidebar Toggler', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'bixos'),
                    0       => esc_html__( 'No', 'bixos'),
                    1       => esc_html__( 'Yes', 'bixos'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );

        $element->add_control(
            'mainnav_color',
            [
                'label' => esc_html__( 'Menu Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li > a' => 'color: {{VALUE}} !important;',                  
                ],
            ]
        );

        $element->add_control(
            'mainnav_hover_color',
            [
                'label' => esc_html__( 'Menu Color Hover', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li:hover > a,
                    {{WRAPPER}} #mainnav > ul > li.current-menu-item > a,
                    {{WRAPPER}} #mainnav > ul > li.current-menu-ancestor > a,
                    {{WRAPPER}} #mainnav > ul > li.current-menu-item > a,
                    {{WRAPPER}} #mainnav > ul > li.current-menu-parent > a,
                    {{WRAPPER}} #mainnav > ul > li:hover > a' => 'color: {{VALUE}} !important;',                  
                ],
            ]
        );

        $element->add_control(
            'sub_nav_color',
            [
                'label' => esc_html__( 'Sub Menu Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu > li > a,
                    #mainnav li.megamenu > ul.sub-menu > .menu-item-has-children > a' => 'color: {{VALUE}} !important;',                  
                ],
            ]
        );

        $element->add_control(
            'sub_nav_color_hover',
            [
                'label' => esc_html__( 'Sub Menu Color Hover', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav ul.sub-menu > li > a:hover,
                    {{WRAPPER}} #mainnav ul.sub-menu > li.current-menu-item > a,
                    {{WRAPPER}} #mainnav-mobi ul li.current-menu-item > a,
                    {{WRAPPER}} #mainnav-mobi ul li.current-menu-ancestor > a,
                    {{WRAPPER}} #mainnav ul.sub-menu > li.current-menu-ancestor > a,
                    {{WRAPPER}} #mainnav-mobi ul li.current-menu-item .btn-submenu:before,
                    {{WRAPPER}} #mainnav-mobi ul li .current-menu-item .btn-submenu:before,
                    {{WRAPPER}} #mainnav-mobi ul li .current-menu-item > a' => 'color: {{VALUE}} !important;',                  
                ],
            ]
        );

        //Extra Classes Header
        $element->add_control(
            'extra_classes_header',
            [
                'label'   => esc_html__( 'Extra Classes', 'bixos' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_pagetitle($element) {
        // TF Page Title
        $element->start_controls_section(
            'themesflat_pagetitle_options',
            [
                'label' => esc_html__('TF Page Title', 'bixos'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );       

        $element->add_control(
            'hide_pagetitle',
            [
                'label'     => esc_html__( 'Hide Page Title', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'bixos'),
                    'block'      => esc_html__( 'No', 'bixos'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .page-title' => 'display: {{VALUE}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_padding',
            [
                'label' => esc_html__( 'Padding', 'bixos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_margin',
            [
                'label' => esc_html__( 'Margin', 'bixos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );              

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagetitle_bg',
                'label' => esc_html__( 'Background', 'bixos' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .page-title',
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        $element->add_control(
            'pagetitle_overlay_color',
            [
                'label' => esc_html__( 'Overlay Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-title .overlay' => 'background: {{VALUE}}; opacity: 100%;filter: alpha(opacity=100);',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        //Extra Classes Page Title
        $element->add_control(
            'extra_classes_pagetitle',
            [
                'label'   => esc_html__( 'Extra Classes', 'bixos' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_footer($element) {
        // TF Footer
        $element->start_controls_section(
            'themesflat_footer_options',
            [
                'label' => esc_html__('TF Footer', 'bixos'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'footer_heading',
            [
                'label'     => esc_html__( 'Footer', 'bixos'),
                'type'      => Controls_Manager::HEADING,
            ]
        );       

        $element->add_control(
            'hide_footer',
            [
                'label'     => esc_html__( 'Hide Footer', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'bixos'),
                    'block'      => esc_html__( 'No', 'bixos'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} #footer' => 'display: {{VALUE}};',
                    '{{WRAPPER}} .info-footer' => 'display: {{VALUE}};' 
                ],
            ]
        );

        $element->add_responsive_control(
            'footer_padding',
            [
                'label' => esc_html__( 'Padding', 'bixos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        $element->add_control(
            'show_footer_info',
            [
                'label'     => esc_html__( 'Footer Info', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'bixos'),
                    1 => esc_html__( 'Show', 'bixos' ),
                    0 => esc_html__( 'Hide', 'bixos' ),
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        ); 

        $element->add_control(
            'footer_color',
            [
                'label' => esc_html__( 'Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'color: {{VALUE}}',
                    '{{WRAPPER}} #footer h1, {{WRAPPER}} #footer h2, {{WRAPPER}} #footer h3, {{WRAPPER}} #footer h4, {{WRAPPER}} #footer h5, {{WRAPPER}} #footer h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} #footer, #footer input, #footer select, {{WRAPPER}} #footer textarea, {{WRAPPER}} #footer a, {{WRAPPER}} footer .widget.widget-recent-news li .text .post-date, {{WRAPPER}} footer .widget.widget_latest_news li .text .post-date, {{WRAPPER}} #footer .footer-widgets .widget.widget_themesflat_socials ul li a' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );       

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'footer_bg',
                'label' => esc_html__( 'Background', 'bixos' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .footer_background .overlay-footer',
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        $element->add_control(
            'footer_bg_overlay',
            [
                'label' => esc_html__( 'Background Overlay', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer_background' => 'background-color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        // Bottom
        $element->add_control(
            'bottom_heading',
            [
                'label'     => esc_html__( 'Bottom', 'bixos'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_control(
            'hide_bottom',
            [
                'label'     => esc_html__( 'Hide?', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'bixos'),
                    'block'      => esc_html__( 'No', 'bixos'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} #bottom' => 'display: {{VALUE}};' 
                ],
            ]
        );

        $element->add_control(
            'bottom_color',
            [
                'label' => esc_html__( 'Color', 'bixos' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bottom *' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bottom, {{WRAPPER}} .bottom a' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_bottom' => 'block' ]
            ]
        );

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bottom_bg',
                'label' => esc_html__( 'Background', 'bixos' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} #bottom',
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'bottom_border',
                'label' => esc_html__( 'Border', 'bixos' ),
                'selector' => '{{WRAPPER}} #bottom .container-inside',
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        $element->add_responsive_control(
            'bottom_padding',
            [
                'label' => esc_html__( 'Padding', 'bixos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #bottom .container-inside' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        //Extra Classes Footer
        $element->add_control(
            'extra_classes_footer',
            [
                'label'   => esc_html__( 'Extra Classes', 'bixos' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page($element) {
        // TF Page
        $element->start_controls_section(
            'themesflat_page_options',
            [
                'label' => esc_html__('TF Page', 'bixos'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'page_sidebar_layout',
            [
                'label'     => esc_html__( 'Sidebar Position', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'No Sidebar', 'bixos'),
                    'sidebar-right'     => esc_html__( 'Sidebar Right','bixos' ),
                    'sidebar-left'      =>  esc_html__( 'Sidebar Left','bixos' ),
                    'fullwidth'         =>   esc_html__( 'Full Width','bixos' ),
                ],
            ]
        );

        $element->add_control(
            'page_sidebar_list',
            [
                'label'     => esc_html__( 'Sidebar List', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'blog-sidebar',
                'options'   => [
                    'blog-sidebar'     => esc_html__( 'Sidebar Blog','bixos' ),
                    'themesflat-custom-sidebar-servicessidebar'      =>  esc_html__( 'Sidebar Service','bixos' ),
                    'themesflat-custom-sidebar-portfoliosidebar'         =>   esc_html__( 'Sidebar Portfolio','bixos' ),
                ],
            ]
        );



        $element->add_control(
            'main_content_heading',
            [
                'label'     => esc_html__( 'Main Content', 'bixos'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_responsive_control(
            'main_content_padding',
            [
                'label' => esc_html__( 'Padding', 'bixos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'main_content_margin',
            [
                'label' => esc_html__( 'Margin', 'bixos' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_partner_box($element) {
        // TF Partner Box
        $element->start_controls_section(
            'themesflat_partner-box_options',
            [
                'label' => esc_html__('TF Partner Box', 'bixos'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );       

        $element->add_control(
            'hide_partner-box',
            [
                'label'     => esc_html__( 'Hide Partner Box', 'bixos'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'bixos'),
                    'block'      => esc_html__( 'No', 'bixos'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .themesflat-partner-box' => 'display: {{VALUE}};',
                ],
            ]
        );
        

        $element->add_control(
            'partner_box_background_color',
            [
                'label'     => esc_html__( 'Partner Box Color', 'bixos'),
                'type'      =>  Controls_Manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}} .themesflat-partner-box' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        
        $element->end_controls_section();
    }

    public function themesflat_options_services($element) {
        // TF Services
        $element->start_controls_section(
            'themesflat_services_options',
            [
                'label' => esc_html__('TF Services', 'bixos'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'services_post_heading',
            [
                'label'     => esc_html__( 'Services Post', 'bixos'),
                'type'      => Controls_Manager::HEADING,
            ]
        );

        $element->add_control(
            'services_post_icon',
            [
                'label' => esc_html__( 'Post Icon', 'bixos' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_post($element) {
        // TF Blog
        $element->start_controls_section(
            'themesflat_blog_options',
            [
                'label' => esc_html__('TF Post', 'bixos'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'blog_post_heading',
            [
                'label'     => esc_html__( 'Blog Post', 'bixos'),
                'type'      => Controls_Manager::HEADING,
            ]
        );

        $element->add_control(
            'blog_post_icon',
            [
                'label' => esc_html__( 'Post Icon', 'bixos' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $element->end_controls_section();
    }
}

new themesflat_options_elementor();