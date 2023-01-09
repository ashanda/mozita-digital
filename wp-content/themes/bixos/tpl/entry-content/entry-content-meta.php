<?php  
/**
 * @package bixos
 */
?>
<?php 
echo '<div class="post-meta">';
    $meta_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'meta_elements' ));
    foreach ( $meta_elements as $meta_element ) :
        if ( 'author' == $meta_element ) {
            echo '<span class="item-meta post-author">';
                printf(
                '<i class="meta-icon bixos-icon-admin" aria-hidden="true"></i><a class="meta-text" href="%s" title="%s" rel="author">%s</a>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
                esc_attr( sprintf( esc_html__( 'View all posts by %s', 'bixos' ), get_the_author() ) ),get_the_author());
            echo '</span>';
        } elseif ( 'category' == $meta_element ) {
            echo '<span class="item-meta post-categories"><i class="meta-icon fas fa-tags" aria-hidden="true"></i>'.esc_html__("",'bixos');
                the_category( ', ' );
            echo '</span>';
        } elseif ( 'comment' == $meta_element ) {
            echo'<span class="item-meta post-comments"><i class="meta-icon bixos-icon-comment" aria-hidden="true"></i>';
                 comments_popup_link( esc_html__( '0 Comments', 'bixos' ), esc_html__(  '1 Comment', 'bixos' ), esc_html__( '% Comments', 'bixos' ) ); 
            echo '</span>';
        }
    endforeach;
echo '</div>';
?>