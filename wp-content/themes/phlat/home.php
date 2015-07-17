<?php get_header(); ?>

	<main class='page-content offset-one-fourth one-half'>

<?php while (have_posts()) : the_post(); ?>
	<section <?php post_class() ?>>
		<h3 class='post-date'> <?php the_time('d F, Y'); ?></h3>
		<h1 class='post-title special-font'><a href='<?php the_permalink() ?>'><?php the_title(); ?></a></h1>
		<p class='post-paragraph'><?php the_content(); ?></p>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class='post-thumb'>
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		
	</section>
<?php endwhile; ?>

	</main>

<?php get_footer(); ?>