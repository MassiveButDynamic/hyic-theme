<?php
/**
 * Template Name: Standard-Seite
 */

get_header();

?>
<div id='main-wrapper'>
    <main>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </main>
</div>
<?php get_footer(); ?>
