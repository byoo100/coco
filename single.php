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

if(get_field('featured_video')){

	$feat_vid = true;
	// get iframe HTML
	$video = get_field('featured_video');

	// use preg_match to find iframe src
	preg_match('/src="(.+?)"/', $video, $matches);
	$src = $matches[1];

	// add extra params to iframe src
	$params = array(
	    'controls'    => 2,
	    'hd'        => 1,
			'modestbranding' => 1
	);

	$new_src = add_query_arg($params, $src);

	$video = str_replace($src, $new_src, $video);


	// add extra attributes to iframe html
	$attributes = 'frameborder="0"';

	$video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
}
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
