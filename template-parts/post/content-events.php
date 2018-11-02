<?php // Post fetch
$eventtime = get_field('event_date');
$currenttime = current_time('Y-m-d');
$event_upcoming = $eventtime >= $currenttime;

$time_date = date('l jS F, Y', strtotime($eventtime));
$time_start = get_field('event_timestart');
$time_end = get_field('event_timeend');

$venue_name = get_field ('event_venuename');
$venue_address = get_field ('event_venueaddress');
$venue_map = get_field ('event_venuemap');

$event_special = get_field('event_special');
$event_theme = get_field('event_theme');

$header_date = date('F Y', strtotime($eventtime));
?>


<article>
        <?php if ($event_upcoming == true): ?>
                <span class="pretitle">Upcoming Event</span>
        <?php else: ?>
                <span class="pretitle">Past Event</span>
        <?php endif; ?>

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <div class="event-split">
                <div class="container">
                        <dl id="event-timeplace">
                                <dt>Date</dt>
                                <dd>
                                        <time datetime="<?php echo $eventtime;?>"><?php echo $time_date ?></time>
                                        <br><?php echo $time_start . ' &ndash; ' . $time_end; ?>
                                </dd>
                                <dt>Venue</dt>
                                <dd>
                                        <p><?php echo $venue_name ?></p>
                                        <p><?php echo $venue_address ?>
                                        <br><a href="<?php echo $venue_map;?>" target="_blank" rel="noopener noreferrer">View on map</a></p>
                                </dd>
                                <?php if (!is_single()): ?>
                                        <dt><?php if($event_special) echo 'Special Jam'; else echo 'Theme'; ?></dt>
                                        <dd><?php echo $event_theme; ?></dd>
                                <?php endif; ?>
                        </dl>
                </div>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
        </div>
        <?php if (is_single()): ?>
                <h3 id="event-activities">Activities for <?php echo $header_date . ': ' . $event_theme; ?></h3>
                <?php the_field('event_activities'); ?>
                <h3>Schedule</h3>
                <?php the_field('event_schedule'); ?>
                <h3 id="event-registration">Tickets</h3>
                <?php the_field('event_ticketembed'); ?>
                <p><a href="<?php the_field(event_ticketlink); ?>" target="_blank" rel="noopener noreferrer">Eventbrite page</a></p>
                <h3>Notices</h3>
                <?php the_field('general_notices'); ?>
        <?php else: ?>
                <a href="<?php the_permalink(); ?>" class="more-link">View details</a>
        <?php endif; ?>
</article>
