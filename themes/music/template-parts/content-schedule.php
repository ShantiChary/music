<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Music
 */

?>

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music
 */

?>

<!-- Display Tour Schedule tours (Repeater) fields on Tour Schedule Page -->
	<div>
		<h1>Concert Tour Schedule</h1>
		<section class="schedule">
					<?php
                        //Display Custom Fields in Tour Schedule
      									if(function_exists('get_field')) { ?>

                          <!-- // check if the repeater field has rows of data -->
                          <article>
                          <?php
                          if( have_rows('tours', $tours) ) {
      											echo '<table>';
                            while( have_rows('tours', $tours) ) {
      												 the_row();
                               echo '<tr>';
         												$event_date = get_sub_field('tour_date');
         												$event = get_sub_field('music_event');
         												$event_mgr = get_sub_field('event_mgr');
         											  echo '<td>';
                                echo date('d F, Y', strtotime($event_date));
         											  echo '<td>';
                                echo '----';
	         											echo '</td>';
         											  echo '<td>';
                                echo 'Event: ';
         												echo $event;
																echo '<td>';
                                echo '----';
	         											echo '</td>';
         											  echo '<td>';
                                echo 'Event Manager: ';
                                echo $event_mgr;
         											  echo '</td>';
                                echo '</tr>';
                            }
                            echo '</table>';
									          wp_reset_postdata();
                          }
                          ?>
                        </article>
              <?php  } ?>
				</section>
		</div>
