<?php get_header(); ?>

<main class='page-content offset-one-fourth one-half'>

	<h1 class='about-title special-font'>A little bit about me</h1>
	<?php while (have_posts()) : the_post(); ?>
		<section <?php post_class() ?>>
		<p class='about-paragraph'><?php the_content(); ?></p>
		
		<?php

		if (has_post_thumbnail()) { //if a thumbnail has been set

			$imgID = get_post_thumbnail_id($post->ID); //get the id of the featured image
			$featuredImage = wp_get_attachment_image_src($imgID, 'medium' );//get the url of the featured image (returns an array)
			$imgURL = $featuredImage[0]; //get the url of the image out of the array

			?>

			<img class='about-photo' src='<?php echo $imgURL ?>'>

		<?php } ?>

		</section>
	<?php endwhile; ?>

</main>

<?php get_footer(); ?>

