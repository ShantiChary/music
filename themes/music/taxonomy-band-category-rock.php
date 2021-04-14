<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Music
 */

/*Display Taxonomy Term Rock - All posts*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					echo '<h1>';
					echo single_term_title();
					echo ' ';
					echo 'Artists';
					echo '</h1>';
				?>
			</header><!-- .page-header -->

			<div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						echo '<h2>';
						echo '<a href="';
						the_permalink();
						echo '">';
						the_title();
						echo '</h2>';
						echo '</a>';
						echo '<section class="the-bands">';
						echo '<article class="band-image">';
					  echo '<p>';
						the_post_thumbnail('portrait-blog' );
					  echo '</p>';
						echo '</article>';
					  echo '<p">';
						echo '<article class="band-text">';
						the_excerpt();
					  echo '</p>';
						echo '</article>';
					?>
				</section>
				<?php endwhile; ?>
		</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
