<div class="sidebar">

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

		<?php get_search_form(); ?>

		<?php wp_list_pages('title_li=' ); ?>

		<ul>
		   <?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>

	<?php endif; ?>

</div>
