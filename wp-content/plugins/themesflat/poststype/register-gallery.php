<?php
add_action('init', 'themesflat_register_gallery_post_type');
/**
  * Register gallery post type
*/
function themesflat_register_gallery_post_type() {
    $gallery_slug = 'gallery';

    $labels = array(
        'name'               => esc_html__( 'Gallery', 'bixos' ),
        'singular_name'      => esc_html__( 'Gallery Item', 'bixos' ),
        'add_new'            => esc_html__( 'Add New', 'bixos' ),
        'add_new_item'       => esc_html__( 'Add New Item', 'bixos' ),
        'new_item'           => esc_html__( 'New Item', 'bixos' ),
        'edit_item'          => esc_html__( 'Edit Item', 'bixos' ),
        'view_item'          => esc_html__( 'View Item', 'bixos' ),
        'all_items'          => esc_html__( 'All Items', 'bixos' ),
        'search_items'       => esc_html__( 'Search Items', 'bixos' ),
        'parent_item_colon'  => esc_html__( 'Parent Items:', 'bixos' ),
        'not_found'          => esc_html__( 'No items found.', 'bixos' ),
        'not_found_in_trash' => esc_html__( 'No items found in Trash.', 'bixos' )
    );

    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $gallery_slug ),
        'supports'      => array( 'title', 'thumbnail'  ),
        'public'        => true
    );

    register_post_type( 'gallery', $args );
}

add_filter( 'post_updated_messages', 'themesflat_gallery_updated_messages' );
/**
  * gallery update messages.
*/
function themesflat_gallery_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['gallery'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Gallery updated.', 'bixos' ),
        2  => esc_html__( 'Custom field updated.', 'bixos' ),
        3  => esc_html__( 'Custom field deleted.', 'bixos' ),
        4  => esc_html__( 'Gallery updated.', 'bixos' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Gallery restored to revision from %s', 'bixos' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Gallery published.', 'bixos' ),
        7  => esc_html__( 'Gallery saved.', 'bixos' ),
        8  => esc_html__( 'Gallery submitted.', 'bixos' ),
        9  => sprintf(
            esc_html__( 'Gallery scheduled for: <strong>%1$s</strong>.', 'bixos' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'bixos' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Gallery draft updated.', 'bixos' )
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_gallery_taxonomy' );
/**
  * Register gallery taxonomy
*/
function themesflat_register_gallery_taxonomy() {
    $cat_slug = 'gallery_category';

    $labels = array(
        'name'                       => esc_html__( 'Gallery Categories', 'bixos' ),
        'singular_name'              => esc_html__( 'Category', 'bixos' ),
        'search_items'               => esc_html__( 'Search Categories', 'bixos' ),
        'menu_name'                  => esc_html__( 'Categories', 'bixos' ),
        'all_items'                  => esc_html__( 'All Categories', 'bixos' ),
        'parent_item'                => esc_html__( 'Parent Category', 'bixos' ),
        'parent_item_colon'          => esc_html__( 'Parent Category:', 'bixos' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'bixos' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'bixos' ),
        'edit_item'                  => esc_html__( 'Edit Category', 'bixos' ),
        'update_item'                => esc_html__( 'Update Category', 'bixos' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'bixos' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'bixos' ),
        'not_found'                  => esc_html__( 'No Category found.', 'bixos' ),
        'menu_name'                  => esc_html__( 'Categories', 'bixos' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array('slug'=>$cat_slug),
        'hierarchical'  => true,
    );
    register_taxonomy( 'gallery_category', 'gallery', $args );
}