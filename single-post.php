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
<?php
    $title = get_the_title();
    $thumbnail = get_the_post_thumbnail_url();
    $dateModified = get_the_modified_date('c');
    $datePublished = get_the_date('c');

    echo("
    <script type='application/ld+json'>
        {
            \"@context\": \"https://schema.org\", 
            \"@type\": \"NewsArticle\", 
            \"headline\": \"$title\", 
            \"image\": [ \"$thumbnail\"],
            \"datePublished\": \"$datePublished\",
            \"dateModified\": \"$dateModified\"
        }
    </script>");
?>
<?php get_footer(); ?>
