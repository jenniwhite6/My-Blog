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

<section class='three-fourths offset-one-fourth'>
	<div class='row'>
		<div class='project-container column one-third'>
			<img class='project' src='<?= get_template_directory_uri(); ?>/img/sloth.png'>
		</div>
		<div class='project-container column one-third'>
			<img class='project' src='<?= get_template_directory_uri(); ?>/img/shoes.png'>
		</div>
	</div>
	<div class='row'>
		<div class='project-container column one-third'>
			<img class='project' src='<?= get_template_directory_uri(); ?>/img/universe.png'>
		</div>
		<div class='project-container column one-third'>
			<img class='project' src='<?= get_template_directory_uri(); ?>/img/catcher.png'>
		</div>
	</div>
</section>

<?php get_footer(); ?>