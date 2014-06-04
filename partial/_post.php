<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

	<?php get_template_part( 'partial/_post', 'meta')?>

	<div class="entry">

			<?php the_content(); ?>

	</div>

	<?php get_template_part( 'partial/_post', 'postmeta')?>

</article>
