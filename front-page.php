<?php 
get_header(); 
?>
Das hier ist die Homepage.<br>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
        the_post();
        the_content();
	} // end while
} // end if
?>
<?php get_footer(); ?>