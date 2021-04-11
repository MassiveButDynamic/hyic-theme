<!DOCTYPE html>
<html lang='de-DE'>
    <head>
        <title><?php bloginfo('name') ?></title>
        <meta name='description' content='<?php bloginfo('description') ?>'>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width'>
        <?php
            if(is_front_page() && get_theme_mod('og_image_link')) echo '<meta name="og:image" content="'.get_theme_mod('og_image_link').'">';
        ?>
        <?php wp_head() ?>
    </head>
    <body>
        <nav class='top-nav <?php if(is_front_page()) { echo('show-on-scroll'); }?>'>
            <a href='<?php echo get_home_url(); ?>'><img class='logo' src='<?php echo esc_url(get_theme_mod('menu_logo'));?>' alt='Das Logo des HYIC'></a>
            <?php wp_nav_menu(array('menu'=>'top')) ?>
            <div class='hamburger' onclick='toggleMobileNav()'><img src='<?php echo get_template_directory_uri(); ?>/assets/menu-24px.svg' alt='Hamburger-Menü'></div>
        </nav>
        <div id='mobilenav-wrapper'>
            <?php wp_nav_menu(array('menu'=>'top')) ?>
        </div>
        <div>
        <?php if(!is_front_page()){?>
            <div class='navbar-spacer'></div>
        <?php }?>
