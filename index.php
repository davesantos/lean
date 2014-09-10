<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'partial/_post')?>

	<?php endwhile; ?>

		<?php get_template_part( 'partial/_navigation')?>

	<?php else : ?>

		<?php get_template_part( 'partial/_notfound')?>

	<?php endif; ?>

<?php get_footer(); ?>
