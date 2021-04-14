<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music
 */

?>

<!-- display Single Band info -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
					echo '<h1>';
					echo the_title();
					echo get_the_term_list($post->ID, 'band-category', ' - The ', ',', ' artists');
					echo '</h1>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
<?php
	the_content();
 ?>

		<!-- 'Check out other similar bands' section -->
		 <?php
		 //get the taxonomy terms of custom post type
		 $customTaxonomyTerms = wp_get_object_terms( $post->ID, 'band-category', array('fields' => 'ids') );

		 //query arguments
		 $args = array(
		     'post_type' => 'band',
		     'posts_per_page' => 2,
		     'orderby' => 'rand',
		     'tax_query' => array(
		         array(
		             'taxonomy' => 'band-category',
		             'field' => 'id',
		             'terms' => $customTaxonomyTerms
		         )
		     ),
		     'post__not_in' => array ($post->ID),
		 );

		 //the query
		 $relatedPosts = new WP_Query( $args );

		 //loop through query
		 if($relatedPosts->have_posts()){ ?>
			 <h2>Check out other similar bands...</h2>
			 <section class="you-may-like-section">
				 <?php
		     while($relatedPosts->have_posts()){
		         $relatedPosts->the_post();
		 			 ?>
		        <article>
							<a href="<?php the_permalink(); ?>">
							<?php the_title();

							?></a>
						</article>
		 		<?php
		     }
		 		wp_reset_postdata();
		 } ?>
		</section>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'music' ),
				'after'  => '</div>',
			) );

		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
