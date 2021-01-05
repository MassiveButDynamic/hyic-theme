<?php 
get_header(); 
?>
<div id='top-section'>
        <div class='background'>
                <svg height='100%' width='100%' viewbox='0 0 200 100' preserveAspectRatio='none'>
                        <polygon points="75,100 200,0 200,100" style='fill: white;'/>
                </svg>
        </div>
        <div class='text'>
                <div class='top'>
                        <img src='./wp-content/themes/hyic-theme/assets/HB_YIC_Logo_Komplett_SW.png'>
                        <h1><?php bloginfo('description'); ?></h1>
                </div>
                <div class='bottom'>
                        <?php wp_nav_menu(array('menu'=>'top')); ?>
                </div>
        </div>
</div>
<div id='main-wrapper'>      
        <main>
                <?php 
                if ( have_posts() ) {
                        while ( have_posts() ) {
                        the_post();
                        the_content();
                        } // end while
                } // end if
                ?>
        <main>
</div>
<?php get_footer(); ?>