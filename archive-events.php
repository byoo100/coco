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
		<main id="main" class="site-main events-area" role="main">
      <div class="events-container events-wrap">

			<?php
			$today = date('Ymd');

			//UPCOMING EVENTS
			$args = array(
				'post_type' => 'events',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'ASC',
				'meta_query' => array(
					'relation' => 'OR',
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

				endwhile; // End of the loop.

					/* Restore original Post Data */
					wp_reset_postdata();

				else :
					echo '<h1 class="noevents">No Upcoming Events</h1>';
			endif;
			?>

    </div><!-- events-container -->



		<div class="events-container events-wrap">

			<?php
			$today = date('Ymd');

			//PAST EVENTS
			$args = array(
				'post_type' => 'events',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'ASC',
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key'		=> 'event_start',
						'compare'	=> '<',
						'value'		=> $today,
					),
					array(
						'key'		=> 'event_end',
						'compare'	=> '<',
						'value'		=> $today,
					)
				),
			);

			$query = new WP_Query($args);

			if( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();

					get_template_part( 'template-parts/content', 'index-events' );

				endwhile; // End of the loop.

					coco_paging_nav();

			endif;
			?>

		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
