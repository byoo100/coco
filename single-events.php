<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coco
 */

get_header(); ?>


	<div id="primary" class="content-area">

		<main id="main" class="site-main event-article" role="main">


			<div class="event-container">
				<section class=event-header>

			<?php
				if(get_field('event_image')){

					$image_id = get_field('event_image');

					$image_set = '<img src="%1$s" srcset="%2$s"  sizes="%3$s"></img>';

					$image_set = sprintf( $image_set,
						wp_get_attachment_image_url( $image_id, 'square-md' ),
						wp_get_attachment_image_srcset( $image_id, 'square-md' ),
						wp_get_attachment_image_sizes( $image_id, 'square-md' )
					);

	        $image_attributes = wp_get_attachment_image_src( $attachment_id = get_field('event_image'), 'square-md' );


					echo '<div class="event-image left">';
					echo $image_set;
					echo '</div>';
					echo '<div class="event-info right">';
				} else {
					echo '<div class="event-info">';
				}//if

			the_title( '<h1 class="entry-title">', '</h1>' );

			?>

      <?php if(get_field('event_start')) : ?>
        <div class="event-date">
        	<span class="event-start"><?php the_field('event_start'); ?></span>
				<?php if(get_field('event_end')) : ?>
	        <span class="event-end"><?php the_field('event_end'); ?></span>
	      <?php endif; ?>
        </div>
			<?php endif; ?>

			<?php
      if(get_field('event_address')){
        echo "<div class=event-address>";
          the_field('event_address');
        echo "</div>";
      }

			echo '</div>'; //event-info
			?>

				</section> <!--event-header-->

				<?php
				if(get_field('event_description')){
	        echo "<div class=event-description>";
					echo "<div class=description-wrap>";
	          the_field('event_description');
					echo "</div>";
	        echo "</div>";
	      }
				?>

			</div> <!--event-container-->

			<?php
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
