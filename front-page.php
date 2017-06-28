<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coco
 */

function imgsrcset( $id, $size, $x, $y, $class ){

    $x ? $pos_x = $x : $pos_x = '50%';
    $y ? $pos_y = $y : $pos_y = '50%';

    $image_set = '<img src="%1$s" srcset="%2$s"  sizes="%3$s" class="%6$s" style="object-position:%4$s %5$s"></img>';

    $image_set = sprintf( $image_set,
      wp_get_attachment_image_url( $id, $size ),
      wp_get_attachment_image_srcset( $id, $size ),
      wp_get_attachment_image_sizes( $id, $size ),
      $pos_x,
      $pos_y,
      $class
    );

    return $image_set;
}

get_header(); ?>


  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <section id="home-welcome">

          <?php
          $img_url = wp_get_attachment_image_url( get_field("welcome_image"), 'featured-lg' );
          get_field("welcome_x") ? $pos_x = get_field("welcome_x") : $pos_x = 'center';
          get_field("welcome_y") ? $pos_y = get_field("welcome_y") : $pos_y = 'center';
          $text_content = get_field("welcome_text");

          echo '<div class="welcome-bg parallax-window"
          data-parallax="scroll" data-image-src="'.$img_url.'"
          data-position-x="'.$pos_x.'" data-position-y="'.$pos_y.'">';
          echo '<div class="dark-overlay"></div>';
          echo '<div class="text-area">';
          echo $text_content;
          echo '</div>';
          echo '</div>';


          ?>
      </section>


      <?php
        //EVENTS SECTION
        // $today = date('Ymd');
        //
        // $args = array(
  			// 	'post_type' => 'events',
        //   'posts_per_page' => 2,
        //   'ignore_sticky_posts' => 1,
  			// 	'orderby'	=> 'meta_value_num',
  			// 	'order'		=> 'ASC',
  			// 	'meta_query' => array(
  			// 		array(
  			// 	  	'key'		=> 'event_start',
  			// 	  	'compare'	=> '>=',
  			// 	    'value'		=> $today,
  			// 	  ),
  			//     array(
  			//       'key'		=> 'event_end',
  			//       'compare'	=> '>=',
  			//       'value'		=> $today,
  			//     )
  		  //   ),
  			// );
        // $the_query = new WP_Query( $args );

        // The Loop
        // if ( $the_query->have_posts() ) {
        //   echo "<section id=home-events class=events-area>";
        //   echo "<div class='events-container events-wrap'>";
        //
        // 	while ( $the_query->have_posts() ) {
        // 		$the_query->the_post();
        //     get_template_part( 'template-parts/content', 'index-events' );
        //
        //   }
        	/* Restore original Post Data */
        	// wp_reset_postdata();
          //
          // echo "</div>"; //.events-wrap
          // echo "</section>"; //#home-events
        // }
      ?>


      <?php
        if( get_field("home_location")){
          echo '<section id=home-location class="home-section">';
          echo '<div class="location-wrap">';
          echo get_field("home_location");
          echo '</div>';

          echo '<svg width="100%" height="100%" viewbox="0 0 800 600" preserveAspectRatio="none" class="diagonal-line">';
          echo '<path d="M 0 0, 800 0, 0 150" fill="#20a088" opacity="1" />';
          echo '<path d="M 0 600, 800 600, 800 450" fill="#20a088" opacity="1"></path>';
          echo '</svg>';
          echo '</section>';
        }
      ?>

      <?php
      //RESOURCES SECTION
      if( have_rows('home_resources') ):
        echo '<section id="home-resources">';

        $i = 0;

        while( have_rows('home_resources') ) :
        the_row();

        if( get_row_layout() == 'resource_obj' ):
          $resource_class = 'carousel-bg-image carousel-bg-%1$s %2$s';

          $resource_class = sprintf( $resource_class,
            $i,
            $i == 0 ? 'active' : ''
          );

          $resource_titles[$i] = get_sub_field('resource_title');
          $resource_text[$i] = get_sub_field('resource_text');
          $resource_images[$i] = wp_get_attachment_image_url( get_sub_field('resource_image'), 'full' );
          get_sub_field('resource_x') ? $resource_x[$i] = get_sub_field('resource_x') : $resource_x[$i] = 'center';
          get_sub_field('resource_y') ? $resource_y[$i] = get_sub_field('resource_y') : $resource_y[$i] = 'center';
          $i++;

        endif;
        endwhile;

        echo '<div class="carousel-bg">';
        for( $x = 0; $x < $i; $x++ ){
          echo '<div class="carousel-bg-image"
          style="left: '.($x * 100).'%;
          background-image: url('.$resource_images[$x].');
          background-position:'.$resource_x[$x].' '.$resource_y[$x].';"></div>';
        }
        echo '</div>';

        echo '<div class="carousel-text-box">';
        echo '<div class="carousel-text">';
        for( $x = 0; $x < $i; $x++){
          echo '<div class="carousel-text-item" style="left: '.($x * 100).'%;">';
          echo '<h1>'.$resource_titles[$x].'</h1>';
          echo '<p>'.$resource_text[$x].'</p>';
          echo '</div>';
        }
        echo '</div>';//.carousel-text

            echo '<ul class="resource-nav">';
            for( $x = 0; $x < $i; $x++){
              echo '<li position="'.($x * 100).'" class="resource-nav-item circle',
              $x == 0 ? ' active' : '', '">';
              echo '<span class="screen-reader-text">'.$resource_titles[$x].'</span>';
              echo '</li>';
            }
            echo '</ul>';

        echo '</div>';//carousel-text-box

        echo '</section>'; //#home-resources
      endif;
      ?>


      <?php

      echo '<section id="miscellaneous">';
      echo '<div class="miscellaneous-wrap">';

      //EVENTS SECTION
      //==============
      echo '<ul id="home-events">';
      echo '<h2 class="event-head">Upcoming Events</h2>';
        $today = date('Ymd');

        $args = array(
  				'post_type' => 'events',
          'posts_per_page' => 3,
          'ignore_sticky_posts' => 1,
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
        $the_query = new WP_Query( $args );

        //The Loop
        if ( $the_query->have_posts() ) {

        	while ( $the_query->have_posts() ) {
        		$the_query->the_post();

            // get raw date
            $start_date = get_field('event_start', false, false);
            // make date object
            $start_date = new DateTime($start_date);

            echo '<li>';
            echo '<a href=' . get_permalink() . '>';
            echo '<h5 class="event-title">'. get_the_title() .'</h5>';
            echo '<span class="event-date">';
                echo '<span class="event-start fa fa-calendar-check-o"></span>';
                echo '<span class="event-month-day">'. $start_date->format('M d') .'</span>';
            echo '</span>';

                if(get_field('event_end')){
                  $end_date = get_field('event_end', false, false);
                  $end_date = new DateTime($end_date);

                  echo '<span class="event-date">';
                      echo '<span class="event-end fa fa-calendar-times-o"></span>';
                      echo '<span class="event-month-day">'. $end_date->format('M d') .'</span>';
                  echo '</span>';
                }
            echo '</a>';
            echo '</li>';
          }
        	/* Restore original Post Data */
        	wp_reset_postdata();

        } else {
          echo '<li><h5 class="event-title">No Upcoming Events</h5></li>';
        }

      echo '</ul>'; //.home-events


      //BLOG SECTION
      //==============
      echo '<ul id="home-index">';
      echo '<h2 class="index-head">Blog</h2>';

        $args = array(
        	'post_type' => 'post',
          'posts_per_page' => 3,
          'ignore_sticky_posts' => 1,
        );
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {

        	while ( $the_query->have_posts() ) {
        		$the_query->the_post();

            echo '<li>';
            echo '<a href=' . get_permalink() . '>';
            echo '<h5 class="index-title">'. get_the_title() .'</h5>';
            echo '<span class="index-date">';
                echo '<span class="index-month-day">'. get_the_date('M d') .'</span>';
                echo '<span class="index-year">'. get_the_date('Y') .'</span>';
            echo '</span>';
            echo '</a>';
            echo '</li>';

        	}

        	/* Restore original Post Data */
        	wp_reset_postdata();

        } else {

          echo '<li><h5 class="index-title">No Blog Posts</h5></li>';
        }

        echo '</ul>'; //home-index
        echo '</div>'; //.miscellaneous-wrap
        echo '</section>'; //#miscellaneous
      ?>
    </main>
</div>

<?php
get_footer();
