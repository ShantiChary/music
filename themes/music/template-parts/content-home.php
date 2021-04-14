<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
			$args = array('page_id' => 6); //list of parameters

			$home_query = new WP_Query( $args );

			if ( $home_query -> have_posts() ){
				while ( $home_query -> have_posts() ) {
						$home_query -> the_post();
						echo '<p class="home-page">';

							//Image Slider
							//slider_portfolio = Repeater field
							//slider_image = subfield
							// function agero_slider() {
							if( have_rows('slider_portfolio') ){
							echo '<div class="slider-for">';
							 	// loop through the rows of data
							    while ( have_rows('slider_portfolio') ) : the_row();
							    	// display a sub field value
							    	//variable
							    	$image = get_sub_field('slider_image');
							    	?>
										<div><img src="<?php echo $image['url']; ?>"/></div>
							  		<?php
							    endwhile;
							echo '</div>'; ?>

							<div class="slider-nav">';
							 	<!-- // loop through the rows of data -->
								<?php
							    while ( have_rows('slider_portfolio') ) : the_row();
							    // display a sub field value
							    //vars
							    $image = get_sub_field('slider_image');
							   ?>

								<!-- Image carousel - enable but do not display -->
								<div class="image-carousel"></div>
							  <?php
							    endwhile;
							echo '</div>';
							}
					echo '</p>';
				}
				wp_reset_postdata();

				the_content();
	} ?>

</article><!-- #post-## -->
