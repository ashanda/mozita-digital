<?php
class TFPieChart_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfpiechart';
    }
    
    public function get_title() {
        return esc_html__( 'TF Pie Chart', 'bixos' );
    }

    public function get_icon() {
        return 'eicon-counter-circle';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
        return ['tf-piechart'];
    }

    public function get_script_depends() {
        return ['appear', 'piechart', 'tf-piechart'];
    }

	protected function register_controls() {
        // Start Setting
            $this->start_controls_section( 
                    'section_setting',
                    [
                        'label' => esc_html__('Setting', 'bixos'),
                    ]
                );

                $this->add_control(
                    'piechart_style',
                    [
                        'label' => esc_html__( 'Pie Chart Style', 'bixos' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'withcontent',
                        'options' => [
                            'simple'  => esc_html__( 'Simple', 'bixos' ),
                            'withcontent' => esc_html__( 'With Content', 'bixos' ),
                        ],
                    ]
                );

                $this->add_control(
                    'piechart_percentage',
                    [
                        'label' => esc_html__( 'Percentage', 'bixos' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                        'default' => 90,
                    ]
                );

                $this->add_control(
                    'piechart_title',
                    [
                        'label' => esc_html__( 'Title', 'bixos' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Digital Analysis', 'bixos' ),
                        'placeholder' => esc_html__( 'Type your title here', 'bixos' ),
                        'label_block' => true,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ]
                    ]
                );


            $this->end_controls_section();
        // /.End Setting

        // Start Style Chart
            $this->start_controls_section( 
                    'section_style_chart',
                    [
                        'label' => esc_html__('Chart', 'bixos'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );

            $this->add_responsive_control(
                'piechart_size',
                [
                    'label' => esc_html__( 'Piechart Size', 'bixos' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 50,
                            'max' => 250,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'size' => 110,
                    ],
                ]
            );
            $this->add_responsive_control(
                'piechart_border_size',
                [
                    'label' => esc_html__( 'Border Size', 'bixos' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 30,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 5,
                    ],
                ]
            );  

            $this->add_control(
                'piechart_line_color',
                [
                    'label' => esc_html__( 'Bar Color', 'bixos' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ff4040',
                ]
            );

            $this->add_control(
                'piechart_bar_color_bg',
                [
                    'label' => esc_html__( 'Bar Background Color', 'bixos' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#F6F6F6',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'number_typography',
                    'label' => esc_html__( 'Typography Number', 'bixos' ),
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
                    'selector' => '{{WRAPPER}} .tf-pie-chart .pie-chart .percent',
                ]
            );

            $this->add_control(
                'number_color',
                [
                    'label' => esc_html__( 'Number Color', 'bixos' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pie-chart .pie-chart .percent' => 'color: {{VALUE}}',
                    ],
                ]
            );  

            $this->add_control(
                'number_bg_color',
                [
                    'label' => esc_html__( 'Number Background Color', 'bixos' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ff4040',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pie-chart .pie-chart .percent::before' => 'background: {{VALUE}}',
                        '{{WRAPPER}} .tf-pie-chart .pie-chart .percent::after' => 'border-top-color: {{VALUE}}',
                    ],
                ]
            );  

            $this->end_controls_section();
        // /.End Style Chart

        // Start Style Title
            $this->start_controls_section( 
                    'section_style_title',
                    [
                        'label' => esc_html__('Title', 'bixos'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ],
                    ]
                );

                $this->add_control(
                    'piechart_title_color',
                    [
                        'label' => esc_html__( 'Color', 'bixos' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'piechart_title_typography',
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
                                'default' => '600',
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
                        'selector' => '{{WRAPPER}} .tf-piechart-title',
                    ]
                );

                $this->add_responsive_control(
                    'piechart_title_margin',
                    [
                        'label' =>esc_html__( 'Margin', 'bixos' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', 'em', '%' ],
                        'default' =>    [
                            'top' => '12',
                            'right' => '0',
                            'bottom' => '0',
                            'left' => '0',
                            'unit' => 'px',
                            'isLinked' => false,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_section();
        // /.End Style Title

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'tf_pie_chart', ['id' => "tf-pie-chart-{$this->get_id()}", 'class' => ['tf-pie-chart'], 'data-tabid' => $this->get_id()] );

		?>
        <div <?php echo $this->get_render_attribute_string('tf_pie_chart'); ?>>
            <div class="tf-pie-chart-inner">
                <div class="pie-chart">
                    <div class="chart-percent">
                        <span class="chart" data-percent="<?php echo esc_attr($settings['piechart_percentage']); ?>" data-width="<?php echo esc_attr($settings['piechart_border_size']['size']); ?>" data-size="<?php echo esc_attr($settings['piechart_size']['size']); ?>" data-color="<?php echo esc_attr($settings['piechart_line_color']); ?>" data-trackcolor="<?php echo esc_attr($settings['piechart_bar_color_bg']); ?>">
                            <span class="percent">
                            </span>
                        </span>
                    </div>
                </div>
                <?php if ($settings['piechart_style'] == 'withcontent'): ?>
                    <h4 class="tf-piechart-title"><?php echo esc_attr($settings['piechart_title']); ?></h4>
                <?php endif; ?>
            </div>
        </div>
        <?php
	}

}