<?php
class TFPortfolio_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfportfolio';
    }
    
    public function get_title() {
        return esc_html__( 'TF Portfolio', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-portfolio'];
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
	                'default' => '8',
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
				'portfolio_categories',
				[
					'label' => esc_html__( 'Categories', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT2,
					'options' => ThemesFlat_Addon_For_Elementor_Bixos::tf_get_taxonomies('portfolios_category'),
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

			$this->add_control( 
				'sort_by_id',
				[
					'label' => esc_html__( 'Sort By ID', 'bixos' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'bixos' ),
					'default' => '',
					'label_block' => true,				
				]
			);

			$this->end_controls_section();
        // /.End Posts Query
		// Start Layout        
			$this->start_controls_section( 
				'section_portfolio_layout',
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
						'style3' => esc_html__( 'Style 3', 'bixos' ),
					],
				]
			);	

	        $this->add_control( 
	        	'portfolio_layout',
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
	        	'portfolio_layout_tablet',
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
	        	'portfolio_layout_mobile',
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
						'{{WRAPPER}} .tf-portfolio' => 'text-align: {{VALUE}}',
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
				'heading_cat',
				[
					'label' => esc_html__( 'Category', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'show_cat',
				[
					'label' => esc_html__( 'Show Category', 'bixos' ),
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

			$this->add_control( 
				'show_post_count',
				[
					'label' => esc_html__( 'Show Ordinal Number', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'style' => 'style3',
					]
				]
			);


			$this->end_controls_section();
        // /.End Layout

		// Start Carousel        
			$this->start_controls_section( 
				'section_portfolio_carousel',
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
						'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
						'.rtl {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav' => 'left: {{SIZE}}{{UNIT}};right: unset;',
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
						'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next',
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
		                    '{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next:hover',
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
		                    '{{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-portfolio .owl-carousel .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
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
								'size' => 50,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
							'size' => 10,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'carousel' => 'yes',
							'carousel_bullets' => 'yes',
						]
					]
				);
				$this->add_control( 
					'carousel_bullets_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#f6f6f6',
		                'selectors' => [
							'{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot',
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
							'top' => '10',
							'right' => '10',
							'bottom' => '10',
							'left' => '10',
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'size' => '',
							],
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'carousel' => 'yes',
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
							'size' => '',
						],
						'selectors' => [
							'{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'carousel' => 'yes',
							'carousel_bullets' => 'yes',
						]
					]
				);
	        	$this->add_control( 
	        		'carousel_bullets_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'bixos' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ff4040',
		                'selectors' => [
							'{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-portfolio .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
							'{{WRAPPER}} .tf-portfolio.style3 .owl-carousel .owl-dot.active::after' => 'border-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-portfolio .owl-dots .owl-dot.active',
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
		                    '{{WRAPPER}} .tf-portfolio .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-portfolio .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-portfolio' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-portfolio .portfolios-post',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-portfolio .portfolios-post',
				]
			); 


			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio .portfolios-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->start_controls_tabs( 'background_color_overlay_tabs' );				

				$this->start_controls_tab( 
					'background_color_overlay_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'bixos' ),						
					]
				);

					$this->add_control( 
						'background_color_overlay',
						[
							'label' => esc_html__( 'Background Color Overlay', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(0, 0, 0, 0.3)',
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .portfolios-post .featured-post::after' => 'background: {{VALUE}}',
							],
						]
					); 
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'background_color_overlay_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'bixos' ),
					]
				);	
					$this->add_control( 
						'background_color_overlay_hover',
						[
							'label' => esc_html__( 'Background Color Overlay Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255, 64, 64, 0.2)',
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .portfolios-post:hover .featured-post::after' => 'background: {{VALUE}}',
							],
						]
					); 
				
					
				$this->end_controls_tab();

			$this->end_controls_tabs();
	        
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
						'{{WRAPPER}} .tf-portfolio .portfolios-post .featured-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);	

			$this->add_responsive_control( 
				'margin_image',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],				
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio .portfolios-post .featured-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_image',
					'label' => esc_html__( 'Box Shadow', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-portfolio .portfolios-post .featured-post',
				]
			); 

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_image',
					'label' => esc_html__( 'Border', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-portfolio .portfolios-post .featured-post',
				]
			); 

			$this->add_responsive_control( 
				'border_radius_image',
				[
					'label' => esc_html__( 'Border Radius', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio .portfolios-post .featured-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .tf-portfolio .portfolios-post .featured-post img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'top' => '17',
						'right' => '0',
						'bottom' => '5',
						'left' => '28',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio .portfolios-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'background_color_content',
				[
					'label' => esc_html__( 'Background Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio .portfolios-post .content ' => 'background-color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'background_color_content_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio .portfolios-post:hover .content ' => 'background-color: {{VALUE}}',
					],
				]
			); 
			$this->add_responsive_control( 
				'border_radius_content',
				[
					'label' => esc_html__( 'Border Radius', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio .portfolios-post .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				                'size' => '18',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '26',
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
					'selector' => '{{WRAPPER}} .tf-portfolio .portfolios-post .title',
				]
			);

			$this->add_control( 
	        	'show_line_title',
				[
					'label' => esc_html__( 'Show Line', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'yes',
					'options' => [
						'no' => esc_html__( 'No', 'bixos' ),
						'yes' => esc_html__( 'Yes', 'bixos' ),
					],
					'condition' => [
						'style' => 'style3',
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
						'{{WRAPPER}} .tf-portfolio .portfolios-post .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .tf-portfolio .portfolios-post .title a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-portfolio.style3 .portfolios-post .content .title.yes::before' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-portfolio.style3 .portfolios-post .content .title.yes::after' => 'color: {{VALUE}}',
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
								'{{WRAPPER}} .tf-portfolio .portfolios-post .title a:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-portfolio.style3 .portfolios-post .content .title.yes::before' => 'background-color: {{VALUE}}',
							],
						]
					);	
				$this->end_controls_tab();

			$this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Title Style

		
        // Start Count Style 
		$this->start_controls_section( 
			'section_style_Count',
			[
				'label' => esc_html__( 'Count', 'bixos' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style3',
				],
			]
			);	

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'count_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
					'fields_options' => [
						'typography' => ['default' => 'yes'],
						'font_family' => [
							'default' => 'Jost',
						],
						'font_size' => [
							'default' => [
								'unit' => 'px',
								'size' => '120',
							],
						],
						'font_weight' => [
							'default' => '700',
						],
						'line_height' => [
							'default' => [
								'unit' => 'px',
								'size' => '120',
							],
						],
						'text_transform' => [
							'default' => '',
						],
						'letter_spacing' => [
							'default' => [
								'unit' => 'px',
								'size' => '-0.6',
							],
						],
					],
					'selector' => '{{WRAPPER}} .tf-portfolio.style3 .portfolios-post .content .count',
				]
			);

			$this->add_control( 
				'count_color',
				[
					'label' => esc_html__( 'Color', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(0,0,51,0.07)',
					'selectors' => [
						'{{WRAPPER}} .tf-portfolio.style3 .portfolios-post .content .count' => 'color: {{VALUE}}',
					],
				]
			);

			$this->end_controls_section();
		// /.End Count Style

		// Start Meta Style 
		    $this->start_controls_section( 
		    	'section_style_cat',
	            [
	                'label' => esc_html__( 'Meta', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'cat_s1_typography',
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
					'selector' => '{{WRAPPER}} .tf-portfolio.style1 .portfolios-post .content .post-meta a ',
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'cat_s2_typography',
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
					'selector' => '{{WRAPPER}} .tf-portfolio.style2 .portfolios-post .content .post-meta a ',
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'cat_s3_typography',
					'label' => esc_html__( 'Typography', 'bixos' ),
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
				                'size' => '25',
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
					'selector' => '{{WRAPPER}} .tf-portfolio.style3 .portfolios-post .content .post-meta a ',
					'condition' => [
						'style' => 'style3',
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
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .portfolios-post .content .post-meta a' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_control( 
						'meta_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ff4040',
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .portfolios-post .content .post-meta' => 'background: {{VALUE}}',
								'{{WRAPPER}} .tf-portfolio .portfolios-post .content .post-meta:before' => 'border-top-color: {{VALUE}} !important',
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
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .portfolios-post:hover .content .post-meta a' => 'color: {{VALUE}}',
							],
						]
					);		

					$this->add_control( 
						'meta_bg_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'bixos' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ff4040',
							'selectors' => [
								'{{WRAPPER}} .tf-portfolio .portfolios-post:hover .content .post-meta' => 'background: {{VALUE}}',
								'{{WRAPPER}} .tf-portfolio .portfolios-post:hover .content .post-meta:before' => 'border-top-color: {{VALUE}} !important',
							],
						]
					);
		
				$this->end_controls_tab();

			$this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Meta Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$has_carousel = 'no-carousel';
		if ( $settings['carousel'] == 'yes' ) {
			$has_carousel = 'has-carousel';
		}

		$this->add_render_attribute( 'tf_portfolio', ['id' => "tf-portfolio-{$this->get_id()}", 'class' => ['tf-portfolio', $settings['style'], $settings['portfolio_layout'], $settings['portfolio_layout_tablet'], $settings['portfolio_layout_mobile'], $has_carousel ], 'data-tabid' => $this->get_id()] );

		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => 'portfolios',
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );

		if (! empty( $settings['portfolio_categories'] )) {        	
        	$query_args['tax_query'] = array(
							        array(
							            'taxonomy' => 'portfolios_category',
							            'field'    => 'slug',
							            'terms'    => $settings['portfolio_categories']
							        ),
							    );
        } 
      
        if ( ! empty( $settings['exclude'] ) ) {				
			if ( ! is_array( $settings['exclude'] ) )
				$exclude = explode( ',', $settings['exclude'] );

			$query_args['post__not_in'] = $exclude;
		}
		$query_args['orderby'] = $settings['order_by'];
		$query_args['order'] = $settings['order'];	

		$migrated = isset( $settings['__fa4_migrated']['icon_tabs'] );	
		$is_new = empty( $settings['icon_tab'] );

		$count = 1;
		$prefix = 0;
		
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
			<div <?php echo $this->get_render_attribute_string('tf_portfolio'); ?> data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>" >
				<?php if ( $settings['carousel'] == 'yes' ): ?>
				<div class="owl-carousel">
				<?php endif; ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="item">
						<?php if ($settings['style'] == 'style1') : ?>
	                        <div class="portfolios-post portfolio-post-<?php the_ID(); ?>">
	                        	<?php if ( has_post_thumbnail() ): ?>
	                            <div class="featured-post">
	                                <a href="<?php echo get_the_permalink(); ?>">
	                                <?php 
	                                $get_id_post_thumbnail = get_post_thumbnail_id();
									echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
	                                ?>
	                                </a>
	                            </div>
	                        	<?php endif; ?>
	                            <div class="content"> 
									<?php if ( $settings['show_cat'] == 'yes'): ?>								
										<div class="post-meta">
											<?php echo the_terms( get_the_ID(), 'portfolios_category', '', ' , ', '' ); ?>
										</div>
																						
									<?php endif; ?>

									<?php if ( $settings['show_title'] == 'yes' ): ?>
										<h5 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h5>
									<?php endif; ?>
									                          
	                            </div>
	                        </div>
                    	<?php elseif ($settings['style'] == 'style2') : ?>
	                    	<div class="portfolios-post portfolio-post-<?php the_ID(); ?>">
	                        	<?php if ( has_post_thumbnail() ): ?>
	                            <div class="featured-post">
	                                <a href="<?php echo get_the_permalink(); ?>">
	                                <?php 
	                                $get_id_post_thumbnail = get_post_thumbnail_id();
									echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
	                                ?>
	                                </a>
	                            </div>
	                        	<?php endif; ?>
	                            <div class="content"> 
									<?php if ( $settings['show_cat'] == 'yes'): ?>								
										<div class="post-meta">
											<?php echo the_terms( get_the_ID(), 'portfolios_category', '', ' , ', '' ); ?>
										</div>
																						
									<?php endif; ?>

									<?php if ( $settings['show_title'] == 'yes' ): ?>
										<h5 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h5>
									<?php endif; ?>
                          
	                            </div>
	                        </div>

						<?php elseif ($settings['style'] == 'style3') : ?>
	                    	<div class="portfolios-post portfolio-post-<?php the_ID(); ?>">
	                        	<?php if ( has_post_thumbnail() ): ?>
	                            <div class="featured-post">
	                                <a href="<?php echo get_the_permalink(); ?>">
	                                <?php 
	                                $get_id_post_thumbnail = get_post_thumbnail_id();
									echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
	                                ?>
	                                </a>
	                            </div>
	                        	<?php endif; ?>
	                            <div class="content"> 
									<?php if ( $settings['show_title'] == 'yes' ): ?>
										<h5 class="title <?php echo esc_attr($settings['show_line_title']); ?>"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h5>
									<?php endif; ?>

									<?php if ( $settings['show_cat'] == 'yes'): ?>								
										<div class="post-meta">
											<?php echo the_terms( get_the_ID(), 'portfolios_category', '', ' , ', '' ); ?>
										</div>
																						
									<?php endif; ?>

									<?php if ( $settings['show_post_count'] == 'yes' ): ?>
											<?php $count_none_prefix = $count >= 10 ? $count++ : $prefix.$count++;
												$count_post = $settings['posts_per_page'] < 10 ? $prefix.$count++ / 2 : $count_none_prefix; ?>
											<div class="count"><?php echo $count_post; ?></div>
									<?php endif; ?>

									
                          
	                            </div>
	                        </div>
                    	<?php endif; ?>
                    </div> 
				<?php endwhile; ?>
				<?php if ( $settings['carousel'] == 'yes' ): ?>
				</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<?php if ($settings['show_pagination'] == 'yes'):?>
				<?php  themesflat_pagination_posttype($query, 'loadmore'); ?>
			<?php endif; ?>
		<?php
		else:
			esc_html_e('No portfolio found', 'bixos');
		endif;		
		
	}

	

	

}