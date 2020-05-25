<?php
get_header();

if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
?>
    <h1><?php the_title();?></h1>
    <div class='content'>
        <?php the_content(); ?>
        <br>
        <?php 
            $isAllDay = get_post_custom_values('_hyic_event_all_day', get_the_ID())[0]=='true';
            $eventStartDate = new DateTime(get_post_custom_values('_hyic_event_start_date', get_the_ID())[0]);
            $eventStartTime = get_post_custom_values('_hyic_event_start_time', get_the_ID())[0];
            $eventEndDate = new DateTime(get_post_custom_values('_hyic_event_end_date', get_the_ID())[0]);
            $eventEndTime = get_post_custom_values('_hyic_event_end_time', get_the_ID())[0];
            $registrationDeadline = new DateTime(get_post_custom_values('_hyic_event_registration_deadline', get_the_ID())[0]);
            $registrationLink = get_post_custom_values('_hyic_event_registration_link', get_the_ID())[0];

            $today = new DateTime('today');

            echo $eventStartDate->format('d.m.').' ';
            if(!$isAllDay) echo $eventStartTime.' Uhr ';
            if($eventStartDate!=$eventEndDate) echo 'bis '.$eventEndDate->format('d.m.Y').' ';
            if(!$isAllDay) echo 'bis '.$eventEndTime.' Uhr';
        ?>
        <br>
        <?php if($registrationDeadline<$today){ ?>
            Anmeldephase vorbei.
        <?php } else { ?>
        Anmeldung bis zum <?php echo $registrationDeadline->format('d.m.') ?><br>
        <a target='_blank' href='<?php echo $registrationLink ?>'>Jetzt anmelden</a>
        <?php } ?>
    </div>
<?php
    endwhile; 
endif; 

get_footer();
?>