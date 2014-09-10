<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( is_search() ) : ?>

			<?php if ( has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				<?php the_post_thumbnail( 'medium' ); ?>
				</a>
			<?php endif; ?>

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>

		<?php else : ?>

			<div class="entry-content">
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

				<?php the_tags( 'Tags: ', ', ', ''); ?>

				<?php get_template_part( 'partial/post', '_meta')?>

			</div>
		<?php endif; ?>

		<?php edit_post_link('Edit this entry','','.'); ?>

		</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
