<?php
class TFServices_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'tfservices';
	}

	public function get_title()
	{
		return esc_html__('TF Services', 'bixos');
	}

	public function get_icon()
	{
		return 'eicon-posts-grid';
	}

	public function get_categories()
	{
		return ['themesflat_addons'];
	}

	public function get_style_depends()
	{
		return ['owl-carousel', 'tf-services'];
	}

	public function get_script_depends()
	{
		return ['owl-carousel', 'tf-posts'];
	}

	protected function register_controls()
	{
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
				'label' => esc_html__('Posts Per Page', 'bixos'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '8',
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__('Order By', 'bixos'),
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
				'label' => esc_html__('Order', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'desc' => 'Descending',
					'asc' => 'Ascending',
				],
			]
		);

		$this->add_control(
			'service_categories',
			[
				'label' => esc_html__('Categories', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => ThemesFlat_Addon_For_Elementor_Bixos::tf_get_taxonomies('services_category'),
				'label_block' => true,
				'multiple' => true,
			]
		);

		$this->add_control(
			'exclude',
			[
				'label' => esc_html__('Exclude', 'bixos'),
				'type'	=> \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__('Post Ids Will Be Inorged. Ex: 1,2,3', 'bixos'),
				'default' => '',
				'label_block' => true,
			]
		);

		$this->add_control(
			'sort_by_id',
			[
				'label' => esc_html__('Sort By ID', 'bixos'),
				'type'	=> \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__('Post Ids Will Be Sort. Ex: 1,2,3', 'bixos'),
				'default' => '',
				'label_block' => true,
			]
		);

		$this->end_controls_section();
		// /.End Posts Query

		// Start Layout        
		$this->start_controls_section(
			'section_services_layout',
			[
				'label' => esc_html__('Layout', 'bixos'),
			]
		);

		$this->add_control(
			'style',
			[
				'label' => esc_html__('Layout Style', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__('Style 1', 'bixos'),
					'style2' => esc_html__('Style 2', 'bixos'),
					'style3' => esc_html__('Style 3', 'bixos'),
					'style4' => esc_html__('Style 4', 'bixos'),
				],
			]
		);

		$this->add_control(
			'services_layout',
			[
				'label' => esc_html__('Columns', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column-3',
				'options' => [
					'column-1' => esc_html__('1', 'bixos'),
					'column-2' => esc_html__('2', 'bixos'),
					'column-3' => esc_html__('3', 'bixos'),
					'column-4' => esc_html__('4', 'bixos'),
				],
			]
		);

		$this->add_control(
			'services_layout_tablet',
			[
				'label' => esc_html__('Columns Tablet', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'tablet-column-2',
				'options' => [
					'tablet-column-1' => esc_html__('1', 'bixos'),
					'tablet-column-2' => esc_html__('2', 'bixos'),
					'tablet-column-3' => esc_html__('3', 'bixos'),
				],
			]
		);

		$this->add_control(
			'services_layout_mobile',
			[
				'label' => esc_html__('Columns Mobile', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'mobile-column-1',
				'options' => [
					'mobile-column-1' => esc_html__('1', 'bixos'),
					'mobile-column-2' => esc_html__('2', 'bixos'),
				],
			]
		);

		$this->add_control(
			'layout_align',
			[
				'label' => esc_html__('Alignment', 'bixos'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__('Left', 'bixos'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'bixos'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'bixos'),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justified', 'bixos'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'heading_image',
			[
				'label' => esc_html__('Image', 'bixos'),
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
				'label' => esc_html__('Content', 'bixos'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_title',
			[
				'label' => esc_html__('Show Title', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'bixos'),
				'label_off' => esc_html__('Hide', 'bixos'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label' => esc_html__('Show Excerpt', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'bixos'),
				'label_off' => esc_html__('Hide', 'bixos'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_control(
			'excerpt_lenght',
			[
				'label' => esc_html__('Excerpt Length', 'bixos'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'default' => 13,
				'condition' => [
					'style'	=> ['style1', 'style4'],
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->add_control(
			'heading_button',
			[
				'label' => esc_html__('Button', 'bixos'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_control(
			'show_button',
			[
				'label' => esc_html__('Show Button', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'bixos'),
				'label_off' => esc_html__('Hide', 'bixos'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Button Text', 'bixos'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'bixos'),
				'condition' => [
					'show_button'	=> 'yes',
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_control(
			'icon_style',
			[
				'label' => esc_html__('Icon Style', 'bixos'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => esc_html__('Icon', 'bixos'),
						'icon' => 'eicon-favorite',
					],
					'image' => [
						'title' => esc_html__('Image', 'bixos'),
						'icon' => 'eicon-image',
					],
				],
				'default' => 'icon',
				'condition' => [
					'show_button'	=> 'yes',
					'style'	=> ['style1', 'style4'],
				],
			]
		);
		$this->add_control(
			'icon_tabs',
			[
				'label' => esc_html__('Icon', 'bixos'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_tab',
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
				'condition' => [
					'show_button'	=> 'yes',
					'icon_style' => 'icon',
					'style'	=> ['style1', 'style4'],
				],
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'bixos'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'show_button'	=> 'yes',
					'icon_style' => 'image',
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_control(
			'heading_cat',
			[
				'label' => esc_html__('Category', 'bixos'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'style'	=> 'style3',
				],
			]
		);

		$this->add_control(
			'show_cat',
			[
				'label' => esc_html__('Show Category', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'bixos'),
				'label_off' => esc_html__('Hide', 'bixos'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style'	=> 'style3',
				],
			]
		);

		$this->end_controls_section();
		// /.End Layout

		// Start Carousel        
		$this->start_controls_section(
			'section_services_carousel',
			[
				'label' => esc_html__('Carousel', 'bixos'),
			]
		);

		$this->add_control(
			'carousel',
			[
				'label' => esc_html__('Carousel', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'bixos'),
				'label_off' => esc_html__('Off', 'bixos'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'carousel_loop',
			[
				'label' => esc_html__('Loop', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'bixos'),
				'label_off' => esc_html__('Off', 'bixos'),
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
				'label' => esc_html__('Auto Play', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'bixos'),
				'label_off' => esc_html__('Off', 'bixos'),
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
				'label' => esc_html__('Columns Desktop', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'1' => esc_html__('1', 'bixos'),
					'2' => esc_html__('2', 'bixos'),
					'3' => esc_html__('3', 'bixos'),
					'4' => esc_html__('4', 'bixos'),
					'5' => esc_html__('5', 'bixos'),
					'6' => esc_html__('6', 'bixos'),
				],
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_column_tablet',
			[
				'label' => esc_html__('Columns Tablet', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => esc_html__('1', 'bixos'),
					'2' => esc_html__('2', 'bixos'),
					'3' => esc_html__('3', 'bixos'),
				],
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_column_mobile',
			[
				'label' => esc_html__('Columns Mobile', 'bixos'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__('1', 'bixos'),
					'2' => esc_html__('2', 'bixos'),
				],
				'condition' => [
					'carousel' => 'yes',
				],
			]
		);

		$this->add_control(
			'carousel_arrow',
			[
				'label' => esc_html__('Arrow', 'bixos'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'bixos'),
				'label_off' => esc_html__('Hide', 'bixos'),
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
			'carousel_prev_icon',
			[
				'label' => esc_html__('Prev Icon', 'bixos'),
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
			'carousel_next_icon',
			[
				'label' => esc_html__('Next Icon', 'bixos'),
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
				'label' => esc_html__('Font Size', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
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
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Width', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
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
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Height', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
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
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Width Wrap Nav', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Horizontal Position', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
					'.rtl {{WRAPPER}} .tf-services .owl-carousel .owl-nav' => 'left: {{SIZE}}{{UNIT}};right: unset;',
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
				'label' => esc_html__('Vertical Position', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
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
			]
		);
		$this->start_controls_tab(
			'carousel_arrow_normal_tab',
			[
				'label' => esc_html__('Normal', 'bixos'),
			]
		);
		$this->add_control(
			'carousel_arrow_color',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1F242C',
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_control(
			'carousel_arrow_bg_color',
			[
				'label' => esc_html__('Background Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
				'label' => esc_html__('Border', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next',
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'carousel_arrow_border_radius',
			[
				'label' => esc_html__('Border Radius', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__('Hover', 'bixos'),
			]
		);
		$this->add_control(
			'carousel_arrow_color_hover',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#57B33E',
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_control(
			'carousel_arrow_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
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
				'label' => esc_html__('Border', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next:hover',
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'carousel_arrow_border_radius_hover',
			[
				'label' => esc_html__('Border Radius Previous', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-services .owl-carousel .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label'         => esc_html__('Bullets', 'bixos'),
				'type'          => \Elementor\Controls_Manager::SWITCHER,
				'label_on'      => esc_html__('Show', 'bixos'),
				'label_off'     => esc_html__('Hide', 'bixos'),
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
				'label' => esc_html__('Width', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
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
					'{{WRAPPER}} .tf-services .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Height', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
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
					'{{WRAPPER}} .tf-services .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Horizonta Offset', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'{{WRAPPER}} .tf-services .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Vertical Offset', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
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
					'size' => -60,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
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
			]
		);
		$this->start_controls_tab(
			'carousel_bullets_normal_tab',
			[
				'label' => esc_html__('Normal', 'bixos'),
			]
		);
		$this->add_control(
			'carousel_bullets_bg_color',
			[
				'label' => esc_html__('Background Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#E8E8E8',
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
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
				'label' => esc_html__('Border', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .owl-dots .owl-dot',
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'carousel_bullets_border_radius',
			[
				'label' => esc_html__('Border Radius', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '50',
					'right' => '50',
					'bottom' => '50',
					'left' => '50',
					'unit' => '%',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__('Hover', 'bixos'),
			]
		);
		$this->add_control(
			'carousel_bullets_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-services .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
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
				'label' => esc_html__('Border', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-services .owl-dots .owl-dot.active',
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'carousel_bullets_border_radius_hover',
			[
				'label' => esc_html__('Border Radius', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tf-services .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-services .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__('General', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__('Padding', 'bixos'),
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
					'{{WRAPPER}} .tf-services .item ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__('Margin', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'allowed_dimensions' => ['right', 'left'],
				'default' => [
					'right' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__('Box Shadow', 'bixos'),
				'fields_options' => [
					'box_shadow_type' => ['default' => 'yes'],
					'box_shadow' => [
						'default' => [
							'horizontal' => 0,
							'vertical' => 20,
							'blur' => 40,
							'spread' => 0,
							'color' => 'rgba(0, 0, 0, 0.07)'
						]
					]
				],
				'selector' => '{{WRAPPER}} .tf-services .services-post ',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__('Border', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .services-post ',
			]
		);

		$this->add_control(
			'border_color_hover',
			[
				'label' => esc_html__('Border Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post:hover' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style4',
				]
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__('Border Radius', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__('Background Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// /.End General Style

		// Start Post Style 
		$this->start_controls_section(
			'section_style_post',
			[
				'label' => esc_html__('Service Post', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'post_padding',
			[
				'label' => esc_html__('Padding', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'top' => '17',
					'right' => '27',
					'bottom' => '50',
					'left' => '27',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Post Style

		// Start Image Style 
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__('Image', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'padding_image',
			[
				'label' => esc_html__('Padding', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'margin_image',
			[
				'label' => esc_html__('Margin', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '14',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .featured-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_image',
				'label' => esc_html__('Box Shadow', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .featured-post',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_image',
				'label' => esc_html__('Border', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .featured-post',
			]
		);

		$this->add_responsive_control(
			'border_radius_image',
			[
				'label' => esc_html__('Border Radius', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .tf-services .featured-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tf-services .featured-post img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Image Style

		// Start Content Style 
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__('Content', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__('Padding', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Content Style

		// Start Title Style 
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__('Title', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_s1_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
						'default' => '500',
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
				'selector' => '{{WRAPPER}} .tf-services.style1 .title',
				'condition' => [
					'style' => 'style1',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_s2_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
						'default' => '500',
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
				'selector' => '{{WRAPPER}} .tf-services.style2 .title',
				'condition' => [
					'style' => 'style2',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_s3_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
						'default' => '500',
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
				'selector' => '{{WRAPPER}} .tf-services.style3  .title',
				'condition' => [
					'style' => 'style3',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_s4_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
				'selector' => '{{WRAPPER}} .tf-services.style4 .title',
				'condition' => [
					'style' => 'style4',
				],
			]
		);


		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__('Margin', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '16',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('title_tabs');

		$this->start_controls_tab(
			'title_normal_tab',
			[
				'label' => esc_html__('Normal', 'bixos'),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post .title a' => 'color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_hover_tab',
			[
				'label' => esc_html__('Hover', 'bixos'),
			]
		);
		$this->add_control(
			'title_color_hover',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post:hover .title a' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style2',
				],
			]
		);
		$this->add_control(
			'title_color_hover_s3',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post:hover .title a' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style3',
				],
			]
		);
		$this->add_control(
			'title_color_hover_s1',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post .title a:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style1',
				],
			]
		);

		$this->add_control(
			'title_color_hover_s4',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post:hover .title a' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => 'style4',
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
				'label' => esc_html__('Excerpt', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => esc_html__('Typography', 'bixos'),
				'selector' => '{{WRAPPER}} .tf-services .services-post .content .content-post',
			]
		);

		$this->add_responsive_control(
			'text_margin',
			[
				'label' => esc_html__('Margin', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '16',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post .content .content-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post .content .content-post' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// /.End Excerpt Style

		// Start Button Style 
		$this->start_controls_section(
			'section_style_button',
			[
				'label' => esc_html__('Button', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_s1_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
				'selector' => '{{WRAPPER}} .tf-services.style1  .tf-button',
				'condition' => [
					'style' => 'style1',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_s2_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
				'selector' => '{{WRAPPER}} .tf-services.style2  .tf-button',
				'condition' => [
					'style' => 'style2',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_s3_typography',
				'label' => esc_html__('Typography', 'bixos'),
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_family' => [
						'default' => 'Jost',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '15',
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
				'selector' => '{{WRAPPER}} .tf-services.style3  .tf-button',
				'condition' => [
					'style' => 'style3',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_s4_typography',
				'label' => esc_html__('Typography', 'bixos'),
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_family' => [
						'default' => 'Jost',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '15',
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
				'selector' => '{{WRAPPER}} .tf-services.style4  .tf-button',
				'condition' => [
					'style' => 'style4',
				],
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' => esc_html__('Margin', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'top' => '40',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'bixos'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_spacing',
			[
				'label' => esc_html__('Icon Spacing', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button svg' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button i' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button img' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('button_tabs');

		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__('Normal', 'bixos'),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post .tf-button-container .tf-button' => 'background: {{VALUE}}',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_hover_tab',
			[
				'label' => esc_html__('Hover', 'bixos'),
			]
		);

		$this->add_control(
			'button_color_hover',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post:hover .tf-button-container .tf-button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-services  .services-post:hover .tf-button-container .tf-button svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .tf-services  .services-post:hover .tf-button-container .tf-button svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_bg_color_hover',
			[
				'label' => esc_html__('Background Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post:hover .tf-button-container .tf-button' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
		// /.End Button Style

		// Start Icon Style 
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__('Tab Icon', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'style'	=> ['style1', 'style4'],
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'bixos'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
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
					'{{WRAPPER}} .tf-services .services-post .post-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-services .services-post .post-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('icon_tabs');

		$this->start_controls_tab(
			'icon_normal_tab',
			[
				'label' => esc_html__('Normal', 'bixos'),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post .post-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-services  .services-post .post-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_hover_tab',
			[
				'label' => esc_html__('Hover', 'bixos'),
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services  .services-post:hover .post-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-services  .services-post:hover .post-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		// /.End Icon Style

		// Start Meta Style 
		$this->start_controls_section(
			'section_style_cat',
			[
				'label' => esc_html__('Meta', 'bixos'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'style'	=> 'style3',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_s1_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '38',
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
				'selector' => '{{WRAPPER}} .tf-services.style1 .services-cat a',
				'condition' => [
					'style' => 'style1',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_s2_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
				'selector' => '{{WRAPPER}} .tf-services.style2 .services-cat a',
				'condition' => [
					'style' => 'style2',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_s3_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
				'selector' => '{{WRAPPER}} .tf-services.style3 .services-cat',
				'condition' => [
					'style' => 'style3',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_s4_typography_content',
				'label' => esc_html__('Typography', 'bixos'),
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
				'selector' => '{{WRAPPER}} .tf-services.style4 .content .services-cat .services-cat-item',
				'condition' => [
					'style' => 'style4',
				],
			]
		);

		$this->add_control(
			'heading_cat_image',
			[
				'label' => esc_html__('Meta Featured', 'bixos'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'style' => 'style4',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_s4_typography',
				'label' => esc_html__('Typography', 'bixos'),
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
				'selector' => '{{WRAPPER}} .tf-services.style4 .featured-post .services-cat a',
				'condition' => [
					'style' => 'style4',
				],
			]
		);


		$this->start_controls_tabs('meta_tabs');

		$this->start_controls_tab(
			'meta_normal_tab',
			[
				'label' => esc_html__('Normal', 'bixos'),
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#777777',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post .service-category li a' => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'meta_hover_tab',
			[
				'label' => esc_html__('Hover', 'bixos'),
			]
		);

		$this->add_control(
			'meta_color_hover',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tf-services .services-post:hover .service-category li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'h_line',
			[
				'label' => esc_html__('Line', 'bixos'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs('meta_line_tabs');



		$this->start_controls_tab(
			'meta_line_normal_tab',
			[
				'label' => esc_html__('Normal', 'bixos'),
			]
		);

		$this->add_control(
			'line_color',
			[
				'label' => esc_html__('Color', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4040',
				'selectors' => [
					'{{WRAPPER}} .tf-services.style3 .services-post .service-category::before' => 'background-color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'meta_line_hover_tab',
			[
				'label' => esc_html__('Hover', 'bixos'),
			]
		);

		$this->add_control(
			'line_color_hover',
			[
				'label' => esc_html__('Color Hover', 'bixos'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tf-services.style3 .services-post:hover .service-category::before' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tabs();



		$this->end_controls_section();
		// /.End Meta Style
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings_for_display();

		$has_carousel = 'no-carousel';
		if ($settings['carousel'] == 'yes') {
			$has_carousel = 'has-carousel';
		}

		$this->add_render_attribute('tf_services', ['id' => "tf-services-{$this->get_id()}", 'class' => ['tf-services', $settings['style'], $settings['services_layout'], $settings['services_layout_tablet'], $settings['services_layout_mobile'], $has_carousel], 'data-tabid' => $this->get_id()]);

		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		$query_args = array(
			'post_type' => 'services',
			'posts_per_page' => $settings['posts_per_page'],
			'paged'     => $paged
		);

		if (!empty($settings['service_categories'])) {
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'services_category',
					'field'    => 'slug',
					'terms'    => $settings['service_categories']
				),
			);
		}


		if (!empty($settings['exclude'])) {
			if (!is_array($settings['exclude']))
				$exclude = explode(',', $settings['exclude']);

			$query_args['post__not_in'] = $exclude;
		}
		$query_args['orderby'] = $settings['order_by'];
		$query_args['order'] = $settings['order'];

		$migrated = isset($settings['__fa4_migrated']['icon_tabs']);
		$is_new = empty($settings['icon_tab']);

		$query = new WP_Query($query_args);
		if ($query->have_posts()) : ?>
			<div <?php echo $this->get_render_attribute_string('tf_services'); ?> data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">
				<?php if ($settings['carousel'] == 'yes') : ?>
					<div class="owl-carousel">
					<?php endif; ?>
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<div class="item">
							<?php if ($settings['style'] == 'style1') : ?>
								<div class="services-post services-post-<?php the_ID(); ?>">
									<?php if (has_post_thumbnail()) : ?>
										<div class="featured-post">
											<a href="<?php echo get_the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											</a>

										</div>
									<?php endif; ?>
									<div class="content">

										<?php if ($settings['show_title'] == 'yes') : ?>
											<h2 class="title"><a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo get_the_title(); ?></a></h2>
										<?php endif; ?>

										<?php if ($settings['show_cat'] == 'yes') : ?>
											<?php
											$taxonomy = 'services_category';
											$terms = get_terms($taxonomy);
											if ($terms && !is_wp_error($terms)) :
											?>
												<ul class="service-category">
													<?php foreach ($terms as $term) { ?>
														<li><?php if ($icon_quote) : ?><span class="icon-quote"><?php echo sprintf($icon_quote); ?></span><?php endif; ?> <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
													<?php } ?>
												</ul>
											<?php endif; ?>
										<?php endif; ?>


										<?php if ($settings['show_excerpt'] == 'yes') : ?>
											<div class="content-post"><?php echo wp_trim_words(get_the_content(), $settings['excerpt_lenght'], ''); ?></div>
										<?php endif; ?>

										<?php if ($settings['show_button'] == 'yes') : ?>
											<div class="tf-button-container">
												<a href="<?php echo esc_url(get_permalink()) ?>" class="tf-button"><?php echo esc_attr($settings['button_text']); ?>
													<?php
													if ($settings['icon_style'] == 'image') {
														echo '<img src="' . esc_url($settings['image']['url']) . '" alt="image"/>';
													} else {
														if ($is_new || $migrated) {
															if (isset($settings['icon_tabs']['value']['url'])) {
																\Elementor\Icons_Manager::render_icon($settings['icon_tabs'], ['aria-hidden' => 'true']);
															} else {
																echo '<i class="' . esc_attr($settings['icon_tabs']['value']) . '" aria-hidden="true"></i>';
															}
														} else {
															echo '<i class="' . esc_attr($settings['icon_tab']) . ' aria-hidden="true""></i>';
														}
													} ?>
												</a>

											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php elseif ($settings['style'] == 'style2') : ?>
								<div class="services-post services-post-<?php the_ID(); ?>">
									<?php if (has_post_thumbnail()) : ?>
										<div class="featured-post">
											<a href="<?php echo get_the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											</a>
										</div>
									<?php endif; ?>
									<div class="content">

										<?php if ($settings['show_title'] == 'yes') : ?>
											<h2 class="title"><a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo get_the_title(); ?></a></h2>
										<?php endif; ?>

										<?php if ($settings['show_cat'] == 'yes') : ?>
											<?php
											$taxonomy = 'services_category';
											$terms = get_terms($taxonomy);
											if ($terms && !is_wp_error($terms)) :
											?>
												<ul class="service-category">
													<?php foreach ($terms as $term) { ?>
														<li><?php if ($icon_quote) : ?>
																<span class="icon-quote"><?php echo sprintf($icon_quote); ?></span>
															<?php endif; ?> <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a>
														</li>
													<?php } ?>
												</ul>
											<?php endif; ?>
										<?php endif; ?>


										<?php if ($settings['show_excerpt'] == 'yes') : ?>
											<div class="content-post"><?php echo wp_trim_words(get_the_content(), $settings['excerpt_lenght'], ''); ?></div>
										<?php endif; ?>

										<?php if ($settings['show_button'] == 'yes') : ?>
											<div class="tf-button-container">
												<a href="<?php echo esc_url(get_permalink()) ?>" class="tf-button"><?php echo esc_attr($settings['button_text']); ?>
													<?php
													if ($settings['icon_style'] == 'image') {
														echo '<img src="' . esc_url($settings['image']['url']) . '" alt="image"/>';
													} else {
														if ($is_new || $migrated) {
															if (isset($settings['icon_tabs']['value']['url'])) {
																\Elementor\Icons_Manager::render_icon($settings['icon_tabs'], ['aria-hidden' => 'true']);
															} else {
																echo '<i class="' . esc_attr($settings['icon_tabs']['value']) . '" aria-hidden="true"></i>';
															}
														} else {
															echo '<i class="' . esc_attr($settings['icon_tab']) . ' aria-hidden="true""></i>';
														}
													} ?>
												</a>

											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php elseif ($settings['style'] == 'style3') : ?>
								<div class="services-post services-post-<?php the_ID(); ?>">
									<?php if (has_post_thumbnail()) : ?>
										<div class="featured-post">
											<a href="<?php echo get_the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											</a>
										</div>
									<?php endif; ?>
									<div class="content">

										<?php if ($settings['show_title'] == 'yes') : ?>
											<h2 class="title"><a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo get_the_title(); ?></a></h2>
										<?php endif; ?>

										<?php if ($settings['show_cat'] == 'yes') : ?>
											<?php
											echo the_terms(get_the_ID(), 'services_category', '<ul class="service-category"><li> ', '</li><li>', '</li></ul>');
											?>
										<?php endif; ?>


										<?php if ($settings['show_excerpt'] == 'yes') : ?>
											<div class="content-post"><?php echo wp_trim_words(get_the_content(), $settings['excerpt_lenght'], ''); ?></div>
										<?php endif; ?>

										<?php if ($settings['show_button'] == 'yes') : ?>
											<div class="tf-button-container">
												<a href="<?php echo esc_url(get_permalink()) ?>" class="tf-button"><?php echo esc_attr($settings['button_text']); ?>
													<?php
													if ($settings['icon_style'] == 'image') {
														echo '<img src="' . esc_url($settings['image']['url']) . '" alt="image"/>';
													} else {
														if ($is_new || $migrated) {
															if (isset($settings['icon_tabs']['value']['url'])) {
																\Elementor\Icons_Manager::render_icon($settings['icon_tabs'], ['aria-hidden' => 'true']);
															} else {
																echo '<i class="' . esc_attr($settings['icon_tabs']['value']) . '" aria-hidden="true"></i>';
															}
														} else {
															echo '<i class="' . esc_attr($settings['icon_tab']) . ' aria-hidden="true""></i>';
														}
													} ?>
												</a>

											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php elseif ($settings['style'] == 'style4') : ?>
								<div class="services-post services-post-<?php the_ID(); ?>">
									<?php if (has_post_thumbnail()) : ?>
										<div class="featured-post">
											<a href="<?php echo get_the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											</a>

										</div>
									<?php endif; ?>
									<div class="content">

										<?php if ($settings['show_title'] == 'yes') : ?>
											<h2 class="title"><a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo get_the_title(); ?></a></h2>
										<?php endif; ?>

										<?php if ($settings['show_cat'] == 'yes') : ?>
											<?php
											$taxonomy = 'services_category';
											$terms = get_terms($taxonomy);
											if ($terms && !is_wp_error($terms)) :
											?>
												<ul class="service-category">
													<?php foreach ($terms as $term) { ?>
														<li><?php if ($icon_quote) : ?><span class="icon-quote"><?php echo sprintf($icon_quote); ?></span><?php endif; ?> <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
													<?php } ?>
												</ul>
											<?php endif; ?>
										<?php endif; ?>


										<?php if ($settings['show_excerpt'] == 'yes') : ?>
											<div class="content-post"><?php echo wp_trim_words(get_the_content(), $settings['excerpt_lenght'], ''); ?></div>
										<?php endif; ?>

										<?php if ($settings['show_button'] == 'yes') : ?>
											<div class="tf-button-container">
												<a href="<?php echo esc_url(get_permalink()) ?>" class="tf-button"><?php echo esc_attr($settings['button_text']); ?>
													<?php
													if ($settings['icon_style'] == 'image') {
														echo '<img src="' . esc_url($settings['image']['url']) . '" alt="image"/>';
													} else {
														if ($is_new || $migrated) {
															if (isset($settings['icon_tabs']['value']['url'])) {
																\Elementor\Icons_Manager::render_icon($settings['icon_tabs'], ['aria-hidden' => 'true']);
															} else {
																echo '<i class="' . esc_attr($settings['icon_tabs']['value']) . '" aria-hidden="true"></i>';
															}
														} else {
															echo '<i class="' . esc_attr($settings['icon_tab']) . ' aria-hidden="true""></i>';
														}
													} ?>
												</a>

											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
					<?php if ($settings['carousel'] == 'yes') : ?>
					</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
<?php
		else :
			esc_html_e('No services found', 'bixos');
		endif;
	}
}
