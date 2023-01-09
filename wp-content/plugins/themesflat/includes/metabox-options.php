<?php
add_action( 'admin_init', 'themesflat_page_options_init' );

function themesflat_page_options_init() {

    new themesflat_meta_boxes(array(
        // Blog
        'id'    => 'blog-options',
        'label' => esc_html__( 'Post settings', 'bixos' ),
        'post_types'    => array('post','faq'),
        'context'     => 'normal',
        'priority'    => 'default',
        'sections' => array(
            'blog'   => array( 'title' => esc_html__( 'Post Format', 'bixos' ) ),
            ),
        'options' => themesflat_post_options_fields()
    ));   

 //    new themesflat_meta_boxes(array(
 //    	// Portfolio
 //    	'id'	 => 'portfolio-options',
	// 	'label'  => esc_html__( 'Causes Settings', 'bixos' ),
	// 	'post_types'  => 'portfolios',
	//     'context'     => 'normal',
 //        'priority'    => 'default',
	// 	'sections' => array(
 //            'general'   => array( 'title' => esc_html__( 'Portfolio', 'bixos' ) ),
	// 		),
	// 	'options' => themesflat_portfolio_options_fields()
	// ));	
}

/* Option Blog
===================================*/
function themesflat_post_options_fields() {
    $options['gallery_images_heading'] = array(
        'type' => 'heading',
        'section' => 'blog',
        'title' => esc_html__( 'Post Format: Gallery .', 'bixos' ),
        'description' => esc_html__( '', 'bixos' )
    );

    $options['gallery_images'] = array(
        'type'    => 'image-control',
        'section' => 'blog',
        'title' => esc_html__( 'Images', 'bixos' ),
        'default' => ''
    );

    $options['video_url_heading'] = array(
        'type' => 'heading',
        'section' => 'blog',
        'title' => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo ...).', 'bixos' ),
        'description' => esc_html__( '', 'bixos' )
    );
    $options['video_url'] = array(
        'type'    => 'textarea',
        'section' => 'blog',
        'title' => esc_html__( 'iframe video link', 'bixos' ),
        'default' => ''
    );

    $options['audio_url_heading'] = array(
        'type' => 'heading',
        'section' => 'blog',
        'title' => esc_html__( 'Post Format: Audio', 'bixos' ),
        'description' => esc_html__( '', 'bixos' )
    );
    $options['audio_url'] = array(
        'type'    => 'textarea',
        'section' => 'blog',
        'title' => esc_html__( 'iframe audio link (https://soundcloud.com/)', 'bixos' ),
        'default' => ''
    );
    return $options;
}

/* Option Portfolio
===================================*/
// function themesflat_portfolio_options_fields() {
//     $options['portfolio_status'] = array(
//         'section' => 'general',
//         'default' => '',
//         'type'    => 'text',
//         'title'   => esc_html__( 'Status', 'bixos' )
//     );

//     $options['portfolio_client'] = array(
//         'section' => 'general',
//         'default' => '',
//         'type'    => 'text',
//         'title'   => esc_html__( 'Name Client', 'bixos' )
//     );

//     $options['portfolio_website'] = array(
//         'section' => 'general',
//         'default' => '',
//         'type'    => 'text',
//         'title'   => esc_html__( 'Url Client', 'bixos' )
//     );
//     return $options;
// }