<?php
get_header();

if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
?>
<div class='single-post-thumbnail-header'>
    <?php the_post_thumbnail('original'); ?>
</div>
<div id='main-wrapper'>
    <main>
        <h1><?php the_title();?></h1>
        <div class='content'>
            <?php the_content(); ?>
            <br>
            <p>
            <b>Hier noch einmal kurz und knapp:</b></br>
            Das Event findet
            <?php 
                $isAllDay = get_post_custom_values('_hyic_event_all_day', get_the_ID())[0]=='true';
                $eventStartDate = new DateTime(get_post_custom_values('_hyic_event_start_date', get_the_ID())[0]);
                $eventStartTime = get_post_custom_values('_hyic_event_start_time', get_the_ID())[0];
                $eventEndDate = new DateTime(get_post_custom_values('_hyic_event_end_date', get_the_ID())[0]);
                $eventEndTime = get_post_custom_values('_hyic_event_end_time', get_the_ID())[0];
                $registrationDeadline = new DateTime(get_post_custom_values('_hyic_event_registration_deadline', get_the_ID())[0]);
                $registrationLink = get_post_custom_values('_hyic_event_registration_link', get_the_ID())[0];

                $today = new DateTime('today');

                if($eventStartDate==$eventEndDate) echo 'am ';
                else echo 'vom ';

                echo $eventStartDate->format('d.m.').' ';

                if($eventStartDate==$eventEndDate) echo ' von ';
                if(!$isAllDay) echo $eventStartTime.' Uhr ';
                if($eventStartDate!=$eventEndDate) echo 'bis zum '.$eventEndDate->format('d.m.Y').' ';
                if(!$isAllDay) echo 'bis '.$eventEndTime.' Uhr';
            ?>
            statt.</br>
            <?php if($registrationDeadline<$today){ ?>
                Die Anmeldephase ist bereits vorbei.
            <?php } else { ?>
            Anmelden kannst du dich bis zum <?php echo $registrationDeadline->format('d.m.') ?><br><br>
            <a class='hyic-primary-button' target='_blank' href='<?php echo $registrationLink ?>'>Zur Anmeldung</a>
            <?php } ?>
            </p>
            <br>
        </div>
    </main>
</div>
<?php
    endwhile; 
endif; 

get_footer();
?>