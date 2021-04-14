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

<!-- All Organizers Section -->
  		<?php get_template_part( 'template-parts/content', 'organizer' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
