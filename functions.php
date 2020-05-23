<?php
    include('functions/customizer.php');

    if(!function_exists('hyic_setup')) :

        function hyic_setup() {
            register_nav_menus( array(
                'top'   => __( 'Top Menu', 'hyic' ),
                'footer'   => __( 'Footer Menu', 'hyic' ),
            ) );

        }

    endif; 
    add_action( 'after_setup_theme', 'hyic_setup' );    
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support('post-thumbnails');

    wp_enqueue_style( 'projects', get_template_directory_uri().'/css/projects.css' )
?>