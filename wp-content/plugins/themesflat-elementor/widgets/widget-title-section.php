<?php
class TFTitle_Section_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-title-section';
    }
    
    public function get_title() {
        return esc_html__( 'TF Title Section', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-title-section'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Title Section', 'bixos'),
	            ]
	        );	        

			$this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Our Case Study', 'bixos' ),
					'label_block' => true,
				]
			);	
	

			$this->add_control(
				'sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Our Recent [Related] Work', 'bixos' ),
					'label_block' => true,
				]
			);			

			$this->add_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'bixos' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'center',
					'options' => [
						'left'    => [
							'title' => esc_html__( 'Left', 'bixos' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'bixos' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'bixos' ),
							'icon' => 'eicon-text-align-right',
						]
					],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section' => 'text-align: {{VALUE}}',
					],
				]
			);
	        
			$this->end_controls_section();
        // /.End Tab Setting         

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

			$this->add_control(
				'line',
				[
					'label' => esc_html__( 'Line', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'no_line',
					'options' => [
						'no-line'  => esc_html__( 'No Line', 'bixos' ),
						'one-line'  => esc_html__( '1 Line', 'bixos' ),
						'two-line' => esc_html__( '2 Line', 'bixos' ),
					],
				]
			);

	        $this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Heading', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
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
				            'default' => '500',
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
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .heading',
				]
			); 

			$this->add_control( 
				'heading_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777777',
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'color: {{VALUE}}',	
						'{{WRAPPER}} .tf-title-section.one-line .title-section .heading::before' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .tf-title-section.two-line .title-section .heading::before' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .tf-title-section.two-line .title-section .heading::after' => 'background-color: {{VALUE}}',				
					],
				]
			);			

			$this->add_responsive_control(
				'heading_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '16',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'heading_padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_sub_title',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '36',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '52',
				            ],
				        ],
						'text_transform' => [
							'default' => 'uppercase',
						],
				    ],
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .sub-title',
				]
			); 

			$this->add_control( 
				'color_sub_title',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#222429',
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_responsive_control(
				'margin_sub_title',
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
						'{{WRAPPER}} .tf-title-section .title-section .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	
			
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_sub_title_link',
					'label' => esc_html__( 'Typography link', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '36',
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
				    ],
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .sub-title a',
				]
			); 

			$this->add_control( 
				'color_sub_title_link',
				[
					'label' => esc_html__( 'Color link', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .sub-title a' => 'color: {{VALUE}}',					
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_title_section', ['id' => "tf-title-section-{$this->get_id()}",'class' => ['tf-title-section', $settings['line']], 'data-tabid' => $this->get_id()] );

		$animation = ! empty( $settings['hover_animation'] ) ? 'elementor-animation-' . esc_attr( $settings['hover_animation'] . ' inline-block' ) : '';

		$heading = $sub_title = '';		

		if ($settings['heading'] != '') {
			$heading = sprintf( '<h6 class="heading">%1$s</h6>', $settings['heading'] );
		}
		

		if ($settings['sub_title'] != '') {
			$sub_title = sprintf( '<div class="sub-title">%1$s</div>', $settings['sub_title'] );
		}
		
		$content = sprintf( '
			<div class="title-section">
				%1$s
				%2$s
			</div>' , $heading, $sub_title );

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_title_section'),
            $content
        );	
		
	}

}