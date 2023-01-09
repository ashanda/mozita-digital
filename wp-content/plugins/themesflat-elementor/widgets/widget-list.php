<?php
class TFList_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list';
    }
    
    public function get_title() {
        return esc_html__( 'TF List', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-list'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'bixos'),
	            ]
	        );

	        $repeater = new \Elementor\Repeater();

	        $repeater->add_control(
				'before_title',
				[
					'label' => esc_html__( 'Before Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '01', 'bixos' ),
					'label_block' => true,
				]
			);

	        $repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'The Best Solution of Wind & Solar', 'bixos' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'List', 'bixos' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'before_title' => esc_html__( '01', 'tf-addon-for-elementer' ),
							'title' => esc_html__( 'The Best Solution of Wind & Solar', 'tf-addon-for-elementer' ),
						],
						[
							'before_title' => esc_html__( '02', 'tf-addon-for-elementer' ),
							'title' => esc_html__( 'Our commitment to sustainability', 'tf-addon-for-elementer' ),
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);
	        
			$this->end_controls_section();
        // /.End List Setting              

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_responsive_control(
				'distance_between',
				[
					'label' => esc_html__( 'Distance Between', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-list .item-list' => 'margin-bottom: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-list .item-list:last-child' => 'margin-bottom: 0;',
					],
				]
			);

	        $this->add_control(
				'h_before_title',
				[
					'label' => esc_html__( 'Before Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_before_title',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '20',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '48',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-list .item-list .before-title',
				]
			); 

			$this->add_control( 
				'color_before_title',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-list .item-list .before-title' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'bg_before_title',
				[
					'label' => esc_html__( 'Backround', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#57B33E',
					'selectors' => [
						'{{WRAPPER}} .tf-list .item-list .before-title' => 'background: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'border_radius_before_title',
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
						'{{WRAPPER}} .tf-list .item-list .before-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'before_title_size',
				[
					'label' => esc_html__( 'Size', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 48,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-list .item-list .before-title' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'before_title_between',
				[
					'label' => esc_html__( 'Distance Between Right', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 17,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-list .item-list .before-title' => 'margin-right: {{SIZE}}{{UNIT}};',
					],
				]
			);

	        $this->add_control(
				'h_title',
				[
					'label' => esc_html__( 'Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);			

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_title',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Rubik',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '20',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '500',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '30',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-list .item-list .title',
				]
			); 

			$this->add_control( 
				'color_title',
				[
					'label' => esc_html__( 'Color Text Fisrt & Last', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#1F242C',
					'selectors' => [
						'{{WRAPPER}} .tf-list .item-list .title' => 'color: {{VALUE}}',					
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
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-list .item-list .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_list', ['id' => "tf-list-{$this->get_id()}", 'class' => ['tf-list'], 'data-tabid' => $this->get_id()] );

		$content = $title = $before_title = '';	

		foreach ( $settings['list'] as $index => $item ) {
			if ($item['before_title'] != '') {
				$before_title = '<span class="before-title"> '.$item['before_title'].' </span>';
			}
			if ($item['title'] != '') {
				$title = '<span class="title">'.$item['title'].'</span>';
			}

			$content .= sprintf( '<div class="item-list">
									%1$s%2$s
								</div>',$before_title, $title );
		}		

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_list'),
            $content
        );	
		
	}

}