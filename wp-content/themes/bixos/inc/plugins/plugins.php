<?php
// Register action to declare required plugins
add_action('tgmpa_register', 'themesflat_recommend_plugin');
function themesflat_recommend_plugin() {
    
    $plugins = array(
        array(
            'name' => esc_html__('Elementor', 'bixos'),
            'slug' => 'elementor',
            'required' => true
        ),
        array(
            'name' => esc_html__('ThemesFlat', 'bixos'),
            'slug' => 'themesflat',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat.zip',
            'required' => true
        ),
        array(
            'name' => esc_html__('Themesflat Elementor', 'bixos'),
            'slug' => 'themesflat-elementor',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat-elementor.zip',
            'required' => true
        ), 
        array(
            'name' => esc_html__('Revslider', 'bixos'),
            'slug' => 'revslider',
            'source' => THEMESFLAT_DIR . 'inc/plugins/revslider.zip',
            'required' => false
        ),
        array(
            'name' => esc_html__('Contact Form 7', 'bixos'),
            'slug' => 'contact-form-7',
            'required' => false
        ),    
        array(
            'name' => esc_html__('Mailchimp', 'bixos'),
            'slug' => 'mailchimp-for-wp',
            'required' => false
        ),        
        array(
            'name' => esc_html__('One Click Demo Import', 'bixos'),
            'slug' => 'one-click-demo-import',
            'required' => false
        )   
    );
    
    tgmpa($plugins);
}

