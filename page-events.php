<?php
/**
 * Template Name: Eventübersicht
 */

get_header();

$args = array(
    'post_type'      => 'hyic_event',
    'posts_per_page' => -1,
);
$loop = new WP_Query($args);

?>
<h1><?php the_title(); ?></h2>
<div id='events'>
    <?php
    while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
        <a class='event' href='<?php the_permalink();?>'>
            <div class='image'><?php //the_post_thumbnail(); ?></div>
            <div class='text'>
                <h2><?php the_title(); ?></h2>
                <div class='description'><?php the_excerpt(); ?></div>
                <p><?php 
                    $isAllDay = get_post_custom_values('_hyic_event_all_day', get_the_ID())[0]=='true';
                    $eventStartDate = new DateTime(get_post_custom_values('_hyic_event_start_date', get_the_ID())[0]);
                    $eventStartTime = get_post_custom_values('_hyic_event_start_time', get_the_ID())[0];
                    $eventEndDate = new DateTime(get_post_custom_values('_hyic_event_end_date', get_the_ID())[0]);
                    $eventEndTime = get_post_custom_values('_hyic_event_end_time', get_the_ID())[0];
                    $registrationDeadline = get_post_custom_values('_hyic_event_registration_deadline', get_the_ID())[0];

                    echo $eventStartDate->format('d.m.').' ';
                    if(!$isAllDay) echo $eventStartTime.' Uhr ';
                    if($eventStartDate!=$eventEndDate) echo 'bis '.$eventEndDate->format('d.m.Y').' ';
                    if(!$isAllDay) echo 'bis '.$eventEndTime.' Uhr';
                ?></p>
            </div>
        </a>
        <?php
    }
    ?>
</div>

<?php get_footer(); ?>
