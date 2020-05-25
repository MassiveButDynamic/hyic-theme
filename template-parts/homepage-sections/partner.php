<section>
    <h2>Partner</h2>
    <?php
        $args = array(
            'post_type'      => 'hyic_partner',
            'posts_per_page' => -1,
        );
        $loop = new WP_Query($args);
        while ( $loop->have_posts() ) {
            $loop->the_post();

            echo '<a target="_blank" title="';
            the_title();
            echo '" href="'.get_post_custom_values('_hyic_partner_link', get_the_ID())[0].'">';
            the_post_thumbnail('thumbnail');
            echo '</a>';
        }
    ?>
</section>