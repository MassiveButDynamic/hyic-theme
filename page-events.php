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

$today = new DateTime('today');

?>
<h1><?php the_title(); ?></h2>
<div id='events'>
    <h2>Aktuell</h2>
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
        <a class='event' href='<?php the_permalink();?>'>
            <div class='image'><?php //the_post_thumbnail(); ?></div>
            <div class='text'>
                <h3><?php the_title(); ?></h3>
                <div class='description'><?php the_excerpt(); ?></div>
                <p><?php 
                    echo $eventStartDate->format('d.m.').' ';
                    if(!$isAllDay) echo $eventStartTime.' Uhr ';
                    if($eventStartDate!=$eventEndDate) echo 'bis '.$eventEndDate->format('d.m.Y').' ';
                    if(!$isAllDay) echo 'bis '.$eventEndTime.' Uhr';
                ?></p>
            <?php if($registrationDeadline<$today){?>
                <p>Anmeldephase vorbei.</p>
            <?php } else {?>
                <p>Bis zum <?php echo $registrationDeadline->format('d.m.')?> anmelden!</p>
            <?php } ?>
            </div>
        </a>
        <?php
    }
    ?>
    <h2>Vergangene Events</h2>
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
        <a class='event' href='<?php the_permalink();?>'>
            <div class='image'><?php //the_post_thumbnail(); ?></div>
            <div class='text'>
                <h3><?php the_title(); ?></h3>
                <div class='description'><?php the_excerpt(); ?></div>
                <p><?php 
                    

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
