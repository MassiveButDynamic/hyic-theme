<?php
/**
 * Template Name: News-Seite
 */

get_header();

?>
<div id='main-wrapper' class='news'>
    <main>
        <h1><?php single_post_title(); ?></h1>
        <ul>   
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 
                ?>
                    <li>
                        <div class='image-wrapper'>
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class='text-wrapper'>
                            <a href='<?php echo get_permalink(); ?>' class='title'><?php the_title(); ?></a><br>
                            <div class='date'><?php the_date(); ?></div>
                            <div class='excerpt'><?php the_excerpt(); ?></div>
                            <br>
                            <a class='read-more' href='<?php echo get_permalink(); ?>'>Weiterlesen</a>
                            <a class='read-more-mobile-button' href='<?php echo get_permalink(); ?>'><div>Weiterlesen</div></a>
                        </div>
                    </li>
                <?php
                endwhile; 
            endif; 
            ?>
        </ul>
    </main>
</div>
<?php get_footer(); ?>
