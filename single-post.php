<?php
/**
 * Template Name: Standard-Seite
 */

get_header();

the_post();
?>
<div class='single-post-thumbnail-header'>
    <?php the_post_thumbnail('original'); ?>
</div>
<div id='main-wrapper' class='single-post'>
    <main>
        <h1><?php the_title(); ?></h1>
        <time><?php the_date(); ?></time>
        <?php the_content(); ?>
    </main>
</div>
<?php get_footer(); ?>
