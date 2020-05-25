<?php get_header(); 
$sections = explode(',', get_theme_mod('homepage_sections_order'));
?>
Das hier ist die Homepage.<br>

<?php 
foreach($sections as $section) {
    $located = locate_template( 'template-parts/homepage-sections/'.$section.'.php' );
    if ( !empty( $located ) ) {
        get_template_part('template-parts/homepage-sections/'.$section);
    }
}
 ?>
<?php get_footer(); ?>