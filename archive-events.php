<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coco
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main events-area events-fill" role="main">
      <div class="events-container events-wrap">

			<?php
			$args = array(
				'post_type' => 'events',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'ASC',
				'meta_query' => array(
					array(
				  	'key'		=> 'event_start',
				  	'compare'	=> '>=',
				    'value'		=> $today,
				  ),
			    array(
			      'key'		=> 'event_end',
			      'compare'	=> '>=',
			      'value'		=> $today,
			    )
		    ),
			);

			$query = new WP_Query($args);

			if( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();

					get_template_part( 'template-parts/content', 'index-events' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.

				else :
					echo '<h1>No Upcoming Events</h1>';
			endif;
			?>

    </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
