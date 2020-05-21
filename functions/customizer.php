<?php
    add_action('customize_register', 'hyic_customizer_settings');
    function hyic_customizer_settings( $wp_customize ) {

        // HOMEPAGE-SECTIONS PANEL
        $wp_customize->add_panel('homepage_sections', array(
            'title' => 'Homepage Sections',
            'priority' => 42
        ));

        $wp_customize->add_section('wir', array(
            'title' => 'Wir',
            'priority'=>30,
            'panel'=>'homepage_sections'
        ));
    
        $wp_customize->add_setting('wir_homepage_heading', array(
            'default' => 'Wir',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control('wir_homepage_heading', array(
            'type'=>'text',
            'label'=>'Wir-Section Überschrift',
            'section'=>'wir'
        ));

        $wp_customize->add_setting('wir_homepage_text', array(
            'default' => 'Wir sind eine Gruppe aus Jugendlichen, die bei Hammerbrooklyn die junge Generation vertreten und Innovation aus einem anderen Blickwinkel schaffen wollen.',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control('wir_homepage_text', array(
            'type'=>'textarea',
            'label'=>'Wir-Section Text',
            'section'=>'wir'
        ));
    }
?>