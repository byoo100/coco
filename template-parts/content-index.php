<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coco
 */

?>

<article id="post-<?php the_ID();?>" class='matchHeight'>

    <?php
    if( has_post_thumbnail() ) {
      echo "<div class='index-image'>";
      echo "<a href=" . get_permalink() . ">";
        the_post_thumbnail('featured-xs');
      echo "</a>";
      echo "</div>";
    }
    ?>

	<header class="entry-header">

    <h3 class="entry-title">
      <a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a>
    </h3>

		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php coco_index_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <a href="<?php echo get_permalink(); ?>" rel="bookmark">
      <?php echo get_the_excerpt(); ?>
    </a>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
