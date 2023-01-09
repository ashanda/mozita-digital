<?php
class TFHeading_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-heading';
    }
    
    public function get_title() {
        return esc_html__( 'TF Heading', 'bixos' );
    }
    
	public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	public function get_style_depends() {
		return ['tf-heading'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Setting', 'bixos'),
	            ]
	        );

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'bixos' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Our Success [JOURNEY] We Can Provide.' ),
					'label_block' => true,
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
					'name' => 'typography_description',
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
				                'unit' => 'em',
				                'size' => '1.5',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-heading .description',
				]
			); 

			$this->add_control( 
				'color_description',
				[
					'label' => esc_html__( 'Color Text Fisrt & Last', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#222429',
					'selectors' => [
						'{{WRAPPER}} .tf-heading .description' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_link',
					'label' => esc_html__( 'Typography link', 'bixos' ),
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
				                'unit' => 'em',
				                'size' => '1.5',
				            ],
				        ],
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-heading .description a',
				]
			);
			
			$this->add_control( 
				'color_link',
				[
					'label' => esc_html__( 'Color Link', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-heading .description a' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'padding_description',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '50',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => 'false',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-heading .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$description = '<div class="description">'.$settings['description'].'</div>';

		$inner = sprintf( '<div class="tf-heading">
							%1$s	
							</div>', $description);

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_heading'),
            $inner
        );	
	}

}