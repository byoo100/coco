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



<section id="home-welcome">
    <?php
    $img_id = get_field("welcome_image");
    $pos_x = get_field("welcome_x");
    $pos_y = get_field("welcome_y");
    $text_content = get_field("welcome_text");

    echo '<div class="welcome-image">';
    echo '<div class="dark-overlay"></div>';
    echo imgsrcset( $img_id, 'featued-lg', $pos_x, $pos_y, '' );
    echo '<div class="text-area">';
    echo $text_content;
    echo '</div>';
    echo '</div>';
    ?>
</section>


  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

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
        // if( get_field("home_about")){
        //   echo '<section id=home-about class=home-section>';
        //   echo '<div class="home-wrap about-wrap">';
        //   echo get_field("home_about");
        //   echo '</div>';
        //   echo '<svg width="100%" height="100%" viewbox="0 0 800 600" preserveAspectRatio="xMinYMin slice" class="diagonal-one">';
        //   echo '<path d="M 0 0, 400 0, 0 40" fill="#20a088" opacity="1" />';
        //   echo '</svg>';
        //   echo '</section>';
        // }
      ?>

      <?php
        if( get_field("home_location")){
          echo '<section id=home-location class=home-section>';
          echo '<div class="home-wrap location-wrap">';
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
          $resource_images[$i] = imgsrcset( get_sub_field('resource_image'), 'full', get_sub_field('resource_x'), get_sub_field('resource_y'), $resource_class);
          $i++;

        endif;
        endwhile;

        echo '<div class="carousel-bg">';
        for( $x = 0; $x < $i; $x++ ){
          echo $resource_images[$x];
        }
        echo '</div>';

        echo '<div class="resource-text-section">';
        echo '<div class="carousel-text-box">';
        echo '<div class="carousel-text">';
        for( $x = 0; $x < $i; $x++){
          echo '<div class="carousel-text-item carousel-text-'.$x.'',
          $x == 0 ? ' active' : '', '" position="'.$x.'">';
          echo '<h1>'.$resource_titles[$x].'</h1>';
          echo '<p>'.$resource_text[$x].'</p>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<ul class="resource-nav">';
        for( $x = 0; $x < $i; $x++){
          echo '<li position="'.$x.'">';
          echo '<span>'.$x.'</span>';
          echo '</li>';
        }
        echo '</ul>';

        echo '</section>'; //#home-resources
      endif;
      ?>



      <?php
        // $args = array(
        // 	'post_type' => 'post',
        //   'posts_per_page' => 4,
        //   'ignore_sticky_posts' => 1,
        // );
        // $the_query = new WP_Query( $args );

        // The Loop
        // if ( $the_query->have_posts() ) {
        //
        //   echo "<section id=home-index class=home-section>";
        //   echo "<div class=home-wrap>";
        //   $blog_title = get_the_title( get_option('page_for_posts', true) );
        //   echo '<h1 class="home-title index-title">' . $blog_title . '</h1>';
        //   echo "</div>"; //#home-index
        //
        //   echo "<div class=index-container>";
        //
        // 	while ( $the_query->have_posts() ) {
        // 		$the_query->the_post();
        //     get_template_part( 'template-parts/content', 'index' );
        // 	}
        	/* Restore original Post Data */
        // 	wp_reset_postdata();
        //
        //   echo "</div>"; //.index-container
        //   echo "</section>"; //#home-index
        // }
      ?>
    </main>
</div>

<?php
get_footer();
