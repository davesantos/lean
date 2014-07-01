<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>

		<?php get_template_part( 'partials/_navigation')?>

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'partials/_post')?>

		<?php endwhile; ?>

		<?php get_template_part( 'partials/_navigation')?>

	<?php else : ?>

		<?php get_template_part( 'partials/_notfound')?>

	<?php endif; ?>

<?php get_footer(); ?>
