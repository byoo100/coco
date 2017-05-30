<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coco
 */

get_header(); ?>

<?php
	$post = get_post($_GET['id']);
	echo $post->post_title;
	echo $post->post_contact['name'];
?>




	<div id="primary" class="content-area single-container">

		<main id="main" class="site-main single-article" role="main">

			<?php
				if($feat_vid){
					echo "<div class='featured-container'>";
					echo "<div class='featured-video'>";
					echo $video;
					echo "</div>";
					echo "</div>";
				}elseif ( has_post_thumbnail() ) {
					echo "<div class='featured-container'>";
					echo "<div class='featured-image'>";
						the_post_thumbnail('featured-lg');
					echo "</div>";
					echo "</div>";
				}
			?>


		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();
