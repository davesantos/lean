<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

	<?php include (TEMPLATEPATH . '/inc/_meta.php' ); ?>

	<div class="entry">

		<?php if (!is_search) {

			the_content();

		} else {

		 	the_excerpt();

		}; ?>


	</div>

	<?php include (TEMPLATEPATH . '/inc/_postmetadata.php' ); ?>

</article>
