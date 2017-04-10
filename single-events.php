<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coco
 */

get_header(); ?>






	<div id="primary" class="content-area event-container">

		<main id="main" class="site-main event-article" role="main">

		<?php

      the_title( '<h1 class="entry-title">', '</h1>' );

			if(get_field('event_image')){

        $image_attributes = wp_get_attachment_image_src( $attachment_id = get_field('event_image'), 'square-md' );

        echo "<img src=" . $image_attributes[0] . " width=" . $image_attributes[1] . " height=" . $image_attributes[2] . "/>";

			}

      if(get_field('event_start')){
        echo "<div class=event-start>";
          the_field('event_start');
        echo "</div>";
			}

      if(get_field('event_end')){
        echo "<div class=event-start>";
          the_field('event_end');
        echo "</div>";
      }

      if(get_field('event_address')){
        echo "<div class=event-address>";
          the_field('event_address');
        echo "</div>";
      }

      if(get_field('event_description')){
        echo "<div class=event-description>";
          the_field('event_description');
        echo "</div>";
      }

      if(get_field('event_map')){

        $location = get_field('event_map');

        echo "<div class=acf-map>";
        echo "<div class=marker data-lat=" . $location['lat'] . " data-lng=" . $location['lng'] . "></div>";
        echo "</div>";
      }
		?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();
