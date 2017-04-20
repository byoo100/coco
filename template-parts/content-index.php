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

  <?php if(get_the_post_thumbnail()) : ?>
	<div class="index-image">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail('featured-sm'); ?>
		</a>
	</div>
	<?php endif; ?>

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
