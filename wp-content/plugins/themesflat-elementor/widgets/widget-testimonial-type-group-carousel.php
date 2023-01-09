<?php
class TFTestimonialTypeGroupCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-testimonial-carousel-type-group';
    }
    
    public function get_title() {
        return esc_html__( 'TF Testimonial Type Group Carousel', 'bixos' );
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

			$this->add_control(
				'icon_quote',
				[
					'label' => esc_html__( 'Icon', 'bixos' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'Bixos-icon-quotation',
						'library' => 'Bixos_icon_solar_energy',
					],
				]
			);	   
			
			$this->add_control(
				'icon_quote_2',
				[
					'label' => esc_html__( 'Icon', 'bixos' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'Bixos-icon-quotation',
						'library' => 'Bixos_icon_solar_energy',
					],
				]
			);

			$repeater = new \Elementor\Repeater();


			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Elijah Charlotte Eva', 'bixos' ),
				]
			);

			$repeater->add_control(
				'reviews',
				[
					'label' => esc_html__( 'Reviews', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '5 Reviews', 'bixos' ),
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'bixos' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( 'Fusce sodales egestas neque, in pulvinar enim ultricies at. Vivamus vitae consequat elit. Praesent lacinia tincidunt varius. Vestibulum ante ipsum the primis in faucibus orci luctus et ultrices posuere cubilia curae Integer tincidunt sodales neque pulvinar Praesent lacinia tincidunt varius.', 'bixos' ),
				]
			);	

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image (Only Style 1)', 'bixos' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/testimonial-type-2.jpg",
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
							'name' => 'Elijah Charlotte Eva',
							'reviews' => '5 Reviews',
							'description'=> 'Fusce sodales egestas neque, in pulvinar enim ultricies at. Vivamus vitae consequat elit. Praesent lacinia tincidunt varius. Vestibulum ante ipsum the primis in faucibus orci luctus et ultrices posuere cubilia curae Integer tincidunt sodales neque pulvinar Praesent lacinia tincidunt varius.',
						],
						[ 
							'name' => 'Elijah Charlotte Eva',
							'reviews' => '5 Reviews',
							'description'=> 'Fusce sodales egestas neque, in pulvinar enim ultricies at. Vivamus vitae consequat elit. Praesent lacinia tincidunt varius. Vestibulum ante ipsum the primis in faucibus orci luctus et ultrices posuere cubilia curae Integer tincidunt sodales neque pulvinar Praesent lacinia tincidunt varius.',
						],
						[ 
							'name' => 'Elijah Charlotte Eva',
							'reviews' => '5 Reviews',
							'description'=> 'Fusce sodales egestas neque, in pulvinar enim ultricies at. Vivamus vitae consequat elit. Praesent lacinia tincidunt varius. Vestibulum ante ipsum the primis in faucibus orci luctus et ultrices posuere cubilia curae Integer tincidunt sodales neque pulvinar Praesent lacinia tincidunt varius.',
						],
					],					
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_avatar',
					'default' => 'thumbnail',
				]
			);
			$this->add_control(
				'h_image_size_Image',
				[
					'label' => esc_html__( 'Image Size Image', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'testimonial_style' => 'style-1',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_image',
					'default' => 'full',
					'condition' => [
						'testimonial_style' => 'style-1',
					],
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
					'default' => 'no',
					'condition' => [
						'testimonial_style' => 'style-2'
					],				
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
					'default' => 'no',
					'condition' => [
						'testimonial_style' => 'style-2'
					],			
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
					'condition' => [
						'testimonial_style' => 'style-2'
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

			$this->add_control( 
				'bg_color',
				[
					'label' => esc_html__( 'Background Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .item-testimonial' => 'background-color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'bg_color_overlay',
				[
					'label' => esc_html__( 'Background Color Shadown', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(255, 64, 64, 0.1)',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .inner-testimonial::before' => 'background-color: {{VALUE}}',	
						'{{WRAPPER}} .tf-testimonial-carousel-type-group ..inner-testimonial::after' => 'background-color: {{VALUE}}',				
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
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote svg ' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote svg' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote svg g rect' => 'fill: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'icon_left',
				[
					'label' => esc_html__( 'Left Icon 1', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -150,
							'max' => 150,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => -0.5,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_top',
				[
					'label' => esc_html__( 'Top Icon 1', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -150,
							'max' => 150,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => -7,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote ' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_2_left',
				[
					'label' => esc_html__( 'Left Icon 2', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -150,
							'max' => 150,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 103,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote.icon-2' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_2_top',
				[
					'label' => esc_html__( 'Top Icon 2', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -150,
							'max' => 150,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 66,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote.icon-2 ' => 'top: {{SIZE}}{{UNIT}};',
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
				                'size' => '18',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .name',
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .name' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);

			$this->add_control(
				'name_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '11',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_reviews',
				[
					'label' => esc_html__( 'Reviews', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'reviews_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .reviews',
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'reviews_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777777',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .reviews' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
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
				                'size' => '18',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .description',
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777777',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .description' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);

			$this->add_control(
				'padding_title',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '27',
						'right' => '0',
						'bottom' => '15',
						'left' => '44',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_rating',
				[
					'label' => esc_html__( 'Rating', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'rating_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#FCC65D',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-1 .testimonial-star-rating' => 'color: {{VALUE}}',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);
			$this->add_control(
				'rating',
				[
					'label' => esc_html__( 'Rating', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '100',
					'options' => [
						'0'   => esc_html__( '0 stars', 'bixos' ),
						'20'  => esc_html__( '1 star', 'bixos' ),
						'40'  => esc_html__( '2 stars', 'bixos' ),
						'60'  => esc_html__( '3 stars', 'bixos' ),
						'80'  => esc_html__( '4 stars', 'bixos' ),
						'100' => esc_html__( '5 stars', 'bixos' ),
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group.style-1 .testimonial-star-rating span' => 'width: {{VALUE}}%',
					],
					'condition' => [
						'testimonial_style' => 'style-1'
					],
				]
			);

			$this->add_control(
				'padding_content',
				[
					'label' => esc_html__( 'Padding Item', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '43',
						'right' => '90',
						'bottom' => '43',
						'left' => '52',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .item-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);



	        $this->end_controls_section();
        // /.End Style

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
						'size' => 17,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'size' => 60,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
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
						'size' => 60,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'color: {{VALUE}}',
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
		                'default' => '#ff4040',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next',
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
		                    '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
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
		                'default' => '#222429',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled',
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
		                    '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                    '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

	       		$this->end_controls_tab();

	        $this->end_controls_tabs();
			
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
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0.5,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
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
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => -6.5,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
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
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot' => 'margin: 0 {{SIZE}}{{UNIT}};',
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
							'size' => 10,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
					'default' => '#E8E8E8',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot',						
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
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'size' => 10,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',
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
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot.active, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot:hover' => 'transform: scale({{SIZE}});',
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
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot.active',
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
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel-type-group .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		
		$icon_quote = \Elementor\Addon_Elementor_Icon_manager_Bixos::render_icon( $settings['icon_quote'], [ 'aria-hidden' => 'true' ] );
		$icon_quote_2 = \Elementor\Addon_Elementor_Icon_manager_Bixos::render_icon( $settings['icon_quote_2'], [ 'aria-hidden' => 'true' ] );

		?>
		<div class="tf-testimonial-carousel-type-group <?php echo esc_attr($settings['testimonial_style']) ?> <?php echo esc_attr($carousel_arrow); ?>" data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>"  data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">
			<?php if ($settings['testimonial_style'] == 'style-1'): ?>
				<div class="wrap-testimonial">
					<div class="inner-testimonial">
						<div class="bg-overlay"></div>
								
						<div class="owl-carousel owl-theme testimonial">
							<?php foreach ($settings['carousel_list'] as $carousel): ?>			
							<div class="item">
								<div class="item-testimonial">							
									<div class="info">
										<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
										<div class="rating">
											<span class="testimonial-star-rating"><span></span></span>
											<span class="reviews"><?php echo esc_attr($carousel['reviews']); ?></span>
										</div>
									</div>
									<div class="description">
									<?php if ($icon_quote): ?>
										<div class="icon-quote"><?php echo sprintf($icon_quote); ?></div>
									<?php endif; ?>	
									<?php echo sprintf( '%1$s', $carousel['description'] ); ?>
									<?php if ($icon_quote_2): ?>
										<div class="icon-quote icon-2"><?php echo sprintf($icon_quote_2); ?></div>
									<?php endif; ?>
									</div>
								</div>			
							</div>				
							<?php endforeach;?>
						</div>
					</div>
							
					<div class="owl-carousel owl-theme thumbs">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>
					    <div class="image-thumbs">
					    	<?php if ($carousel['image']['id']): ?>
								<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['image']['id'], 'thumbnail_image', $settings )); ?>" alt="image">
							<?php else: ?>
								<img src="<?php echo esc_attr($carousel['image']['url']); ?>" alt="image">
							<?php endif ?>
					    </div>
					    <?php endforeach;?>
					</div>
				</div>	
			<?php endif; ?>		
		</div>
		<?php	
	}

}