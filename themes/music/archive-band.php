<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mindset
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<!-- <h2>My Projects</h2> -->

			</header><!-- .page-header -->

<!-- All Bands Section -->
	<div>
		<h1>The Bands</h1>
		<section class="all-bands">
			<?php do_shortcode("[button]"); ?>
					<?php
					$args = array(
						'post_type' => 'band',
						'posts_per_page' => -1,
						'orderby'	 => 'title',
						'order'		 => 'ASC'
					);

							$webwork = new WP_Query($args);

							if($webwork->have_posts()){
								while($webwork->have_posts()){
									$webwork->the_post();
									echo '<article class="band-item">';
	                echo '<a href="';
	                the_permalink();
	                echo '">';
	                the_title();
	                echo the_post_thumbnail('large');
	                echo '</a>';
									echo the_excerpt();
									echo get_the_term_list($post->ID, 'band-category', 'Music Genre: ', ',', ' ');
	                echo '</article>';
								}
								wp_reset_postdata();
							}
							?>
				</section>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
