<?php
class TFTestimonialCarousel2_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-testimonial-carousel2';
    }
    
    public function get_title() {
        return esc_html__( 'TF Testimonial Carousel 2', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('Testimonial Carousel', 'bixos'),
	            ]
	        );

	        $this->add_control(
				'testimonial_style',
				[
					'label' => esc_html__( 'Layout Style', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style-1',
					'options' => [
						'style-1'  => esc_html__( 'Style 1', 'bixos' ),
					],
				]
			);	    

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'avatar',
				[
					'label' => esc_html__( 'Choose Avatar', 'bixos' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default-testimonial.png",
					],
				]
			);

			$repeater->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'include' => [],
					'default' => 'full',
				]
			);

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Randy K. Yazzie', 'bixos' ),
				]
			);

			$repeater->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'CEO & Founder', 'bixos' ),
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'bixos' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( '“On the other hand we denounce with righteous indignationes dislike men who beguiled and demoralize
					by the charms of pleasure of the moment blinde by desire that they cannot foresee”', 'bixos' ),
				]
			);

			$repeater->add_control(
				'icon_quote',
				[
					'label' => esc_html__( 'Icon', 'bixos' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'flaticon-quote',
						'library' => 'flaticon',
					],
				]
			);

			$this->add_control( 
				'carousel_list',
					[					
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'default' => [
							[ 
								'name' => 'Randy K. Yazzie',
								'position' => 'CEO & Founder',
								'description'=> '“On the other hand we denounce with righteous indignationes dislike men who beguiled and demoralize
								by the charms of pleasure of the moment blinde by desire that they cannot foresee”',
							],
							[ 
								'name' => 'Noah Oliver Elijah',
								'position' => 'Manager',
								'description'=> '“On the other hand we denounce with righteous indignationes dislike men who beguiled and demoralize
								by the charms of pleasure of the moment blinde by desire that they cannot foresee”',
							],
							[ 
								'name' => 'Liam Olivia Emma',
								'position' => 'Design',
								'description'=> '“On the other hand we denounce with righteous indignationes dislike men who beguiled and demoralize
								by the charms of pleasure of the moment blinde by desire that they cannot foresee”',
							],
							[ 
								'name' => 'William Ames Benjamin',
								'position' => 'Development',
								'description'=> '“On the other hand we denounce with righteous indignationes dislike men who beguiled and demoralize
								by the charms of pleasure of the moment blinde by desire that they cannot foresee”',
							],
						],	
					]
				);
			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Style      
		  
			$this->start_controls_section( 
				'section_style',
	            [
	                'label' => esc_html__('Style', 'bixos'),
	            ]
	        );	

	        $this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item-testimonial',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item-testimonial, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-carousel .owl-stage-outer',
				]
			);
			$this->add_control(
				'background',
				[
					'label' => esc_html__( 'Background Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#FFFFFF',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item-testimonial' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}}  .tf-testimonial-carousel.tes-2 .item-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item-testimonial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-carousel .owl-stage-outer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	        $this->add_control(
				'h_icon',
				[
					'label' => esc_html__( 'Icon', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'icon_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 89,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .icon-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .icon-quote svg ' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(255, 64, 64, 1);',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .icon-quote' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .icon-quote svg' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .icon-quote svg g rect' => 'fill: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '13',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item-testimonial .icon-quote' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_avatar',
				[
					'label' => esc_html__( 'Avatar', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_responsive_control( 
				'avatar_width',
				[
					'label' => esc_html__( 'Avatar Width', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'desktop_default' => [
						'size' => 65,
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .avatar' => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			); 	
			$this->add_responsive_control(
				'avatar_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '26',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .avatar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	        $this->add_control(
				'h_name',
				[
					'label' => esc_html__( 'Name', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '20',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '600',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .name',
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000033',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .name' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'name_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '6',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		
			$this->add_control(
				'h_position',
				[
					'label' => esc_html__( 'Position', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Open Sans',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '14',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .position',
	
				]
			);
			$this->add_control(
				'position_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .position' => 'color: {{VALUE}}',
					],
					
				]
			);


			$this->add_control(
				'h_description',
				[
					'label' => esc_html__( 'Description', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '40',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .description',
				]
			);
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000033',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .description' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'description_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .description' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => "0",
						'right' => "0",
						'bottom' => "40",
						'left' => "0",
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'description_padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => "0",
						'right' => "0",
						'bottom' => "43",
						'left' => "0",
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_active',
					'label' => esc_html__( 'Border Descriptions', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .item .description',
				]
			);

			$this->add_control(
				'h_index_active',
				[
					'label' => esc_html__( 'Index Active', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_active',
					'label' => esc_html__( 'Index Active Border', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .indexActiveItem .item-testimonial',
				]
			);

			$this->add_control(
				'index_active_icon_color',
				[
					'label' => esc_html__( 'Icon Active Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .indexActiveItem .icon-quote' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .indexActiveItem .icon-quote svg' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .indexActiveItem .icon-quote svg g rect' => 'fill: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);

			$this->add_responsive_control(
				'index_active_padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '34',
						'right' => '22',
						'bottom' => '25',
						'left' => '25',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}}  .tf-testimonial-carousel.tes-2 .indexActiveItem .item-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'testimonial_style' => 'style-2'
					],
				]
			);

			

	        $this->end_controls_section();
        // /.End Style

        // Start Setting        
			$this->start_controls_section( 
				'section_setting',
	            [
	                'label' => esc_html__('Setting', 'bixos'),
	            ]
	        );	

			$this->add_control( 
				'carousel_loop',
				[
					'label' => esc_html__( 'Loop', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'bixos' ),
					'label_off' => esc_html__( 'Off', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'yes',				
				]
			);

			$this->add_control( 
				'carousel_auto',
				[
					'label' => esc_html__( 'Auto Play', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'bixos' ),
					'label_off' => esc_html__( 'Off', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'yes',				
				]
			);	

			$this->add_control(
				'carousel_spacer',
				[
					'label' => esc_html__( 'Spacer', 'bixos' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'default' => 30,				
				]
			);

			$this->add_control( 
	        	'carousel_column_desk',
				[
					'label' => esc_html__( 'Columns Desktop', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'bixos' ),
						'2' => esc_html__( '2', 'bixos' ),
						'3' => esc_html__( '3', 'bixos' ),
						'4' => esc_html__( '4', 'bixos' ),
						'5' => esc_html__( '5', 'bixos' ),
						'6' => esc_html__( '6', 'bixos' ),
					],				
				]
			);

			$this->add_control( 
	        	'carousel_column_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'bixos' ),
						'2' => esc_html__( '2', 'bixos' ),
						'3' => esc_html__( '3', 'bixos' ),
						'4' => esc_html__( '4', 'bixos' ),
						'5' => esc_html__( '5', 'bixos' ),
						'6' => esc_html__( '6', 'bixos' ),
					],				
				]
			);

			$this->add_control( 
	        	'carousel_column_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'bixos' ),
						'2' => esc_html__( '2', 'bixos' ),
						'3' => esc_html__( '3', 'bixos' ),
						'4' => esc_html__( '4', 'bixos' ),
						'5' => esc_html__( '5', 'bixos' ),
						'6' => esc_html__( '6', 'bixos' ),
					],				
				]
			);

			$this->add_control( 
	        	'index_active',
				[
					'label' => esc_html__( 'Index Active', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'0' => esc_html__( '1', 'bixos' ),
						'1' => esc_html__( '2', 'bixos' ),
						'2' => esc_html__( '3', 'bixos' ),
						'3' => esc_html__( '4', 'bixos' ),
						'4' => esc_html__( '5', 'bixos' ),
						'5' => esc_html__( '6', 'bixos' ),
						'6' => esc_html__( '7', 'bixos' ),
					],
					'condition' => [
						'testimonial_style' => 'style-2'
					],				
				]
			);

	        $this->end_controls_section();
        // /.End Setting

        // Start Arrow        
			$this->start_controls_section( 
				'section_arrow',
	            [
	                'label' => esc_html__('Arrow', 'bixos'),
	            ]
	        );

	        $this->add_control( 
				'carousel_arrow',
				[
					'label' => esc_html__( 'Arrow', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'bixos' ),
					'label_off' => esc_html__( 'Hide', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'no',				
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

	        $this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'bixos' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-left',
	                'include' => [
						'fa fa-angle-double-left',
						'fa fa-angle-left',
						'fa fa-chevron-left',
						'fa fa-arrow-left',
						'Bixos-icon-long-arrow-left1',
					],  
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'bixos' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-right',
	                'include' => [
						'fa fa-angle-double-right',
						'fa fa-angle-right',
						'fa fa-chevron-right',
						'fa fa-arrow-right',
						'Bixos-icon-long-arrow-right2',
					], 
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	        $this->add_responsive_control( 
	        	'carousel_arrow_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 12,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'w_size_carousel_arrow',
				[
					'label' => esc_html__( 'Width', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 46,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'h_size_carousel_arrow',
				[
					'label' => esc_html__( 'Height', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 46,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);	

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_prev',
				[
					'label' => esc_html__( 'Horizontal Position Previous', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -2000,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_next',
				[
					'label' => esc_html__( 'Horizontal Position Next', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -2000,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_vertical_position',
				[
					'label' => esc_html__( 'Vertical Position', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_arrow_tabs',
				[
					'condition' => [
		                'carousel_arrow' => 'yes',	                
		            ]
				] );

				$this->start_controls_tab( 
					'carousel_arrow_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

				$this->add_control( 
					'carousel_arrow_color',
		            [
		                'label' => esc_html__( 'Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->add_control( 
		        	'carousel_arrow_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#57B33E',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );	

		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border',
						'label' => esc_html__( 'Border', 'bixos' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_arrow_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
			            'default' => [
							'top' => "0",
							'right' => "0",
							'bottom' => "0",
							'left' => "0",
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->end_controls_tab();

		        $this->start_controls_tab( 
			    	'carousel_arrow_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'bixos' ),
					]
				);

		    	$this->add_control( 
		    		'carousel_arrow_color_hover',
		            [
		                'label' => esc_html__( 'Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#1F242C',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->add_control( 
		        	'carousel_arrow_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#E1E1E1',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border_hover',
						'label' => esc_html__( 'Border', 'bixos' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next.disabled',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_arrow_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                    '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

	       		$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Arrow

        // Start Bullets        
			$this->start_controls_section( 
				'section_bullets',
	            [
	                'label' => esc_html__('Bullets', 'bixos'),
	            ]
	        );

			$this->add_control( 
				'carousel_bullets',
	            [
	                'label'         => esc_html__( 'Bullets', 'bixos' ),
	                'type'          => \Elementor\Controls_Manager::SWITCHER,
	                'label_on'      => esc_html__( 'Show', 'bixos' ),
	                'label_off'     => esc_html__( 'Hide', 'bixos' ),
	                'return_value'  => 'yes',
	                'default'       => 'yes',
	                'separator' => 'before',
	            ]
	        );        

			$this->add_responsive_control( 
				'carousel_bullets_horizontal_position',
				[
					'label' => esc_html__( 'Horizonta Offset', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_vertical_position',
				[
					'label' => esc_html__( 'Vertical Offset', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -200,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => -50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_margin',
				[
					'label' => esc_html__( 'Spacing', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot' => 'margin: 0 {{SIZE}}{{UNIT}};',
					],
					'condition' => [
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_bullets_tabs',
					[
						'condition' => [						
		                    'carousel_bullets' => 'yes',
		                ]
					] );
				$this->start_controls_tab( 
					'carousel_bullets_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

				$this->add_responsive_control( 
		        	'w_size_carousel_bullets',
						[
							'label' => esc_html__( 'Width', 'bixos' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
									'step' => 1,
								]
							],
							'default' => [
								'unit' => 'px',
								'size' => 7,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [						
			                    'carousel_bullets' => 'yes',
			                ]
						]
				);			

				$this->add_responsive_control( 
					'h_size_carousel_bullets',
					[
						'label' => esc_html__( 'Height', 'bixos' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						'default' => [
							'unit' => 'px',
							'size' => 7,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [					
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_control( 
					'carousel_bullets_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ff4040',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border',
						'label' => esc_html__( 'Border', 'bixos' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot',						
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_bullets_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'default' => [
							'top' => '50',
							'right' => '50',
							'bottom' => '50',
							'left' => '50',
							'unit' => '%',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

			    $this->end_controls_tab();

		        $this->start_controls_tab( 
		        	'carousel_bullets_hover_tab',
					[
						'label' => esc_html__( 'Active', 'bixos' ),
					]
				);

				$this->add_responsive_control( 
		        	'w_size_carousel_bullets_active',
						[
							'label' => esc_html__( 'Width', 'bixos' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
									'step' => 1,
								]
							],
							'default' => [
								'unit' => 'px',
								'size' => 5,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [						
			                    'carousel_bullets' => 'yes',
			                ]
						]
				);

				$this->add_responsive_control( 
					'h_size_carousel_bullets_active',
					[
						'label' => esc_html__( 'Height', 'bixos' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						'default' => [
							'unit' => 'px',
							'size' => 5,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [					
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_control( 
					'size_carousel_bullets_active_scale_hover',
					[
						'label' => esc_html__( 'Scale', 'bixos' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 1,
								'max' => 2,
								'step' => 0.1,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 1,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot.active, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot:hover' => 'transform: scale({{SIZE}});',
						],
					]
				);	

	        	$this->add_control( 
	        		'carousel_bullets_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ff4040',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
							'{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-carousel .owl-dot.active::after' => 'border-color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

	        	$this->add_group_control( 
	        		\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border_hover',
						'label' => esc_html__( 'Border', 'bixos' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot.active',
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_bullets_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel.tes-2 .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

				$this->end_controls_tab();

		    $this->end_controls_tabs();	

	        $this->end_controls_section();
        // /.End Bullets    
	    
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$carousel_arrow = 'no-arrow';
		if ( $settings['carousel_arrow'] == 'yes' ) {
			$carousel_arrow = 'has-arrow';
		}

		$carousel_bullets = 'no-bullets';
		if ( $settings['carousel_bullets'] == 'yes' ) {
			$carousel_bullets = 'has-bullets';
		}

		$icon_quote = '';

		?>
		<div class="tf-testimonial-carousel tes-2 <?php echo esc_attr($settings['testimonial_style']) ?> <?php echo esc_attr($carousel_arrow); ?> <?php echo esc_attr($carousel_bullets); ?>" data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>" data-index_active="<?php echo esc_attr($settings['index_active']) ?>">
			<div class="owl-carousel owl-theme">
			<?php foreach ($settings['carousel_list'] as $carousel): 
					$icon_quote = \Elementor\Addon_Elementor_Icon_manager_Bixos::render_icon( $carousel['icon_quote'], [ 'aria-hidden' => 'true' ] );
				?>				
				<div class="item">							
						<div class="item-testimonial">						
							<div class="description">
								<?php if ($icon_quote): ?>
									<div class="icon-quote"><?php echo sprintf($icon_quote); ?>
								</div>
								<?php endif; ?><?php echo sprintf( '%1$s', $carousel['description'] ); ?>
							</div>
							<div class="wrap-author">				
								<div class="avatar"><img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="image"></div>
								<div class="content">
									<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
									<div class="position">
										<?php echo esc_attr($carousel['position']); ?>
									</div>
								</div>
							</div>	
						</div>				
				</div>				
			<?php endforeach;?>
			</div>
		</div>
		<?php	
	}

}