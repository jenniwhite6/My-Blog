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

<section class='wrap'>
	<div class='photo-box'>
		<div class='portfolio-photo'>
			<img src='<?= get_template_directory_uri(); ?>/img/sloth.png'>
		</div>
	</div>
	<div class='photo-box'>
		<div class='portfolio-photo'>
			<img src='<?= get_template_directory_uri(); ?>/img/catcher.png'>
		</div>
	</div>
</section>

<?php get_footer(); ?>