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
            Das Event 
            <?php 
                $isAllDay = get_post_custom_values('_hyic_event_all_day', get_the_ID())[0]=='true';
                $eventStartDate = new DateTime(get_post_custom_values('_hyic_event_start_date', get_the_ID())[0]);
                $eventStartTime = get_post_custom_values('_hyic_event_start_time', get_the_ID())[0];
                $eventEndDate = new DateTime(get_post_custom_values('_hyic_event_end_date', get_the_ID())[0]);
                $eventEndTime = get_post_custom_values('_hyic_event_end_time', get_the_ID())[0];
                $registrationDeadline = new DateTime(get_post_custom_values('_hyic_event_registration_deadline', get_the_ID())[0]);
                $registrationLink = get_post_custom_values('_hyic_event_registration_link', get_the_ID())[0];

                $today = new DateTime('today');

                echo apply_filters('hyic_assemble_event_date_string', get_the_ID(), true);
            ?>
            statt.</br>
            <?php if($registrationDeadline<$today && $eventEndDate>=$today){ ?>
                Die Anmeldephase ist bereits vorbei.
            <?php } else if($eventEndDate>=$today) { ?>
            Anmelden kannst du dich bis zum <?php echo $registrationDeadline->format('d.m.') ?><br><br>
            <a class='hyic-primary-button' target='_blank' href='<?php echo $registrationLink ?>'>Zur Anmeldung</a>
            <?php } ?>
            </p>
            <br>
        </div>
    </main>
</div>
<?php
    $title = get_the_title();
    $excerpt = get_the_excerpt();
    $thumbnail = get_the_post_thumbnail_url();
    $startDate = (new DateTime($eventStartDate->format('d.m.Y').' '.$eventStartTime))->format('c');
    $endDate = (new DateTime($eventEndDate->format('d.m.Y').' '.$eventEndTime))->format('c');

    echo("
    <script type=\"application/ld+json\">
    {
        \"@context\": \"https://schema.org\",
        \"@type\": \"Event\",
        \"name\": \"$title\",
        \"startDate\": \"$startDate\",
        \"endDate\": \"$endDate\",
        \"eventAttendanceMode\": \"https://schema.org/OfflineEventAttendanceMode\",
        \"eventStatus\": \"https://schema.org/EventScheduled\",
        \"location\": {
          \"@type\": \"Place\",
          \"name\": \"Hammerbrooklyn.DigitalCampus\",
          \"address\": {
            \"@type\": \"PostalAddress\",
            \"streetAddress\": \"Stadtdeich 2-4\",
            \"addressLocality\": \"Hamburg\",
            \"postalCode\": \"20097\",
            \"addressRegion\": \"DE\",
            \"addressCountry\": \"DE\"
          }
        },
        \"image\": [
          \"$thumbnail\"
         ],
        \"description\": \"$excerpt\"
    }
    </script>");
?>
<?php
    endwhile; 
endif; 

get_footer();
?>