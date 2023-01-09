<?php
class Themesflat_Recent_Post_Portfolio extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return Themesflat_Recent_Post_Portfolio
     */
    function __construct() {
        $this->defaults = array(
            'title' 	=> 'Recent Posts', 
            'category'  => '',
            'ids'  => '',
            'count' 	=> 4,
            'show_thumbnail' => true,
            'show_content' => false,
            'show_date' => false,
            'show_author' => false,
            'show_comment' => false,
            'show_button' => false           
        );
        parent::__construct(
            'widget_recent_post_portfolio',
            esc_html__( 'Themesflat - Recent Blogs Portfolios', 'bixos' ),
            array(
                'classname'   => 'widget-recent-blogs-portfolio',
                'description' => esc_html__( 'Recent Blogs Portfolios', 'bixos' )
            )
        );
    }

    /**
     * Display widget
     */
    function widget( $args, $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $instance );
        extract( $args );        
        $query_args = array(
            'post_type' => 'portfolios',
            'posts_per_page' => intval($count)
        );
        if ( !empty( $category ) )
            $query_args['tax_query'] = array(
                array(
                    'taxonomy' => 'portfolios_category',
                    'terms'    => $category,
                ),
            );      
        if ($ids !=  '')       {
            $query_args['post__in'] = explode(",",$ids);
             $query_args['orderby'] = 'post__in';
        }
        $flat_post = new WP_Query( $query_args );
        $classes[] = 'recent-news';
        $classes[] = $show_thumbnail != 1 ? 'no-thumbnail' : '';
        echo wp_kses_post( $before_widget );
		if ( !empty($title) ) { echo wp_kses_post($before_title).esc_html($title).wp_kses_post($after_title); } ?>		
        <ul class="<?php echo esc_attr(implode(' ', $classes)) ;?> clearfix">  
		<?php if ( $flat_post->have_posts() ) : ?>
			<?php while ( $flat_post->have_posts() ) : $flat_post->the_post(); ?>
				<li class="clearfix">
                    <?php if ( has_post_thumbnail() && $show_thumbnail == 1) : ?>
                    <div class="thumb">
                        <span class="overlay-pop"></span>
                        <a href="<?php the_permalink(); ?>">
                        <?php 
                        the_post_thumbnail( 'thumbnail' );
                        ?>
                        </a>
                    </div>
                    <?php endif; ?>                       
                    <div class="text">   
                    <?php if ( $show_author ) : ?>
                        <span class="post-author"><?php printf('<i class="meta-icon bixos-icon-admin" aria-hidden="true"></i><a class="meta-text" href="%s" title="%s" rel="author">%s',esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),esc_attr( sprintf( esc_html__( 'View all posts by %s', 'bixos' ), get_the_author() ) ),get_the_author());?></a></span>
                        <?php endif; ?>
                        <?php if ( $show_comment ) : ?>
                        <span class="post-comment"><i class="bixos-icon-comment"></i> <?php comments_popup_link( esc_html__( '0 Comm', 'bixos' ), esc_html__(  '1 Comm', 'bixos' ), esc_html__( '% Comm', 'bixos' ) ); ?></span>
                        <?php endif; ?>      
                         
                        <div class="post-category">
							<?php echo the_terms( get_the_ID(), 'portfolios_category', '', ' , ', '' ); ?>
						</div>   
                                                          
                        <?php the_title( sprintf( '<h6><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>                        
                        <?php if ( $show_content ) : ?>
                        <p class="desc"><?php echo wp_trim_words( get_the_content(), 8, '...' ); ?></p>
                        <?php endif; ?>
                        <?php if ( $show_date ) : ?>
                        <time class="post-date date updated" datetime="<?php esc_attr(the_time( 'c' )); ?>"><i class="far fa-calendar-alt"></i> <?php the_time( 'F d, Y' ); ?></time>
                        <?php endif; ?>    
                        <?php if ( $show_button ) : ?>
                        <?php echo '<a class="btn-themesflat" href="'.get_the_permalink().'" rel="nofollow">'.themesflat_get_opt( 'blog_archive_readmore_text').'</a>' ?>
                        <?php endif; ?>
                                           
                    </div><!-- /.text -->                        
			    </li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php else : ?>  
            <?php printf( '<li>%s</li>',esc_html__('Oops, category not found.', 'bixos' )); ?>
		<?php endif; ?>        
        </ul>		
		<?php echo wp_kses_post( $after_widget );
    }

    /**
     * Update widget
     */
    function update( $new_instance, $old_instance ) {
        $instance               = $old_instance;
        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['ids']      = ( $new_instance['ids'] );
        $instance['count']      =  intval($new_instance['count']);
        $instance['show_thumbnail']     =  (bool) $new_instance['show_thumbnail'] ;
        $instance['show_date']     = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        $instance['show_content']     = isset( $new_instance['show_content'] ) ? (bool) $new_instance['show_content'] : false;
        $instance['show_comment']     = isset( $new_instance['show_comment'] ) ? (bool) $new_instance['show_comment'] : false;   
        $instance['show_author']     = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false; 
        $instance['show_button']     = isset( $new_instance['show_button'] ) ? (bool) $new_instance['show_button'] : false;     
        $instance['category']           = array_filter( $new_instance['category'] );        
        return $instance;
    }

    /**
     * Widget setting
     */
    function form( $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        $show_content = $instance['show_content'] ? "checked" : "";
        $show_content   = isset( $instance['show_content'] ) ? (bool) $instance['show_content'] : false;
        $show_thumbnail   = isset( $instance['show_thumbnail'] ) ? (bool) $instance['show_thumbnail'] : true;
        $show_date = $instance['show_date'] ? "checked" : "";
        $show_date   = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        $show_comment = $instance['show_comment'] ? "checked" : "";
        $show_comment   = isset( $instance['show_comment'] ) ? (bool) $instance['show_comment'] : false;
        $show_author = $instance['show_author'] ? "checked" : "";
        $show_author   = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : false;
        $show_button = $instance['show_button'] ? "checked" : "";
        $show_button   = isset( $instance['show_button'] ) ? (bool) $instance['show_button'] : false;

        if (empty($instance['category'])) {                    
            $instance['category'] = array("1");
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'bixos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category:', 'bixos' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>[]">
                <option value=""<?php selected( empty( $instance['category'] ) ); ?>><?php esc_html_e( 'All', 'bixos' ); ?></option>
                <?php               
                $categories = get_categories();
                foreach ($categories as $category) {
                    printf('<option value="%1$s" %4$s>%2$s (%3$s)</option>', esc_attr($category->term_id), esc_attr($category->name), esc_attr($category->count), (in_array($category->term_id, $instance['category'] )) ? 'selected="selected"' : '');
                }               
                ?>
            </select>
        </p>
      <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>"><?php esc_html_e( 'Get Post by IDS EX:1,2,3', 'bixos' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ids' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['ids'] ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Count:', 'bixos' ); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" value="<?php echo esc_attr( $instance['count'] ); ?>">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_thumbnail ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumbnail' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>"><?php esc_html_e( 'Show Thumbnail ?', 'bixos' ) ?></label>
        </p>  
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_content ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_content' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_content' ) ); ?>"><?php esc_html_e( 'Show Content ?', 'bixos' ) ?></label>
        </p>       
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Show Date ?', 'bixos' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_comment ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_comment' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>"><?php esc_html_e( 'Show Comment ?', 'bixos' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_author ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_author' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>"><?php esc_html_e( 'Show Author ?', 'bixos' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_button ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_button' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_button' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_button' ) ); ?>"><?php esc_html_e( 'Show Button ?', 'bixos' ); ?></label>
        </p>
    <?php
    }
}

add_action( 'widgets_init', 'themesflat_register_recent_post_portfolio' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_recent_post_portfolio() {
    register_widget( 'Themesflat_Recent_Post_Portfolio' );
}