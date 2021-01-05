<?php
add_action( 'customize_register', 'cd_customizer_settings' );
function cd_customizer_settings( $wp_customize ) {
    // $wp_customize->add_section( 'cd_colors' , array(
    //     'title'      => 'Colors',
    //     'priority'   => 30,
    // ) );
    // $wp_customize->add_setting( 'background_color' , array(
    //     'default'     => '#43C6E4',
    //     'transport'   => 'refresh',
    // ) );
    // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
    //     'label'        => 'Background Color',
    //     'section'    => 'cd_colors',
    //     'settings'   => 'background_color',
    // ) ) );

    // $wp_customize->add_setting( 'test_setting' , array(
    //     'default' => '#000000',
    //     'transport'   => 'refresh',
    // ) );
    // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'test_setting', array(
    //     'label' => __( 'Featured Home Page Image', 'veloautonomus' ),
    //     'section' => 'cd_colors',
    //     'mime_type' => 'image',
    //   ) ) );

    $wp_customize->add_section('logos', array(
        'title' => 'Logos',
        'priority'=>30
    ));

    $wp_customize->add_setting('menu_logo', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_logo', array(
        'label' => __( 'Logo im Menü', 'hyic' ),
        'description' => 'Das Logo, das im Menü angezeigt wird',
        'section' => 'logos',
        'mime_type' => 'image',
    ) ) );

    // $wp_customize->add_setting('copyright_year', array(
    //     'default' => '2020',
    //     'transport' => 'refresh'
    // ));
    // $wp_customize->add_control('copyright_year', array(
    //     'type'=>'text',
    //     'label'=>'Copyright Year',
    //     'section'=>'footer'
    // ));
}
?>
