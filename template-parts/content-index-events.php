<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coco
 */

?>

<article id="post-<?php the_ID();?>">


  <?php
    if(get_field('event_image')){

      $image_id = get_field('event_image');

      $image_set = '<img src="%1$s" srcset="%2$s"  sizes="%3$s"></img>';

      $image_set = sprintf( $image_set,
    		wp_get_attachment_image_url( $image_id, 'square-sm' ),
    		wp_get_attachment_image_srcset( $image_id, 'square-sm' ),
    		wp_get_attachment_image_sizes( $image_id, 'square-sm' )
    	);

      echo '<div class="event-image">';
      echo '<a href=' . get_permalink() . '>';
      echo $image_set;
      echo '</a>';
      coco_event_date();
      echo '</div>';
    }//if
  ?>

  <?php
    //IF EVENT IS UPCOMING OR PAST
    if(get_field('event_start')){
      $today = new DateTime('now');
      $start_date = get_field('event_start', false, false);
    	$start_date = new DateTime($start_date);

      if(get_field('event_end')){
        $end_date = get_field('event_end', false, false);
      	$end_date = new DateTime($end_date);

        if($today <= $end_date){
          echo "<span class=upcoming>Upcoming Event</span>";
        } else {
          echo "<span class=past>Past Event</span>";
        }//end_date
      } else {

        if($today <= $start_date){
          echo "<span class=upcoming>Upcoming Event</span>";
        } else {
          echo "<span class=past>Past Event</span>";
        }//start_date
      } //event_end
    } //event_start
  ?>

  <?php if(get_field('event_image')) :
    echo '<div class="event-info">';
    else :
    echo '<div class="event-info no-image">';
  endif; ?>

    <h1 class="entry-title">
      <?php echo get_the_title(); ?>
    </h1>

    <?php if(get_field('event_start') && !get_field('event_image')) :
      echo '<div class="event-date">';
      echo '<span class="event-start">' . get_field('event_start') . '</span>';
      if(get_field('event_end')) :
        echo '<span class="event-end">' . get_field('event_end') . '</span>';
      endif;
      echo '</div>'; //.event-date
    endif; ?>

    <?php if(get_field('event_address')) :
      echo '<div class="event-address">';
      the_field('event_address');
      echo '</div>';
    endif; ?>

    <?php if(!get_field(event_image)) :
      echo '<button class="btn btn-white event-more">';
      echo '<a href=' . get_the_permalink() . '>' . 'More Info' . '</a>';
      echo '</button';
    endif; ?>

  </div><!--.event-info-->

</article><!-- #post-## -->
