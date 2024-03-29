<?php
/**
 * Template Name: Eventübersicht
 */

get_header();

$args = array(
    'post_type'      => 'hyic_event',
    'posts_per_page' => -1
);
$loop = new WP_Query($args);

function order_events_by_startdate($a, $b) {
    $aStart = new DateTime(get_post_custom_values('_hyic_event_start_date', $a->ID)[0]);
    $bStart = new DateTime(get_post_custom_values('_hyic_event_start_date', $b->ID)[0]);

    return ($aStart>$bStart) ? -1 : 1;
}

usort($loop->posts, 'order_events_by_startdate');

$today = new DateTime('today');

?>
<div id='main-wrapper'>
    <main>
        <h1><?php the_title(); ?></h2>
        <div id='events'>
            <h2>Aktuell</h2>
            <div class='hyic-event-carousel-wrapper'>
                    <?php
                    while ( $loop->have_posts() ) {
                        $loop->the_post();

                        $isAllDay = get_post_custom_values('_hyic_event_all_day', get_the_ID())[0]=='true';
                        $eventStartDate = new DateTime(get_post_custom_values('_hyic_event_start_date', get_the_ID())[0]);
                        $eventStartTime = get_post_custom_values('_hyic_event_start_time', get_the_ID())[0];
                        $eventEndDate = new DateTime(get_post_custom_values('_hyic_event_end_date', get_the_ID())[0]);
                        $eventEndTime = get_post_custom_values('_hyic_event_end_time', get_the_ID())[0];
                        $registrationDeadline = new DateTime(get_post_custom_values('_hyic_event_registration_deadline', get_the_ID())[0]);

                        if($eventEndDate<$today) {continue;}

                        ?>
                        <div class='hyic-event-card'>
                        <div class='hyic-event-card-image-wrapper'>
                            <img src='<?php echo wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'post-thumbnail' ); ?>'></img>
                        </div>
                        <div class='hyic-event-card-text-wrapper'>
                            <span class='hyic-event-card-title'><?php the_title(); ?></span>
                            <span class='hyic-event-card-time'>
                                <?php echo apply_filters('hyic_assemble_event_date_string', get_the_ID(), false); ?>
                            </span>
                            <span class='hyic-event-card-deadline'><span>Anmeldung bis:</span><br><span class='date'><?php echo $registrationDeadline->format('d.m.')?></span></span>
                        </div>
                        <?php
                        if($registrationDeadline<$today):
                            ?>
                            <a class='hyic-event-card-button more-info' href='<?php the_permalink();?>'>
                                <span>Mehr erfahren</span>
                            </a>
                            <?php
                            else:
                            ?>
                            <a class='hyic-event-card-button' href='<?php the_permalink();?>'>
                                <span>Jetzt anmelden</span>
                            </a>
                            <?php
                        endif;
                        ?>
                        </div>
                    <?php
                    }
                    ?>
            </div>
            <h2>Vergangene Events</h2>
            <div class='hyic-event-carousel-wrapper'>
            <?php
            while ( $loop->have_posts() ) {
                $loop->the_post();
                $isAllDay = get_post_custom_values('_hyic_event_all_day', get_the_ID())[0]=='true';
                $eventStartDate = new DateTime(get_post_custom_values('_hyic_event_start_date', get_the_ID())[0]);
                $eventStartTime = get_post_custom_values('_hyic_event_start_time', get_the_ID())[0];
                $eventEndDate = new DateTime(get_post_custom_values('_hyic_event_end_date', get_the_ID())[0]);
                $eventEndTime = get_post_custom_values('_hyic_event_end_time', get_the_ID())[0];
                $registrationDeadline = new DateTime(get_post_custom_values('_hyic_event_registration_deadline', get_the_ID())[0]);

                if($eventEndDate>=$today) {continue;}

                ?>
                <div class='hyic-event-card'>
                    <div class='hyic-event-card-image-wrapper'>
                        <img src='<?php echo wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'post-thumbnail' ); ?>'></img>
                    </div>
                    <div class='hyic-event-card-text-wrapper'>
                        <span class='hyic-event-card-title'><?php the_title(); ?></span>
                        <span class='hyic-event-card-time'>
                            <?php echo apply_filters('hyic_assemble_event_date_string', get_the_ID(), false); ?>
                            </span>
                        <span class='hyic-event-card-deadline'><span class='excerpt'><?php the_excerpt();?></span></span>
                    </div>
                    <a class='hyic-event-card-button more-info' href='<?php the_permalink();?>'>
                        <span>Mehr erfahren</span>
                    </a>
                    </div>
                <?php
                }
                ?>
                </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
