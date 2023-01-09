<?php 
$header_search_box = themesflat_get_opt('header_search_box');
if (themesflat_get_opt_elementor('header_search_box') != '') {
    $header_search_box = themesflat_get_opt_elementor('header_search_box');
}
$header_wishlist_icon = themesflat_get_opt('header_wishlist_icon');
if (themesflat_get_opt_elementor('header_wishlist_icon') != '') {
    $header_wishlist_icon = themesflat_get_opt_elementor('header_wishlist_icon');
}
$header_cart_icon = themesflat_get_opt('header_cart_icon');
if (themesflat_get_opt_elementor('header_cart_icon') != '') {
    $header_cart_icon = themesflat_get_opt_elementor('header_cart_icon');
}
$header_sidebar_toggler = themesflat_get_opt('header_sidebar_toggler');
if (themesflat_get_opt_elementor('header_sidebar_toggler') != '') {
    $header_sidebar_toggler = themesflat_get_opt_elementor('header_sidebar_toggler');
}
?>
<?php get_template_part( 'tpl/topbar'); ?>
<header id="header" class="header header-default <?php echo themesflat_get_opt_elementor('extra_classes_header'); ?>">
    <div class="inner-header">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrap clearfix">
                        <div class="header-ct-left"><?php get_template_part( 'tpl/header/brand'); ?></div>
                        <div class="header-ct-center"><?php get_template_part( 'tpl/header/navigator'); ?></div>
                        <div class="header-ct-right">
                            <?php  
                                if ( themesflat_get_opt('social_header') == 1 ):
                                    themesflat_render_social();    
                                endif;
                            ?>

                            <?php if ( themesflat_get_opt('header_info_phone_text') != '' || themesflat_get_opt('header_info_phone_number') != '' ) :?>
                            <div class="info-header">
                                <div class="icon-info">
                                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 14.44C0.266667 14.56 0.626667 14.7267 1.08 14.94V11.64C0.626667 11.8533 0.266667 12.02 0 12.14V14.44ZM15.68 3.38C13.72 1.66 11.3267 1.01333 8.5 1.44C7.24667 1.61333 6.09333 2.06667 5.04 2.8C4.01333 3.52 3.2 4.42 2.6 5.5C1.97333 6.60667 1.64 7.78667 1.6 9.04C1.57333 9.98667 1.56667 11.4133 1.58 13.32L1.6 15.46C1.6 15.82 1.71333 16.1133 1.94 16.34C2.18 16.5667 2.48 16.68 2.84 16.68C3.21333 16.6933 3.78 16.7 4.54 16.7C4.98 16.6867 5.31333 16.5667 5.54 16.34C5.78 16.1133 5.9 15.78 5.9 15.34V11.26C5.9 10.8067 5.78 10.46 5.54 10.22C5.3 9.98 4.95333 9.86 4.5 9.86H3C2.93333 7.06 4.00667 5.01333 6.22 3.72C7.52667 2.94667 8.84 2.58 10.16 2.62C11.4933 2.64667 12.8 3.07333 14.08 3.9C16.1067 5.23333 17.08 7.22 17 9.86H15.46C15.0467 9.86 14.72 9.98 14.48 10.22C14.24 10.4467 14.12 10.7733 14.12 11.2C14.1067 12.5733 14.1067 13.9533 14.12 15.34C14.12 15.7667 14.2333 16.0933 14.46 16.32C14.6867 16.5467 15.0067 16.6667 15.42 16.68C15.7667 16.6933 16.2933 16.7 17 16.7C17.9333 16.6867 18.4 16.2067 18.4 15.26V13.26C18.4133 11.4867 18.4133 10.1533 18.4 9.26C18.3867 6.92667 17.48 4.96667 15.68 3.38ZM20 12.42C20 12.4067 19.9933 12.3867 19.98 12.36C19.9667 12.24 19.94 12.1667 19.9 12.14C19.7 12.0067 19.3733 11.8267 18.92 11.6V14.94L19.2 14.8C19.4267 14.6667 19.5933 14.58 19.7 14.54C19.82 14.4867 19.9 14.4267 19.94 14.36C19.98 14.2933 20 14.2 20 14.08C19.9867 13.8267 19.9867 13.46 20 12.98V12.42Z" fill="white"/>
                                    </svg>

                                </div>
                                <div class="content">
                                    <a class="phone" href="tel:<?php echo esc_attr(themesflat_get_opt('header_info_phone_number')) ?>"><?php echo themesflat_get_opt('header_info_phone_number'); ?></a> 
                                </div>                                
                            </div>
                            <?php endif;?>

                            <?php if ( themesflat_get_opt('header_button_text') != '' && themesflat_get_opt('header_button_url') != '' ) :?>
                            <div class="wrap-btn-header draw-border">
                                <a class="btn-header" href="<?php echo esc_url(themesflat_get_opt('header_button_url')) ?>"><?php echo themesflat_get_opt('header_button_text'); ?></a> 
                            </div>
                            <?php endif;?>

                            <?php if ( $header_sidebar_toggler == 1 ) :?>
                            <div class="header-modal-menu-left-btn">
                                <div class="modal-menu-left-btn">
                                    <svg enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m5 0h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m5 9h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m5 18h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m14 0h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m14 9h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m14 18h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m23 0h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m23 9h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/><path d="m23 18h-4c-.552 0-1 .448-1 1v4c0 .552.448 1 1 1h4c.552 0 1-.448 1-1v-4c0-.552-.448-1-1-1z"/></svg>
                                </div>
                            </div><!-- /.header-modal-menu-left-btn -->
                            <?php endif;?>

                            <div class="btn-menu">
                                <span class="line-1"></span>
                            </div><!-- //mobile menu button -->
                        </div>
                    </div>                
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

    <div class="canvas-nav-wrap">
        <div class="overlay-canvas-nav"><div class="canvas-menu-close"><span></span></div></div>
        <div class="inner-canvas-nav">
            <?php get_template_part( 'tpl/header/brand-mobile'); ?>
            <nav id="mainnav_canvas" class="mainnav_canvas" role="navigation">
                <?php
                    wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false ) );
                ?>
            </nav><!-- #mainnav_canvas -->  
        </div>
    </div><!-- /.canvas-nav-wrap --> 
</header><!-- /.header --> 