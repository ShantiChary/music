<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music
 */

?>
<!------------------------------------>
<!-- Display all Organizers ---------->
<!------------------------------------>

<!-- Administrative Staff Section -->
	<div class="organizers">
		<h1>Administrative Staff</h1>
		<section class="admin">
					<?php
					$args = array(
						'post_type' => 'organizer',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'organizer-category',
								'field' => 'slug',
								'terms' => 'administrative-staff'
							)
						)
					);

							$admin = new WP_Query($args);

							if($admin->have_posts()){
								while($admin->have_posts()){
									$admin->the_post();
									echo '<article class="organizer-item">';
									echo '<h2>';
	                the_title();
									echo '</h2>';
									echo the_content();
	                echo '</article>';
								}
								wp_reset_postdata();
							}
							?>
		</section>
	</div>

	<!-- Managers Section -->
	<div>
		<h1>Event Managers</h1>
		<section class="manager">
					<?php
					$args = array(
						'post_type' => 'organizer',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'organizer-category',
								'field' => 'slug',
								'terms' => 'managers'
							)
						)
					);

							$manager = new WP_Query($args);

							if($manager->have_posts()){
								while($manager->have_posts()){
									$manager->the_post();

									echo '<article class="organizer-item">';
									echo '<h2>';
	                the_title();
									echo '</h2>';

									//Display Custom Fields for Organizer Custom Post TYpe -> Taxonomy Organizer Category -> Manager //
									if(function_exists('get_field'))
										// check if the repeater field has rows of data -->

										if( have_rows('events', $events) ) {
											$rowCount = count( get_field('events', $events) ); //GET THE COUNT
											$i = 1;

											echo '<p>Events: ';
											while( have_rows('events', $events) ) {
												 the_row();

												// variabless
												$event = get_sub_field('event');
												echo $event;
												if($i < $rowCount) {
													echo ', ';
												}
												$i++;
											}
											echo '</p>';
										}?>

										<?php
										if(get_field('url')){
												echo '<a href="';
												the_field('url');
												echo '">';
												echo "Manager Website >>";
												echo '</a>';
										}
										echo the_content();
		                echo '</article>';
									}
									wp_reset_postdata();
								}
								?>
				</section>
		</div>
