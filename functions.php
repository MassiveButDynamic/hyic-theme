<?php
    include('customizer.php');
    
    if(!function_exists('hyic_setup')) :

        function hyic_setup() {
            register_nav_menus( array(
                'top'   => __( 'Top Menu', 'hyic' ),
                'footer'   => __( 'Footer Menu', 'hyic' ),
            ) );

        }

    endif; 

    function remove_admin_login_header() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }
    add_action('get_header', 'remove_admin_login_header');

    add_action( 'after_setup_theme', 'hyic_setup' );    
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('post-thumbnails');

    wp_enqueue_style('theme', get_template_directory_uri().'/css/theme.css');
    wp_enqueue_style('front-page', get_template_directory_uri().'/css/front-page.css');
    wp_enqueue_style('hyic-event-carousel', get_template_directory_uri().'/css/hyic-event-carousel.css');
    wp_enqueue_style('menu', get_template_directory_uri().'/css/menu.css');
    
    //wp_enqueue_style('customizer', get_template_directory_uri().'/css/customizer.css');

    //wp_enqueue_script('jquery');
    //wp_enqueue_script('html5sortable', get_template_directory_uri().'/js/jquery.sortable.min.js')
?>