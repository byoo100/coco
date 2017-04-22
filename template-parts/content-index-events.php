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

      $image_attributes = wp_get_attachment_image_src( $attachment_id = get_field('event_image'), 'square-sm' );

      echo '<div class="event-image left">';
      echo '<a href=' . get_permalink() . '>';
      echo '<img src=' . $image_attributes[0] . ' width=' . $image_attributes[1] . ' height=' . $image_attributes[2] . '/>';
      echo '</a>';
      echo '</div>';
      echo '<div class="event-info right">';
    } else {
      echo '<section class=event-header>';
      echo '<div class=event-info>';
    }//if

  echo '<h1 class=entry-title><a href=' . get_permalink() . '>' . get_the_title() . '</a></h1>';

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

  echo '<button class="btn btn-yellow-light event-more">';
  echo '<a href=' . get_the_permalink() . '>' . 'More Info' . '</a>';
  echo '</button';
  echo '</div>'; //event-info
  ?>


</article><!-- #post-## -->
