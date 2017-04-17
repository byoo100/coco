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
	<section class="featured-blog">
		<div class="index-text">
			<h1>Bootstrap Tutorial</h1>
			<p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive,
			mobile-first projects on the web.</p>
		</div>

		<?php
			$page_id     = get_queried_object_id();

			echo "<div class='featured-container'>";
			echo "<div class='featured-image'>";
			echo get_the_post_thumbnail($page_id, 'featured-lg');
			echo "</div>";
			echo "</div>";

		?>
	</section>

	<div id="primary" class="content-area index-blog">
		<main id="main" class="site-main index-container" role="main">

		<?php
		if ( have_posts() ) : ?>

		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'index' );

			endwhile;

			coco_paging_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
