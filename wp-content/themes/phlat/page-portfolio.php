<?php
/**
 * Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage Phlat
 * @since Phlat 1.0
 */
?>

<?php get_header(); ?>

	<?php while (have_posts()) : the_post(); ?>
		<section <?php post_class() ?>>
			<?php the_content(); ?>
		</section>
	<?php endwhile; ?>

<?php get_footer(); ?>