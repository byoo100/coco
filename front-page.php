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

get_header(); ?>

  <section id="home-featured">

  <?php
  $i = 0;
  // check if the flexible content field has rows of data
  if( have_rows('home_welcome') ):

    while( have_rows('home_welcome') ) :
    the_row();

    if( get_row_layout() == 'welcome_image' ):

    	$image_id = get_sub_field('welcome_img');
      $text_content = get_sub_field('welcome_text');

      get_sub_field(welcome_x) ? $pos_x = get_sub_field(welcome_x) : $pos_x = '50%';
      get_sub_field(welcome_y) ? $pos_y = get_sub_field(welcome_y) : $pos_y = '50%';

      $image_set = '<img src="%1$s" srcset="%2$s"  sizes="%3$s" style="object-position:%4$s %5$s"></img>';

      $image_set = sprintf( $image_set,
    		wp_get_attachment_image_url( $image_id, 'featured-lg' ),
    		wp_get_attachment_image_srcset( $image_id, 'featured-lg' ),
    		wp_get_attachment_image_sizes( $image_id, 'featured-lg' ),
        $pos_x,
        $pos_y
    	);

      echo '<div class="image-slider image-' . $i . '">';
      echo '<div class="image-dark"></div>';
      echo $image_set;
      echo '<div class="text-area">';
      echo $text_content;
      echo '</div>';
      echo '</div>';

      $i++;

    endif;
    endwhile;
  endif;
  ?>
</section>


  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <section id="home-events" class="events-area">
        <div class="events-container events-wrap">
          <?php
            $args = array(
      				'post_type' => 'events',
              'posts_per_page' => 2,
              'ignore_sticky_posts' => 1,
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
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
            	while ( $the_query->have_posts() ) {
            		$the_query->the_post();
                get_template_part( 'template-parts/content', 'index-events' );
            	}
            	/* Restore original Post Data */
            	wp_reset_postdata();
            } else {
            	// no posts found
            }
          ?>
        </div>
      </section>

      <?php
        if( get_field("home_about")){
          echo '<section id=home-about class=home-section>';
          echo '<div class="home-wrap about-wrap">';
          echo get_field("home_about");
          echo '</div>';
          echo '<svg width="100%" height="100%" viewbox="0 0 800 600" preserveAspectRatio="xMinYMin slice" class="diagonal-one">';
          echo '<path d="M 0 0, 400 0, 0 40" fill="#20a088" opacity="1" />';
          echo '</svg>';
          echo '</section>';
        }
      ?>

      <?php
        if( get_field("home_location")){
          echo '<section id=home-location class=home-section>';
          echo '<div class="home-wrap location-wrap">';
          echo get_field("home_location");
          echo '</div>';
          echo '<svg width="100%" height="130%" viewbox="0 0 800 600" preserveAspectRatio="xMinYMin slice" class="diagonal-two">';
          echo '<path d="M 0 90, 800 0, 800 600, 0 600" fill="#20a088" opacity="1" />';
          echo '</svg>';
          echo '</section>';
        }
      ?>

      <?php
      echo '<section id="home-resources">';
      echo '<ul>';
      // check if the flexible content field has rows of data
      if( have_rows('home_resouces') ):

        $i = 0;

        while( have_rows('home_resouces') ) :
        the_row();

        if( get_row_layout() == 'resource_list_item' ):

        	$resource_title = get_sub_field('resource_title');
          $resource_text = get_sub_field('resource_item');
          $i++;

          echo '<li class="resource-item item-' . $i . '">';
          echo '<h2 class="resource-title">' . $resource_title . '</h2>';
          echo '<span class="resource-text">' . $resource_text . '</span>';
          echo '</li>';

        endif;
        endwhile;
      endif;

      echo '</ul>';
      echo '</section>';
      ?>


      <section id="home-index" class="home-section">
        <div class="home-wrap">
          <?php
             $blog_title = get_the_title( get_option('page_for_posts', true) );
             echo '<h1 class="home-title index-title">' . $blog_title . '</h1>';
          ?>
        </div>

        <div class="index-container">
        <?php
          $args = array(
          	'post_type' => 'post',
            'posts_per_page' => 4,
            'ignore_sticky_posts' => 1,
          );
          $the_query = new WP_Query( $args );

          // The Loop
          if ( $the_query->have_posts() ) {
          	while ( $the_query->have_posts() ) {
          		$the_query->the_post();
              get_template_part( 'template-parts/content', 'index' );
          	}
          	/* Restore original Post Data */
          	wp_reset_postdata();
          } else {
          	// no posts found
          }
        ?>
        </div>
      </section>

    </main>

</div>



<?php
get_footer();
