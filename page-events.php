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
                        <!-- <a class='event' href='<?php the_permalink();?>'>
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
                        </a> -->
                        <div class='hyic-event-card'>
                        <div class='hyic-event-card-image-wrapper'>
                            <img src='<?php echo wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'post-thumbnail' ); ?>'></img>
                        </div>
                        <div class='hyic-event-card-text-wrapper'>
                            <span class='hyic-event-card-title'><?php the_title(); ?></span>
                            <span class='hyic-event-card-time'>
                                <?php 
                                        echo $eventStartDate->format('d.m.').' ';
                                        if(!$isAllDay) echo $eventStartTime.' Uhr ';
                                        if($eventStartDate!=$eventEndDate) echo 'bis '.$eventEndDate->format('d.m.Y').' ';
                                        if(!$isAllDay) echo 'bis '.$eventEndTime.' Uhr';
                                    ?>
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
                <!-- <a class='event' href='<?php the_permalink();?>'>
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
                </a> -->
                <div class='hyic-event-card'>
                    <div class='hyic-event-card-image-wrapper'>
                        <img src='<?php echo wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'post-thumbnail' ); ?>'></img>
                    </div>
                    <div class='hyic-event-card-text-wrapper'>
                        <span class='hyic-event-card-title'><?php the_title(); ?></span>
                        <span class='hyic-event-card-time'>
                            <?php 
                                    echo $eventStartDate->format('d.m.').' ';
                                    if(!$isAllDay) echo $eventStartTime.' Uhr ';
                                    if($eventStartDate!=$eventEndDate) echo 'bis '.$eventEndDate->format('d.m.Y').' ';
                                    if(!$isAllDay) echo 'bis '.$eventEndTime.' Uhr';
                                ?>
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
