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

  <?php if(has_post_thumbnail()) : ?>
    <div class='featured-container'>
      <?php
        echo '<div class="featured-image">';
        echo '<a href="' . esc_url( get_permalink() ) . '">';
          the_post_thumbnail('post-thumbnail');
        echo '</a>';
        echo '</div>';
      ?>
	   </div>
	<?php endif; ?>

	<header class="entry-header">

    <h1 class="entry-title">
      <a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a>
    </h1>

		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
      <?php if(is_front_page()){
        coco_front_posted_on();
      } else {
        coco_posted_on();
      } ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <a href="<?php echo get_permalink(); ?>" rel="bookmark">
      <?php
      $excerpt = get_the_excerpt();

      if(is_front_page()){
        echo wp_trim_words( $excerpt, 20, null);
      } else {
        echo $excerpt;
      } ?>
    </a>
	</div><!-- .entry-content -->

  <button class="btn readmore">
    <a href="<?php echo get_permalink(); ?>">Read More</a>
  </button>

</article><!-- #post-## -->
