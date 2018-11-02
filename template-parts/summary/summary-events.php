<?php

$summary_query = new WP_Query(
        array (
                'post_type' => 'events',
                'post_status' => 'publish',
                /*'posts_per_page' => 2,*/
                'meta_query' => array (
                        'key' => 'event_date',
                        'value' => current_time('Y-m-d'),
                        'compare' => '>=',
                        'type' => 'DATE'
                ),
                'order' => 'ASC',
                'orderby' => 'meta_value',
                'meta_key' => 'event_date'
        ));

if ($summary_query -> have_posts()):
        ?>
        <div id="summary-events">
        <h2>Upcoming Events</h2>
        <?php
        while ($summary_query -> have_posts()):
                $summary_query -> the_post();

                $eventtime = get_field('event_date');
                $date_month = date('F Y', strtotime($eventtime));
                $date_day = date('l jS', strtotime($eventtime));
                $time_start = get_field('event_timestart');
                $time_end = get_field('event_timeend');

                $event_special = get_field('event_special');
                $event_theme = get_field('event_theme');

                ?>
                <a href="<?php the_permalink(); ?>" class="summary-card<?php if($event_special == true) echo ' event-special'; ?>" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
                        <div>
                                <p class="event-name"><?php echo $date_month; ?></header>
                                <p>
                                        <?php echo $date_day; ?>
                                        <br><?php echo $time_start . '&ndash;' . $time_end; ?>
                                </p>
                                <p>
                                        <?php if ($event_special == true): ?>
                                                <span class="event-themeheader">Special event</span>
                                        <?php else: ?>
                                                <span class="event-themeheader">Theme</span>
                                        <?php endif; ?>
                                        <br><span class="event-theme"><?php echo $event_theme; ?></span>
                                </p>

                        </div>
                </a>
                <?php
        endwhile;
        ?>
        <a href="<?php echo get_post_type_archive_link('events'); ?>">View all</a>
        </div>
        <?php
endif;
?>
