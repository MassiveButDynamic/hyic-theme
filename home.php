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
        <?php my_own_posts_pagination(array(
            'screen_reader_text' => __(' ')
        )); 
        
        
        function my_own_posts_pagination( $args = array() ) {
            $navigation = '';
         
            // Don't print empty markup if there's only one page.
            if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
                // Make sure the nav element has an aria-label attribute: fallback to the screen reader text.
                if ( ! empty( $args['screen_reader_text'] ) && empty( $args['aria_label'] ) ) {
                    $args['aria_label'] = $args['screen_reader_text'];
                }
         
                $args['prev_next'] = true;
                $args = wp_parse_args(
                    $args,
                    array(
                        'mid_size'           => 1,
                        'prev_text'          => _x( 'Previous', 'previous set of posts' ),
                        'next_text'          => _x( 'Next', 'next set of posts' ),
                        'screen_reader_text' => __( 'Posts navigation' ),
                        'aria_label'         => __( 'Posts' ),
                        'class'              => 'pagination',
                    )
                );
         
                // Make sure we get a string back. Plain is the next best thing.
                if ( isset( $args['type'] ) && 'array' === $args['type'] ) {
                    $args['type'] = 'plain';
                }
                $args['prev_next'] = false;

                // Set up paginated links.
                $links = paginate_links( $args );

                $currentPageNumber = (get_query_var('paged')) ? get_query_var('paged') : 1;

                if($currentPageNumber > 1) $links = '<a class="prev page-numbers" href="'.get_pagenum_link($currentPageNumber-1).'">'.$args['prev_text'].'</a>'.$links;
                else $links = '<span class="prev page-numbers disabled">'.$args['prev_text'].'</span>'.$links;
                
                if($currentPageNumber < $GLOBALS['wp_query']->max_num_pages) $links = $links.'<a class="next page-numbers" href="'.get_pagenum_link($currentPageNumber+1).'">'.$args['next_text'].'</a>';
                else $links = $links.'<span class="next page-numbers disabled">'.$args['next_text'].'</span>';
         
                if ( $links ) {
                    $navigation = _navigation_markup( $links, $args['class'], $args['screen_reader_text'], $args['aria_label'] );
                }
            }
         
            //
            echo $GLOBALS['wp_query']->paged;
            echo $navigation;
        }
        ?>
    </main>
</div>
<?php get_footer(); ?>
