<?php
class TFCounter_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-counter';
    }
    
    public function get_title() {
        return esc_html__( 'TF Counter', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-counter'];
	}

    public function get_script_depends() {
		return [ 'elementor-waypoints', 'jquery-numerator', 'tf-counter' ];
	}

	protected function register_controls() {
		// Start Counter        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Counter', 'bixos'),
	            ]
	        );

	        $this->add_control(
				'style',
				[
					'label' => esc_html__( 'Style', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'default'  => esc_html__( 'Default', 'bixos' ),
						'style1'  => esc_html__( 'Style 1', 'bixos' ),
						'style2' => esc_html__( 'Style 2', 'bixos' ),
						'style3' => esc_html__( 'Style 3', 'bixos' ),
					],
				]
			);

	        $this->add_control(
				'starting_number',
				[
					'label' => esc_html__( 'Starting Number', 'bixos' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 0,
				]
			);

			$this->add_control(
				'ending_number',
				[
					'label' => esc_html__( 'Ending Number', 'bixos' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 12,
				]
			);

			$this->add_control(
				'prefix',
				[
					'label' => esc_html__( 'Number Prefix', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '+',
					'placeholder' => 1,
				]
			);

			$this->add_control(
				'suffix',
				[
					'label' => esc_html__( 'Number Suffix', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'K',
					'placeholder' => esc_html__( 'Plus', 'bixos' ),
				]
			);

			$this->add_control(
				'duration',
				[
					'label' => esc_html__( 'Animation Duration', 'bixos' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 2000,
					'min' => 100,
					'step' => 100,
				]
			);

			$this->add_control(
				'thousand_separator_char',
				[
					'label' => esc_html__( 'Separator', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'' => 'Default',
						',' => 'Commas',
						'.' => 'Dot',
						' ' => 'Space',
					],
					'default' => '',
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Our Active Member', 'bixos' ),
					'condition' => [
						'style' => 'style1',
						'style' => 'style3',
					],
				]
			);
	        
			$this->end_controls_section();
        // /.End Counter  

        // Start General
	        $this->start_controls_section( 'section_style_general',
	            [
	                'label' => esc_html__( 'General', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 

	        $this->add_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'bixos' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'bixos' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'bixos' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'bixos' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .tf-counter' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-counter',
				]
			);


			$this->add_responsive_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .tf-counter.default::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'counter_tabs' );				

				$this->start_controls_tab( 
					'counter_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

				$this->add_responsive_control(
					'counter_width',
					[
						'label' => esc_html__( 'Counter Width', 'bixos' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px','%' ],
						'range' => [
							'px' => [
								'min' => 5,
								'max' => 350,
								'step' => 1,
							],
						],
						'default' => [
							'size' => 140,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-counter.default' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'style' => 'default',
						],
					]
				);
	
				$this->add_responsive_control(
					'counter_height',
					[
						'label' => esc_html__( 'Counter Height', 'bixos' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px','%' ],
						'range' => [
							'px' => [
								'min' => 5,
								'max' => 350,
								'step' => 1,
							],
						],
						'default' => [
							'size' => 140,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-counter.default' => ' height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'style' => 'default',
						],
					]
				);
				$this->add_control(
					'counter_bg_color',
					[
						'label' => esc_html__( 'Counter Background Color', 'bixos' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '#ff4040',
						'selectors' => [
							'{{WRAPPER}} .tf-counter.default ' => 'background-color: {{VALUE}};',
						],
						'condition' => [
							'style' => 'default',
						],
					]
				);
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'counter_border_tab',
					[
						'label' => esc_html__( 'Border', 'bixos' ),
					]
				);
				$this->add_responsive_control(
					'counter_border_width',
					[
						'label' => esc_html__( 'Counter Boder Width', 'bixos' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px','%' ],
						'range' => [
							'%' => [
								'min' => 5,
								'max' => 350,
								'step' => 1,
							],
						],
						'default' => [
							'size' => 100,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-counter.default::after' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'style' => 'default',
						],
					]
				);
	
				$this->add_responsive_control(
					'counter_border_height',
					[
						'label' => esc_html__( 'Counter Boder Height', 'bixos' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px','%' ],
						'range' => [
							'%' => [
								'min' => 5,
								'max' => 350,
								'step' => 1,
							],
						],
						'default' => [
							'size' => 93,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-counter.default::after' => ' height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'style' => 'default',
						],
					]
				);
				$this->add_control(
					'counter_border_color',
					[
						'label' => esc_html__( 'Counter Border Color', 'bixos' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => 'rgba(255, 255, 255, 0.3)',
						'selectors' => [
							'{{WRAPPER}} .tf-counter.default::after ' => 'border-color: {{VALUE}};',
						],
						'condition' => [
							'style' => 'default',
						],
					]
				);
	
				$this->end_controls_tabs();
			$this->end_controls_tab();



			$this->add_responsive_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '',
						'right' => '0',
						'bottom' => '52',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	      	$this->end_controls_section(); 
	    // /.End General 

        // Start Style Number
	        $this->start_controls_section( 'section_style_number',
	            [
	                'label' => esc_html__( 'Number', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'number_color',
				[
					'label' => esc_html__( 'Text Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#222429',
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'color: {{VALUE}};',
					],
				]
			);

	        $this->add_control(
				'number_circle',
				[
					'label' => esc_html__( 'Circle Size', 'bixos' ),
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
						'size' => 15,
					],
					
					'selectors' => [
						'{{WRAPPER}} .tf-counter.style1 .counter-number-wrapper::after' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_control(
				'number_circle_right',
				[
					'label' => esc_html__( 'Circle Right', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => -100,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'size' => -6,
					],
					
					'selectors' => [
						'{{WRAPPER}} .tf-counter.style1 .counter-number-wrapper::after' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_control(
				'number_circle_top',
				[
					'label' => esc_html__( 'Circle Top', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => -100,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'size' => -1,
					],
					
					'selectors' => [
						'{{WRAPPER}} .tf-counter.style1 .counter-number-wrapper::after' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);



			$this->add_control(
				'number_circle_color',
				[
					'label' => esc_html__( 'Circle Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-counter.style1 .counter-number-wrapper::after' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_number',
					'fields_options' => [
				        'typography' => ['default' => 'yes'],				        
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '72',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '400',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'em',
				                'size' => '1',
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
					'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'number_shadow',
					'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper',
				]
			);	

			$this->add_responsive_control(
				'margin_number',
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
						'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style Number

        // Start Style Title
	        $this->start_controls_section( 'section_style_title',
	            [
	                'label' => esc_html__( 'Title', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'style' => 'style1',
						'style' => 'style3',
					],
	            ]
	        );

	        $this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Text Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777777',
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-title' => 'color: {{VALUE}};',
					],
					'condition' => [
						'style' => 'style1',
						'style' => 'style3',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_title',
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
				                'unit' => 'em',
				                'size' => '1.6',
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
					'selector' => '{{WRAPPER}} .tf-counter .counter-title',
					'condition' => [
						'style' => 'style1',
						'style' => 'style3',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'title_shadow',
					'selector' => '{{WRAPPER}} .tf-counter .counter-title',
					'condition' => [
						'style' => 'style1',
						'style' => 'style3',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
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
						'{{WRAPPER}} .tf-counter .counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],		
					'condition' => [
						'style' => 'style1',
						'style' => 'style3',
					],			
				]
			);	
			        
        	$this->end_controls_section();    
	    // /.End Style Title
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_counter', ['id' => "tf-counter-{$this->get_id()}", 'class' => ['tf-counter', $settings['style']], 'data-tabid' => $this->get_id()] );	

		$counter_icon = $counter_title = $counter_prefix = $counter_number = $counter_suffix = '';

		if ($settings['prefix']) {
			$counter_prefix = sprintf('<span class="counter-number-prefix">%1$s</span>',$settings['prefix']);
		}
		
		$counter_number = sprintf('<span class="counter-number" data-from_value="%1$s" data-to_value="%2$s" data-duration="%3$s" data-delimiter="%4$s">%1$s</span>',$settings['starting_number'],$settings['ending_number'],$settings['duration'],$settings['thousand_separator_char']);
		

		if ($settings['suffix']) {
			$counter_suffix = sprintf('<span class="counter-number-suffix">%1$s</span>',$settings['suffix']);
		}

		if ($settings['title']) {
			$counter_title = sprintf('<div class="counter-title">%1$s</div>',$settings['title']);
		}

		$content = sprintf( '<div class="wrap-counter">
								<div class="counter-number-wrapper">									
									%1$s
									%2$s
									%3$s
								</div>
								%4$s
							</div>', $counter_prefix,$counter_number,$counter_suffix,$counter_title);

		if ($settings['style'] == "style2") {
			$content = sprintf( '<div class="wrap-counter">
								<div class="wrap-icon-title">
									<div class="counter-number-wrapper">
										%1$s
										%2$s
										%3$s
									</div>
								</div>
							</div>', $counter_prefix,$counter_number,$counter_suffix);
		}

		if ($settings['style'] == "style3") {
			$content = sprintf( '<div class="wrap-counter">
								<div class="counter-number-wrapper">									
									%1$s
									%2$s
									%3$s
								</div>
								%4$s
							</div>', $counter_prefix,$counter_number,$counter_suffix,$counter_title);
		}

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_counter'),
            $content
        );	
		
	}

}