<?php
/**
 * Template Name: Projektübersicht
 */

get_header();

$args = array(
    'post_type'      => 'hyic_project',
    'posts_per_page' => -1,
);
$loop = new WP_Query($args);

?>
<h1><?php the_title(); ?></h2>
<div id='projects'>
    <?php
    while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
        <a class='project' href='<?php the_permalink();?>'>
        
            <div class='image'><?php the_post_thumbnail(); ?></div>
            <div class='text' style='background-color: <?php echo get_post_custom_values('_hyic_project_tile_color', get_the_ID())[0];?>'>
                <h2><?php the_title(); ?></h2>
                <div class='description'><?php the_excerpt(); ?></div>
            </div>
        </a>
        <?php
    }
    ?>
</div>

<?php get_footer(); ?>
