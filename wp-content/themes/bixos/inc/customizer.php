<?php
/**
 * bixos Theme Customizer
 *
 * @package bixos
 */

function themesflat_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';    
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->remove_control('background_color');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');
    remove_theme_support( 'custom-header' );
  
    //Heading
    class themesflat_Info extends WP_Customize_Control {
        public $type = 'heading';
        public $label = '';
        public function render_content() {
        ?>
            <h3 class="themesflat-title-control"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }    

    //Title
    class themesflat_Title_Info extends WP_Customize_Control {
        public $type = 'title';
        public $label = '';
        public function render_content() {
        ?>
            <h4><?php echo esc_html( $this->label ); ?></h4>
        <?php
        }
    }    

    //Desc
    class themesflat_Theme_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }    

    //Desc
    class themesflat_Desc_Info extends WP_Customize_Control {
        public $type = 'desc';
        public $label = '';
        public function render_content() {
        ?>
            <p class="themesflat-desc-control"><?php echo esc_html( $this->label ); ?></p>
        <?php
        }
    }       

    //___GENERAL___//
    $wp_customize->add_section('general_panel',array(
        'title'         => 'General',
        'priority'      => 140,
    ));
    require THEMESFLAT_DIR . "inc/customizer/general.php";

    //__COLOR__//
    $wp_customize->add_panel('color_panel',array(
        'title'         => 'Color',
        'priority'      => 141,
    ));
    require THEMESFLAT_DIR . "inc/customizer/color.php"; 

    //___TYPOGRAPHY___//
    $wp_customize->add_panel('typography_panel',array(
        'title'         => 'Typography',
        'priority'      => 142,
    ));      
    require THEMESFLAT_DIR . "inc/customizer/typography.php";

    //___HEADER___//   
    $wp_customize->add_panel('header_panel',array(
        'title'         => 'Header',
        'priority'      => 143,
    ));
    require THEMESFLAT_DIR . "inc/customizer/header.php";

    //___PAGETITLE___//   
    $wp_customize->add_panel('page_title_panel',array(
        'title'         => 'Page Title',
        'priority'      => 144,
    ));
    require THEMESFLAT_DIR . "inc/customizer/page-title.php";

    //___PAGETITLE___//   
    $wp_customize->add_panel('content_panel',array(
        'title'         => 'Content',
        'priority'      => 145,
    ));
    require THEMESFLAT_DIR . "inc/customizer/content.php";
    
   //___FOOTER___//
    $wp_customize->add_panel('footer_panel',array(
        'title'         => 'Footer',
        'priority'      => 146,
    ));      
    require THEMESFLAT_DIR . "inc/customizer/footer.php";

}
add_action( 'customize_register', 'themesflat_customize_register' );

// Text
function themesflat_sanitize_text( $input ) {
    return wp_kses( $input, themesflat_kses_allowed_html() );
}

// Background size
function themesflat_sanitize_bg_size( $input ) {
    $valid = array(
        'cover'     => esc_html__('Cover', 'bixos'),
        'contain'   => esc_html__('Contain', 'bixos'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Blog Layout
function themesflat_sanitize_blog( $input ) {
    $valid = array(
        'sidebar-right'    => esc_html__( 'Sidebar right', 'bixos' ),
        'sidebar-left'    => esc_html__( 'Sidebar left', 'bixos' ),
        'fullwidth'  => esc_html__( 'Full width (no sidebar)', 'bixos' )

    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// themesflat_sanitize_pagination
function themesflat_sanitize_pagination ( $input ) {
    $valid = array(
        'pager' => esc_html__('Pager', 'bixos'),
        'numeric' => esc_html__('Numeric', 'bixos'),
        'page_numeric' => esc_html__('Pager & Numeric', 'bixos')                
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// themesflat_sanitize_related_post
function themesflat_sanitize_related_post ( $input ) {
    $valid = array(
        'simple_list' => esc_html__('Simple List', 'bixos'),
        'grid' => esc_html__('Grid', 'bixos')        
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Footer widget areas
function themesflat_sanitize_fw( $input ) {
    $valid = array(
        '0' => esc_html__('footer_default', 'bixos'),
        '1' => esc_html__('One', 'bixos'),
        '2' => esc_html__('Two', 'bixos'),
        '3' => esc_html__('Three', 'bixos'),
        '4' => esc_html__('Four', 'bixos')
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Header style sanitize
function themesflat_sanitize_headerstyle( $input ) {
    $valid = themesflat_predefined_header_styles();
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Checkboxes
function themesflat_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// Themesflat_sanitize_related_portfolio
function themesflat_sanitize_related_portfolio( $input ) {
    $valid = array(
        'grid'                 => esc_html__( 'Grid', 'bixos' ),
        'grid_masonry'         => esc_html__( 'Grid Masonry', 'bixos' ),
        'grid_nomargin'        => esc_html__( 'Grid Masonry No Margin', 'bixos' ),
        'carosuel'             => esc_html__( 'Carosuel', 'bixos' ),
        'carosuel_nomargin'    => esc_html__( 'Carosuel No Margin', 'bixos' )       
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_portfolio_pagination
function themesflat_sanitize_portfolio_pagination( $input ) {
    $valid = array(
        'page_numeric'         => esc_html__( 'Pager & Numeric', 'bixos' ),
        'load_more'         => esc_html__( 'Load More', 'bixos' )     
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_portfolio_order
function themesflat_sanitize_portfolio_order( $input ) {
    $valid = array(
        'date'          => esc_html__( 'Date', 'bixos' ),
        'id'            => esc_html__( 'Id', 'bixos' ),
        'author'        => esc_html__( 'Author', 'bixos' ),
        'title'         => esc_html__( 'Title', 'bixos' ),
        'modified'      => esc_html__( 'Modified', 'bixos' ),
        'comment_count' => esc_html__( 'Comment Count', 'bixos' ),
        'menu_order'    => esc_html__( 'Menu Order', 'bixos' )     
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_portfolio_order_direction
function themesflat_sanitize_portfolio_order_direction( $input ) {
    $valid = array(
        'DESC' => esc_html__( 'Descending', 'bixos' ),
        'ASC'  => esc_html__( 'Assending', 'bixos' )       
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_grid_portfolio
function themesflat_sanitize_grid_portfolio( $input ) {
    $valid = array(
        'portfolio-two-columns'     => esc_html__( '2 Columns', 'bixos' ),
        'portfolio-three-columns'     => esc_html__( '3 Columns', 'bixos' ),
        'portfolio-four-columns'     => esc_html__( '4 Columns', 'bixos' ),
        'portfolio-five-columns'     => esc_html__( '5 Columns', 'bixos' )
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// themesflat_sanitize_grid_portfolio_related
function themesflat_sanitize_grid_portfolio_related( $input ) {
    $valid = array(
        'portfolio-one-columns'     => esc_html__( '1 Columns', 'bixos' ),
        'portfolio-two-columns'     => esc_html__( '2 Columns', 'bixos' ),
        'portfolio-three-columns'     => esc_html__( '3 Columns', 'bixos' ),
        'portfolio-four-columns'     => esc_html__( '4 Columns', 'bixos' ),
        'portfolio-five-columns'     => esc_html__( '5 Columns', 'bixos' )
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_grid_post_related
function themesflat_sanitize_grid_post_related( $input ) {
    $valid = array(        
        2    => esc_html__( '2 Columns', 'bixos' ),
        3    => esc_html__( '3 Columns', 'bixos' ),
        4    => esc_html__( '4 Columns', 'bixos' ), 
        5    => esc_html__( '5 Columns', 'bixos' ),       
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// themesflat_sanitize_layout_product
function themesflat_sanitize_layout_product( $input ) {
    $valid = array(        
        'fullwidth'         => esc_html__( 'No Sidebar', 'bixos' ),
        'sidebar-right'           => esc_html__( 'Sidebar Right', 'bixos' ),
        'sidebar-left'         => esc_html__( 'Sidebar Left', 'bixos' )
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

