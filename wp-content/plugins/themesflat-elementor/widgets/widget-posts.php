<?php
class TFPosts_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfposts';
    }
    
    public function get_title() {
        return esc_html__( 'TF Posts', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-posts'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-posts'];
	}

	protected function register_controls() {
        // Start Posts Query        
			$this->start_controls_section( 
				'section_posts_query',
	            [
	                'label' => esc_html__('Query', 'bixos'),
	            ]
	        );	

			$this->add_control( 
				'posts_per_page',
	            [
	                'label' => esc_html__( 'Posts Per Page', 'bixos' ),
	                'type' => \Elementor\Controls_Manager::NUMBER,
	                'default' => '3',
	            ]
	        );

	        $this->add_control( 
	        	'order_by',
				[
					'label' => esc_html__( 'Order By', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'date',
					'options' => [						
			            'date' => 'Date',
			            'ID' => 'Post ID',			            
			            'title' => 'Title',
					],
				]
			);

			$this->add_control( 
				'order',
				[
					'label' => esc_html__( 'Order', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [						
			            'desc' => 'Descending',
			            'asc' => 'Ascending',	
					],
				]
			);

			$this->add_control( 
				'posts_categories',
				[
					'label' => esc_html__( 'Categories', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT2,
					'options' => ThemesFlat_Addon_For_Elementor_Bixos::tf_get_taxonomies(),
					'label_block' => true,
	                'multiple' => true,
				]
			);

			$this->add_control( 
				'exclude',
				[
					'label' => esc_html__( 'Exclude', 'bixos' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'bixos' ),
					'default' => '',
					'label_block' => true,				
				]
			);

			$this->end_controls_section();
        // /.End Posts Query

		// Start Layout        
			$this->start_controls_section( 
				'section_posts_layout',
	            [
	                'label' => esc_html__('Layout', 'bixos'),
	            ]
	        );	

	        $this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Layout Style', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'bixos' ),
						'style2' => esc_html__( 'Style 2', 'bixos' ),
					],
				]
			);	

	        $this->add_control( 
	        	'posts_layout',
				[
					'label' => esc_html__( 'Columns', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'column-3',
					'options' => [
						'column-1' => esc_html__( '1', 'bixos' ),
						'column-2' => esc_html__( '2', 'bixos' ),
						'column-3' => esc_html__( '3', 'bixos' ),
						'column-4' => esc_html__( '4', 'bixos' ),
					],
				]
			);

			$this->add_control( 
	        	'posts_layout_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'tablet-column-2',
					'options' => [
						'tablet-column-1' => esc_html__( '1', 'bixos' ),
						'tablet-column-2' => esc_html__( '2', 'bixos' ),
						'tablet-column-3' => esc_html__( '3', 'bixos' ),
					],
				]
			);

			$this->add_control( 
	        	'posts_layout_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'mobile-column-1',
					'options' => [
						'mobile-column-1' => esc_html__( '1', 'bixos' ),
						'mobile-column-2' => esc_html__( '2', 'bixos' ),
					],
				]
			);

			$this->add_control(
				'layout_align',
				[
					'label' => esc_html__( 'Alignment', 'bixos' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
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
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'bixos' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'heading_image',
				[
					'label' => esc_html__( 'Image', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'full',
				]
			);

			$this->add_control( 
				'heading_content',
				[
					'label' => esc_html__( 'Content', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_control( 
				'show_title',
				[
					'label' => esc_html__( 'Show Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'bixos' ),
					'label_off' => esc_html__( 'Hide', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'show_excerpt',
				[
					'label' => esc_html__( 'Show Excerpt', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'bixos' ),
					'label_off' => esc_html__( 'Hide', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

			$this->add_control( 
				'excerpt_lenght',
				[
					'label' => esc_html__( 'Excerpt Length', 'bixos' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 500,
					'step' => 1,
					'default' => 14,
					'condition' => [
						'show_excerpt' => 'yes'
					],
				]
			);

			$this->add_control( 
				'heading_button',
				[
					'label' => esc_html__( 'Button', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'show_button',
				[
					'label' => esc_html__( 'Show Button', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'bixos' ),
					'label_off' => esc_html__( 'Hide', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'button_text',
				[
					'label' => esc_html__( 'Button Text', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Read More +', 'bixos' ),
					'condition' => [
	                    'show_button'	=> 'yes',
	                ],
				]
			);		

			$this->add_control( 
				'heading_meta',
				[
					'label' => esc_html__( 'Meta', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'show_meta',
				[
					'label' => esc_html__( 'Show Meta', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'bixos' ),
					'label_off' => esc_html__( 'Hide', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);      
			
			$this->add_control(
				'show_pagination',
				[
					'label' => esc_html__( 'Show Pagination', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'bixos' ),
					'label_off' => esc_html__( 'No', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

			$this->end_controls_section();
        // /.End Layout

		// Start Carousel        
			$this->start_controls_section( 
				'section_posts_carousel',
	            [
	                'label' => esc_html__('Carousel', 'bixos'),
	            ]
	        );	

	        $this->add_control( 
				'carousel',
				[
					'label' => esc_html__( 'Carousel', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'bixos' ),
					'label_off' => esc_html__( 'Off', 'bixos' ),
					'return_value' => 'yes',
					'default' => 'no',
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
					'condition' => [
						'carousel' => 'yes',
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
					'default' => 'yes',
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_desk',
				[
					'label' => esc_html__( 'Columns Desktop', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '3',
					'options' => [
						'1' => esc_html__( '1', 'bixos' ),
						'2' => esc_html__( '2', 'bixos' ),
						'3' => esc_html__( '3', 'bixos' ),
						'4' => esc_html__( '4', 'bixos' ),
						'5' => esc_html__( '5', 'bixos' ),
						'6' => esc_html__( '6', 'bixos' ),
					],
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '2',
					'options' => [
						'1' => esc_html__( '1', 'bixos' ),
						'2' => esc_html__( '2', 'bixos' ),
						'3' => esc_html__( '3', 'bixos' ),
					],
					'condition' => [
						'carousel' => 'yes',
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
					],
					'condition' => [
						'carousel' => 'yes',
					],
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
					'condition' => [
						'carousel' => 'yes',
					],
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'bixos' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fas fa-arrow-left',
	                'include' => [
						'fas fa-angle-double-left',
						'fas fa-angle-left',
						'fas fa-chevron-left',
						'fas fa-arrow-left',
					],  
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'bixos' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fas fa-arrow-right',
	                'include' => [
						'fas fa-angle-double-right',
						'fas fa-angle-right',
						'fas fa-chevron-right',
						'fas fa-arrow-right',
					], 
	                'condition' => [
	                	'carousel' => 'yes',
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
						'size' => 21,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
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
						'size' => 72,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
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
						'size' => 72,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);	

			$this->add_responsive_control( 
				'carousel_arrow_width',
				[
					'label' => esc_html__( 'Width Wrap Nav', 'bixos' ),
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
						'unit' => 'px',
						'size' => 176,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position',
				[
					'label' => esc_html__( 'Horizontal Position', 'bixos' ),
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
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
						'.rtl {{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'left: {{SIZE}}{{UNIT}};right: unset;',
					],
					'condition' => [
						'carousel' => 'yes',
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
						'unit' => 'px',
						'size' => -50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_arrow_tabs',
				[
					'condition' => [
		                'carousel_arrow' => 'yes',
		                'carousel' => 'yes',
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
		                'default' => '#1F242C',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
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
		                'default' => '',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next',
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
							'top' => '0',
							'right' => '0',
							'bottom' => '0',
							'left' => '0',
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		                'default' => '#57B33E',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
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
		                'default' => '',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_arrow_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius Previous', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
	       	$this->end_controls_tab();
	        $this->end_controls_tabs();

			$this->add_control( 
				'carousel_bullets',
	            [
	                'label'         => esc_html__( 'Bullets', 'bixos' ),
	                'type'          => \Elementor\Controls_Manager::SWITCHER,
	                'label_on'      => esc_html__( 'Show', 'bixos' ),
	                'label_off'     => esc_html__( 'Hide', 'bixos' ),
	                'return_value'  => 'yes',
	                'default'       => 'no',
	                'condition' => [
						'carousel' => 'yes',
	                ],
	                'separator' => 'before',
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
							'size' => 15,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'carousel' => 'yes',
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
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
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
						'{{WRAPPER}} .tf-posts .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
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
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_bullets_tabs',
					[
						'condition' => [
							'carousel' => 'yes',
		                    'carousel_bullets' => 'yes',
		                ]
					] );
				$this->start_controls_tab( 
					'carousel_bullets_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);
				$this->add_control( 
					'carousel_bullets_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#e8e8e9',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-posts .owl-dots .owl-dot',
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
							'top' => '0',
							'right' => '0',
							'bottom' => '0',
							'left' => '0',
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'label' => esc_html__( 'Hover', 'bixos' ),
				]
				); 
	        	$this->add_control( 
	        		'carousel_bullets_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#57B33E',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-posts .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts .owl-dots .owl-dot.active',
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
		                    '{{WRAPPER}} .tf-posts .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );
				$this->end_controls_tab();
		    $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Carousel	

        // Start General Style 
	        $this->start_controls_section( 
	        	'section_style_general',
	            [
	                'label' => esc_html__( 'General', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_responsive_control( 
	        	'padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'default' => [
						'top' => '15',
						'right' => '15',
						'bottom' => '15',
						'left' => '15',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],					
				]
			);	

			$this->add_responsive_control( 
				'margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'allowed_dimensions' => [ 'right', 'left' ],
					'default' => [
						'right' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-posts .blog-post',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-posts .blog-post',
				]
			);    

			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_control( 
				'background_color',
				[
					'label' => esc_html__( 'Background Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post' => 'background-color: {{VALUE}}',
					],
				]
			);  
	        
	        $this->end_controls_section();    
	    // /.End General Style

	    // Start Image Style 
	        $this->start_controls_section( 
	        	'section_style_image',
	            [
	                'label' => esc_html__( 'Image', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	        

	        $this->add_responsive_control( 
	        	'padding_image',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .featured-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);	

			$this->add_responsive_control( 
				'margin_image',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],	
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '22',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],			
					'selectors' => [
						'{{WRAPPER}} .tf-posts .featured-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_image',
					'label' => esc_html__( 'Box Shadow', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-posts .featured-post',
				]
			); 

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_image',
					'label' => esc_html__( 'Border', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-posts .featured-post',
				]
			); 

			$this->add_responsive_control( 
				'border_radius_image',
				[
					'label' => esc_html__( 'Border Radius', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .featured-post, {{WRAPPER}} .tf-posts .featured-post img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_control( 
				'overlay_bgcolor',
				[
					'label' => esc_html__( 'Overlay Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff404033',
					'selectors' => [
						'{{WRAPPER}} .tf-posts.style1 .blog-post .featured-post::before' => 'background-color: {{VALUE}}',
					],
				]
			);       
		        
	        $this->end_controls_section();    
	    // /.End Image Style

	    // Start Content Style 
		    $this->start_controls_section( 
		    	'section_style_content',
	            [
	                'label' => esc_html__( 'Content', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	

	        $this->add_responsive_control( 
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		    $this->end_controls_section();
	    // /.End Content Style

        // Start Title Style 
		    $this->start_controls_section( 
		    	'section_style_title',
	            [
	                'label' => esc_html__( 'Title', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_title' => 'yes'
					],
	            ]
	        );	

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_s1_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '24',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '34',
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
					'selector' => '{{WRAPPER}} .tf-posts.style1 .blog-post .title',
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_s2_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '22',
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
					'selector' => '{{WRAPPER}} .tf-posts.style2 .blog-post .title',
					'condition' => [
						'style' => 'style2',
					],
				]
			);



			$this->add_responsive_control( 
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'title_tabs' );				

				$this->start_controls_tab( 
					'title_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

					$this->add_control( 
						'title_color',
						[
							'label' => esc_html__( 'Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .tf-posts .blog-post .title a' => 'color: {{VALUE}}',
							],
						]
					);


			
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'title_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'bixos' ),
					]
				);	
					$this->add_control( 
						'title_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ff4040',
							'selectors' => [
								'{{WRAPPER}} .tf-posts .blog-post .title a:hover' => 'color: {{VALUE}}',
							],
						]
					);	
				$this->end_controls_tab();

			$this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Title Style

	    // Start Excerpt Style 
		    $this->start_controls_section( 
		    	'section_style_text',
	            [
	                'label' => esc_html__( 'Excerpt', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_excerpt' => 'yes'
					],
	            ]
	        );

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-posts .blog-post .content-post',
				]
			);

			$this->add_responsive_control( 
				'text_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .content-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'text_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777777',
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .content-post' => 'color: {{VALUE}}',
					],
				]
			);

		    $this->end_controls_section();
	    // /.End Excerpt Style

	    // Start Button Style 
		    $this->start_controls_section( 
		    	'section_style_button',
	            [
	                'label' => esc_html__( 'Button', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	                'condition' => [
	                    'show_button'	=> 'yes',
	                ],
	            ]
	        );

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_s1_typography',
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
					'selector' => '{{WRAPPER}} .tf-posts.style1 .blog-post .tf-button',
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->start_controls_tabs( 'button_tabs' );				

				$this->start_controls_tab( 
					'button_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

					$this->add_control( 
						'button_color',
						[
							'label' => esc_html__( 'Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#777777',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style1 .blog-post .tf-button' => 'color: {{VALUE}}',
							],
						]
					);
			
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'button_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'bixos' ),
					]
				);

				$this->add_control( 
					'button_color_hover',
					[
						'label' => esc_html__( 'Color Hover', 'bixos' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '#ff4040',
						'selectors' => [
							'{{WRAPPER}} .tf-posts.style1 .blog-post:hover .tf-button' => 'color: {{VALUE}}',
						],
					]
				);		
				$this->end_controls_tabs();
			$this->end_controls_tab();

		    $this->end_controls_section();
	    // /.End Button Style

		// Start Meta Style 
		    $this->start_controls_section( 
		    	'section_style_meta',
	            [
	                'label' => esc_html__( 'Meta', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_meta' => 'yes'
					],
	            ]
	        );	

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_s1_typography',
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
					'selector' => '{{WRAPPER}} .tf-posts.style1 .post-meta a',
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_responsive_control( 
				'margin_meta',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],	
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '8',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],			
					'selectors' => [
						'{{WRAPPER}} .tf-posts .post-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);  

			$this->add_control( 
				'meta_icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-posts.style1 .post-meta i' => 'color: {{VALUE}}',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_s2_typography',
					'label' => esc_html__( 'Typography Meta Category', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Jost',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '16',
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
					'selector' => '{{WRAPPER}} .tf-posts.style2 .post-meta.category a',
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_s3_typography',
					'label' => esc_html__( 'Typography Meta', 'bixos' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Open Sans',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '16',
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
					'selector' => '{{WRAPPER}} .tf-posts.style2 .post-meta a',
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->start_controls_tabs( 'meta_tabs' );				

				$this->start_controls_tab( 
					'meta_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

					$this->add_control( 
						'meta_color',
						[
							'label' => esc_html__( 'Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#777777',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style1 .post-meta a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-posts.style2 .post-meta a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-posts.style2 .post-meta i' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'meta_category_color',
						[
							'label' => esc_html__( 'Category Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style2 .post-meta.category a' => 'color: {{VALUE}}',
							],
							'condition' => [
								'style' => 'style2',
							],
						]
					);
					$this->add_control( 
						'meta_category_bg_color',
						[
							'label' => esc_html__( 'Category Background Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ff4040',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style2 .post-meta.category a' => 'background-color: {{VALUE}}',
							],
							'condition' => [
								'style' => 'style2',
							],
						]
					);
			
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'meta_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'bixos' ),
					]
				);

					$this->add_control( 
						'meta_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ff4040',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style1 .post-meta a:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-posts.style2 .post-meta a:hover' => 'color: {{VALUE}}',
							],
						]
					);		

					$this->add_control( 
						'meta_category_color_hover',
						[
							'label' => esc_html__( 'Category Color Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style2 .post-meta.category a:hover' => 'color: {{VALUE}}',
							],
							'condition' => [
								'style' => 'style2',
							],
						]
					);
					$this->add_control( 
						'meta_category_bg_color_hover',
						[
							'label' => esc_html__( 'Category Background Color Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ff4040',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style2 .post-meta.category a:hover' => 'background-color: {{VALUE}}',
							],
							'condition' => [
								'style' => 'style2',
							],
						]
					);
		
				$this->end_controls_tab();

			$this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Meta Style
		// Start Meta Day Style 
			$this->start_controls_section( 
				'section_style_meta_day',
				[
					'label' => esc_html__( 'Meta Day', 'bixos' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_meta' => 'yes',
						'style' => 'style1',
					],
				]
			);	

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_day_s1_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
						'typography' => ['default' => 'yes'],
						'font_family' => [
							'default' => 'Jost',
						],
						'font_size' => [
							'default' => [
								'unit' => 'px',
								'size' => '12',
							],
						],
						'font_weight' => [
							'default' => '600',
						],
						'line_height' => [
							'default' => [
								'unit' => 'px',
								'size' => '20',
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
					'selector' => '{{WRAPPER}} .tf-posts.style1 .post-day a',
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->start_controls_tabs( 'meta_day_tabs' );				

				$this->start_controls_tab( 
					'meta_day_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

					$this->add_control( 
						'meta_day_color',
						[
							'label' => esc_html__( 'Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style1 .post-day a' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_control( 
						'meta_day_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#222429',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style1 .post-day a' => 'background: {{VALUE}}',
								'{{WRAPPER}} .tf-posts.style1 .post-day a:before' => 'border-top-color: {{VALUE}}',
							],
						]
					);

					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'meta_day_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'bixos' ),
					]
				);

					$this->add_control( 
						'meta_day_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style1 .blog-post:hover .post-day a' => 'color: {{VALUE}}',
							],
						]
					);		

					$this->add_control( 
						'meta_day_bg_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ff4040',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style1 .blog-post:hover .post-day a' => 'background: {{VALUE}}',
								'{{WRAPPER}} .tf-posts.style1 .blog-post:hover .post-day a:before' => 'border-top-color: {{VALUE}}',
							],
						]
					);
		
				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();
		// /.End Meta Day Style
		// Start Meta Authour Infor Style 
			$this->start_controls_section( 
				'section_style_meta_authour',
				[
					'label' => esc_html__( 'Meta Authour Infor', 'bixos' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_meta' => 'yes',
						'style' => 'style2',
					],
				]
			);	

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_authour_s1_typography',
					'label' => esc_html__( 'Typography Name', 'bixos' ),
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
								'size' => '20',
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
					'selector' => '{{WRAPPER}} .tf-posts.style2 .post-author .post-meta-content a',
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_authour_s2_typography',
					'label' => esc_html__( 'Typography Position', 'bixos' ),
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
							'default' => '500',
						],
						'line_height' => [
							'default' => [
								'unit' => 'px',
								'size' => '20',
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
					'selector' => '{{WRAPPER}} .tf-posts.style2 .post-author .post-meta-content div',
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->start_controls_tabs( 'meta_authour_tabs' );				

				$this->start_controls_tab( 
					'meta_authour_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

					$this->add_control( 
						'meta_authour_color',
						[
							'label' => esc_html__( 'Color Name', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style2 .post-author .post-meta-content a' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'meta_authour_color_s2',
						[
							'label' => esc_html__( 'Color Position', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#666666',
							'selectors' => [
								'{{WRAPPER}} .tf-posts.style2 .post-author .post-meta-content div' => 'color: {{VALUE}}',
							],
						]
					);

					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'meta_authour_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'bixos' ),
					]
				);

				$this->add_control( 
					'meta_authour_color_hover',
					[
						'label' => esc_html__( 'Color Name', 'bixos' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .tf-posts.style2 .post-author .post-meta-content a' => 'color: {{VALUE}}',
						],
					]
				);

		
				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();
		// /.End Meta Authour Infor Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$has_carousel = 'no-carousel';
		if ( $settings['carousel'] == 'yes' ) {
			$has_carousel = 'has-carousel';
		}

		$this->add_render_attribute( 'tf_posts', ['id' => "tf-posts-{$this->get_id()}", 'class' => ['tf-posts', $settings['style'], $settings['posts_layout'], $settings['posts_layout_tablet'], $settings['posts_layout_mobile'], $has_carousel ], 'data-tabid' => $this->get_id()] );

		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );
        if (! empty( $settings['posts_categories'] )) {
        	$query_args['category_name'] = implode(',', $settings['posts_categories']);
        }        
        if ( ! empty( $settings['exclude'] ) ) {				
			if ( ! is_array( $settings['exclude'] ) )
				$exclude = explode( ',', $settings['exclude'] );

			$query_args['post__not_in'] = $exclude;
		}
		$query_args['orderby'] = $settings['order_by'];
		$query_args['order'] = $settings['order'];	
		
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
			<div <?php echo $this->get_render_attribute_string('tf_posts'); ?> data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>" >
				<?php if ( $settings['carousel'] == 'yes' ): ?>
				<div class="owl-carousel">
				<?php endif; ?>
					<?php while ( $query->have_posts() ) : $query->the_post();
						$get_id_post_thumbnail = get_post_thumbnail_id();
						$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); 
						?>						
						<div class="item">
							<div class="entry blog-post">
								<?php if ( $settings['style'] == 'style1' ): ?>								
									<div class="featured-post">
										<a href="<?php echo esc_url( get_permalink() ) ?>">
											<?php echo sprintf('%s',$featured_image); ?>
										</a>
									</div>
								<?php else: ?>
									<div class="bg-overlay"></div>
									<div class="featured-post" style="background-image:url(<?php echo esc_attr(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); ?>)"></div>
								<?php endif; ?>

									

								
								<div class="content">
									<?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style2' ): ?>								
										<div class="post-meta category">
											<span class="post-meta-item"><?php echo get_the_category_list(', '); ?></span>
										</div>													
									<?php endif; ?>

									<?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style1' ): ?>
										<div class="post-meta">
											<span class="post-day">
												<?php
												$archive_year  = get_the_time('Y'); 
												$archive_month = get_the_time('m'); 
												$archive_day   = get_the_time('d');
												?>
												<a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
											</span>
											<span class="post-author">
												<i class=" bixos-icon-admin" aria-hidden="true"></i>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
											</span>
											<div class="post-comment">
												<i class="bixos-icon-comment" aria-hidden="true"></i>
												<?php echo comments_popup_link( esc_html__( '0 Comments ', 'tf-addon-for-elementer' ), esc_html__(  '1 Comment', 'tf-addon-for-elementer' ), esc_html__( '% Comments', 'tf-addon-for-elementer' ) ); ?>
											</div>
										</div>										
									<?php endif; ?>	

									<?php if ( $settings['show_title'] == 'yes' ): ?>
										<h2 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h2>
									<?php endif; ?>
													
									
									<?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style2' ): ?>								
										<div class="post-meta">
											<span class="post-day">
												<i class="far fa-calendar-alt"></i>
												<?php
												$archive_year  = get_the_time('Y'); 
												$archive_month = get_the_time('m'); 
												$archive_day   = get_the_time('d');
												?>
												<a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
											</span>
											<div class="post-comment">
												<i class="far fa-comment"></i>
												<?php echo comments_popup_link( esc_html__( '0 Comments ', 'tf-addon-for-elementer' ), esc_html__(  '1 Comment', 'tf-addon-for-elementer' ), esc_html__( '% Comments', 'tf-addon-for-elementer' ) ); ?>
											</div>
										</div>													
									<?php endif; ?>

									<?php if ( $settings['show_excerpt'] == 'yes' ): ?>
										<div class="content-post"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
									<?php endif; ?>
									
									<?php if ( $settings['show_button'] == 'yes' && $settings['button_text'] != '' ): ?>
										<div class="tf-button-container">
											<a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button"><?php echo esc_attr( $settings['button_text'] ); ?></a>
										</div>
									<?php endif; ?>	
									
									<?php if ( $settings['show_meta'] == 'yes' && $settings['style'] == 'style2' ): ?>								
										<div class="post-author">
											<div class="post-meta-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 55 ); ?></div>
											<div class="post-meta-content"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
											<div><?php 
											echo get_the_author_meta( 'description' );
											?></div>
											</div>
										</div>													
									<?php endif; ?>
								</div>						
							</div>
						</div>						
					<?php endwhile; ?>
					<?php
					$pagenum_link = html_entity_decode(get_pagenum_link());
					$query_args = array();
					$url_parts = explode('?', $pagenum_link);
					if (isset($url_parts[1])) {
						wp_parse_str($url_parts[1], $query_args);
					}
					$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
					$pagenum_link = trailingslashit($pagenum_link) . '%_%';

					$numeric_links = paginate_links(array(
						'base' => $pagenum_link,
						'total' => $query->max_num_pages,
						'current' => $paged,
						'mid_size' => 1,
						'add_args' => array_map('urlencode', $query_args),
						'prev_next' => true,
						'prev_text' => ('Prev +'),
						'next_text' => ('Next +'),
					));
					?>
				<?php if ( $settings['carousel'] == 'yes' ): ?>
				</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<?php 
				if ($settings['show_pagination'] == 'yes'):
				?>
			
				<nav class="navigation paging-navigation numeric <?php echo esc_attr($themesflat_paging_for); ?>"
					role="navigation">
					<div class="pagination loop-pagination">
						<?php echo wp_kses($numeric_links, themesflat_kses_allowed_html()) ?>
					</div>
				</nav>
			<?php endif; ?>
		<?php
		else:
			esc_html_e('No posts found', 'bixos');
		endif;		
		
	}

	

	

}