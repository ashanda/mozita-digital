<?php
add_action('init', 'themesflat_register_portfolio_post_type');
/**
  * Register project post type
*/
function themesflat_register_portfolio_post_type() {
    /*Portfolios*/
    $portfolio_slug = 'portfolios';
    $labels = array(
        'name'                  => esc_html__( 'Portfolios', 'bixos' ),
        'singular_name'         => esc_html__( 'Portfolios', 'bixos' ),
        'menu_name'             => esc_html__( 'Portfolios', 'bixos' ),
        'add_new'               => esc_html__( 'New Portfolios', 'bixos' ),
        'add_new_item'          => esc_html__( 'Add New Portfolios', 'bixos' ),
        'new_item'              => esc_html__( 'New Portfolios Item', 'bixos' ),
        'edit_item'             => esc_html__( 'Edit Portfolios Item', 'bixos' ),
        'view_item'             => esc_html__( 'View Portfolios', 'bixos' ),
        'all_items'             => esc_html__( 'All Portfolios', 'bixos' ),
        'search_items'          => esc_html__( 'Search Portfolios', 'bixos' ),
        'not_found'             => esc_html__( 'No Portfolios Items Found', 'bixos' ),
        'not_found_in_trash'    => esc_html__( 'No Portfolios Items Found In Trash', 'bixos' ),
        'parent_item_colon'     => esc_html__( 'Parent Portfolios:', 'bixos' )

    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $portfolio_slug ),        
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor' ),
        'public'        => true,
        'show_in_rest' => true,
        'has_archive' => true
    );
    register_post_type( 'portfolios', $args );
    flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_portfolios_updated_messages' );
/**
  * Portfolios update messages.
*/
function themesflat_portfolios_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'portfolios' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'Portfolios Updated. <a href="%s">View portfolios</a>', 'bixos' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'bixos' ),
        3  => esc_html__( 'Custom Field Deleted.', 'bixos' ),
        4  => esc_html__( 'Portfolios Updated.', 'bixos' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Portfolios Restored To Revision From %s', 'bixos' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'Portfolios Published. <a href="%s">View Portfolios</a>', 'bixos' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'Portfolios Saved.', 'bixos' ),
        8  => sprintf( esc_html__('Portfolios Submitted. <a target="_blank" href="%s">Preview Portfolios</a>', 'bixos' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'Portfolios Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolios</a>', 'bixos' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'bixos' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'Portfolios Draft Updated. <a target="_blank" href="%s">Preview Portfolios</a>', 'bixos' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_portfolios_taxonomy' );
/**
  * Register portfolios taxonomy
*/
function themesflat_register_portfolios_taxonomy() {
    /*Portfolios Categories*/
    $portfolio_cat_slug = 'portfolios_category';    
    $labels = array(
        'name'                       => esc_html__( 'Portfolios Categories', 'bixos' ),
        'singular_name'              => esc_html__( 'Categories', 'bixos' ),
        'search_items'               => esc_html__( 'Search Categories', 'bixos' ),
        'menu_name'                  => esc_html__( 'Categories', 'bixos' ),
        'all_items'                  => esc_html__( 'All Categories', 'bixos' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'bixos' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'bixos' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'bixos' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'bixos' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'bixos' ),
        'update_item'                => esc_html__( 'Update Categories', 'bixos' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'bixos' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'bixos' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
        'menu_name'                  => esc_html__( 'Categories' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array('slug'=>$portfolio_cat_slug),
        'hierarchical'  => true,
        'show_in_rest'  => true,
    );
    register_taxonomy( 'portfolios_category', 'portfolios', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'themesflat_register_portfolios_tag' );
/**
 * Register tag taxonomy
 */
function themesflat_register_portfolios_tag() {
    $portfolio_tag_slug = 'portfolios_tag';

    $labels = array(
        'name'                       => esc_html__( 'Portfolio Tags', 'bixos' ),
        'singular_name'              => esc_html__( 'Portfolio Tags', 'bixos' ),
        'search_items'               => esc_html__( 'Search Tags', 'bixos' ),        
        'all_items'                  => esc_html__( 'All Tags', 'bixos' ),
        'new_item_name'              => esc_html__( 'Add New Tag', 'bixos' ),
        'add_new_item'               => esc_html__( 'New Tag Name', 'bixos' ),
        'edit_item'                  => esc_html__( 'Edit Tag', 'bixos' ),
        'update_item'                => esc_html__( 'Update Tag', 'bixos' ),
        'menu_name'                  => esc_html__( 'Tags' ),
    );
    $args = array(
        'labels'       => $labels,
        'rewrite'       => array('slug'=>$portfolio_tag_slug),
        'hierarchical' => true,
        'show_in_rest'  => true,
    );
    register_taxonomy( 'portfolios_tag', 'portfolios', $args );
    flush_rewrite_rules();
}