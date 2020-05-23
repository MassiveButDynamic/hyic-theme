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
        <a href='<?php the_permalink();?>'>
        <div class='project'>
            <div class='image'><?php the_post_thumbnail(); ?></div>
            <div class='text'>
                <h2><?php the_title(); ?></h2>
                <div class='description'><?php the_content(); ?></div>
            </div>
        </div>
        </a>
        <?php
    }
    ?>
</div>

<?php get_footer(); ?>
