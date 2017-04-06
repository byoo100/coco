<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coco
 */

get_header(); ?>

	<div id="primary" class="content-area single-container">

		<main id="main" class="site-main single-article" role="main">

		<?php
			if ( has_post_thumbnail() ) {
				echo "<div class='featured-container'>";
				echo "<div class='featured-image'>";
					the_post_thumbnail('large-thumb');
				echo "</div>";
				echo "</div>";
			}
		?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php
get_footer();
