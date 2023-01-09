<?php
class TFTeam_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-team';
    }
    
    public function get_title() {
        return esc_html__( 'TF Team', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-person';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-team'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Setting', 'bixos'),
	            ]
	        );

	        $this->add_control(
				'style',
				[
					'label' => esc_html__( 'Style', 'bixos' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1'  => esc_html__( 'Style 1', 'bixos' ),
						'style2'  => esc_html__( 'Style 2', 'bixos' ),
					],
				]
			);

	        $this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'bixos' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default-team.jpg",
					],
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
				'title',
				[
					'label' => esc_html__( 'Title', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Subrom Monalisa Era', 'bixos' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'bixos' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Bixos Founder', 'bixos' ),
					'label_block' => true,
				]
			);	
	        
			$this->end_controls_section();
        // /.End Tab Setting         
		
		// Start Social Icons        
			$this->start_controls_section( 'section_social_icon',
	            [
	                'label' => esc_html__('Social Icons', 'bixos'),
	            ]
	        );

	        $repeater = new \Elementor\Repeater();

	        $repeater->add_control(
				'social_icon',
				[
					'label' => esc_html__( 'Icon', 'bixos' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'social',
					'default' => [
						'value' => 'fab fa-wordpress',
						'library' => 'fa-brands',
					],
					'recommended' => [
						'fa-brands' => [
							'android',
							'apple',
							'behance',
							'bitbucket',
							'codepen',
							'delicious',
							'deviantart',
							'digg',
							'dribbble',
							'elementor',
							'facebook',
							'flickr',
							'foursquare',
							'free-code-camp',
							'github',
							'gitlab',
							'globe',
							'houzz',
							'instagram',
							'jsfiddle',
							'linkedin',
							'medium',
							'meetup',
							'mix',
							'mixcloud',
							'odnoklassniki',
							'pinterest',
							'product-hunt',
							'reddit',
							'shopping-cart',
							'skype',
							'slideshare',
							'snapchat',
							'soundcloud',
							'spotify',
							'stack-overflow',
							'steam',
							'telegram',
							'thumb-tack',
							'tripadvisor',
							'tumblr',
							'twitch',
							'twitter',
							'viber',
							'vimeo',
							'vk',
							'weibo',
							'weixin',
							'whatsapp',
							'wordpress',
							'xing',
							'yelp',
							'youtube',
							'500px',
						],
						'fa-solid' => [
							'envelope',
							'link',
							'rss',
						],
					],
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'bixos' ),
					'type' => \Elementor\Controls_Manager::URL,
					'default' => [
					'url' => '#',
						'is_external' => true,
						'nofollow' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'bixos' ),
				]
			);

			$this->add_control(
				'social_icon_list',
				[
					'label' => esc_html__( 'Social Icons', 'bixos' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'social_icon' => [
								'value' => 'fab fa-facebook-f',
								'library' => 'fa-brands',
							],
						],
						[
							'social_icon' => [
								'value' => 'fab fa-instagram',
								'library' => 'fa-brands',
							],
						],
						[
							'social_icon' => [
								'value' => 'fab fa-twitter',
								'library' => 'fa-brands',
							],
						],
						[
							'social_icon' => [
								'value' => 'fab fa-dribbble',
								'library' => 'fa-brands',
							],
						],
					],
					'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
				]
			);
	        
			$this->end_controls_section();
        // /.End Social Icons 

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'bixos' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'style' => 'default',
					],
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
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .tf-team' => 'text-align: {{VALUE}}',					
					],
					'condition' => [
						'style' => 'default',
					],
				]
			);			

	        $this->add_control(
				'h_image',
				[
					'label' => esc_html__( 'Image', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_responsive_control( 
				'image_width',
				[
					'label' => esc_html__( 'Image Width', 'bixos' ),
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
					'selectors' => [
						'{{WRAPPER}} .tf-team .image-team' => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			); 	 

			$this->add_control(
				'border_radius_image',
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
						'{{WRAPPER}} .tf-team .image-team' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .tf-team .image-team::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'margin_image',
				[
					'label' => esc_html__( 'Margin Image', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '20',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-team .image-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'style1',
					],
				]
			);

			$this->add_control( 
				'bg_overlay',
				[
					'label' => esc_html__( 'Backround Overlay', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(255, 64, 64, 0.2)',
					'selectors' => [
						'{{WRAPPER}}  .tf-team .image-team::after ' => 'background: {{VALUE}}',					
					],
				]
			);

	        $this->add_control(
				'h_content',
				[
					'label' => esc_html__( 'Content', 'bixos' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-team .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-team .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'bg_content',
				[
					'label' => esc_html__( 'Backround', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-team .content' => 'background: {{VALUE}}',					
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'bixos' ),
					'selector' => '{{WRAPPER}} .tf-team .content',
				]
			);

			$this->add_control(
				'border_radius_content',
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
						'{{WRAPPER}} .tf-team .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'padding_content',
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
						'{{WRAPPER}} .tf-team .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'default',
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
				        'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-team .title',
				]
			); 

			$this->add_control( 
				'color_title',
				[
					'label' => esc_html__( 'Color Text Fisrt & Last', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#222429',
					'selectors' => [
						'{{WRAPPER}} .tf-team .title' => 'color: {{VALUE}}',					
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
						'{{WRAPPER}} .tf-team .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'name' => 'typography_position',
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
					'selector' => '{{WRAPPER}} .tf-team .position',
				]
			); 

			$this->add_control( 
				'color_position',
				[
					'label' => esc_html__( 'Color Text Fisrt & Last', 'bixos' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777777',
					'selectors' => [
						'{{WRAPPER}} .tf-team .position' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'padding_position',
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
						'{{WRAPPER}} .tf-team .position' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	
			$this->add_control(
				'margin_position',
				[
					'label' => esc_html__( 'Margin Position', 'bixos' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '4',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-team .position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_social',
				[
					'label' => esc_html__( 'Social', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_control( 
				'color_social',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-team .social a' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'color_social_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-team .social a:hover' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'background_color_social',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-team.style2 .social a' => 'background-color: {{VALUE}}',					
					],
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			$this->add_control( 
				'background_color_social_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ff4040',
					'selectors' => [
						'{{WRAPPER}} .tf-team.style2 .social a:hover' => 'background-color: {{VALUE}}',					
					],
					'condition' => [
						'style' => 'style2',
					],
				]
			);

			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_team', ['id' => "tf-team-{$this->get_id()}", 'class' => ['tf-team', $settings['style']], 'data-tabid' => $this->get_id()] );

		$title = $position = $social_html = $social = $image_html = $content = '';

		if ($settings['title'] != '') {
			$title = '<h3 class="title">'.$settings['title'].'</h3>';
		}

		if ($settings['position'] != '') {
			$position = '<div class="position"> '.$settings['position'].' </div>';
		}		

		
		foreach ( $settings['social_icon_list'] as $index => $item ) {
			$target = $item['link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';

			$social .= '<a href="' . $item['link']['url'] . '" ' . $target . $nofollow . '>'.\Elementor\Addon_Elementor_Icon_manager_bixos::render_icon( $item['social_icon'] ).'</a>';
		}

		$image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );

		$social_html = '<div class="social">'.$social.'</div>';

		$image_html = sprintf( '<div class="image-team">
									<div class="inner-image">%1$s %2$s</div>									
								</div>', $image, $social_html );

		$image_html = sprintf( '<div class="image-team">
									<div class="inner-image">%1$s %2$s</div>									
								</div>', $image, $social_html );

		$content = sprintf( '<div class="wrap-team">
								%1$s
								<div class="content">
								%2$s
								%3$s
								</div>
							</div>', $image_html, $position, $title );

		if ($settings['style'] == "style2") {
			$content = sprintf( '<div class="wrap-team">
									<div class="image-team">
										%1$s 									
									</div>
									<div class="content">
									%2$s
									%3$s
									%4$s
									</div>
								</div>', $image, $title, $position , $social_html);
			}

		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_team'),
            $content
        );	
		
	}

}