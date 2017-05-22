<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coco
 */

get_header(); ?>

	<?php
		$title = "Join Us and <br>Forever Change a Life";

		if(has_post_thumbnail()){
			echo '<section class="image-featured">';
			the_post_thumbnail('featured-lg');
			echo '<h1 class="page-title">' . $title . '</h1>';
			echo '<div class="vignette"></div>';
			echo '</section>';
		} else {
			echo '<header class="entry-header page-container">';
			echo '<h1 class="entry-title">' . $title . '</h1>';
			echo '</header>';
		}
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-container" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				echo do_shortcode( '[contact-form-7 id="1894" title="Volunteer Form"]' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
