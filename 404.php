<?php
/**
 * Template Name: 404-Seite
 */

get_header();
?>
<div id='main-wrapper' class='404-page'>
    <main>
        <h1>Seite nicht gefunden</h1>
        <p>Unter diesem Link haben wir leider keine Seite gefunden.</p><p>Falls du jetzt nicht mehr weißt, wo's lang geht, ist <a href='<?php echo get_home_url();?>'>hier</a> der Link zur Homepage.</p>
    </main>
</div>
<?php get_footer(); ?>
