<?php get_header(); ?>

<div class="container">
	<div class="wrap">
		<ul class="posts">
			<?php get_template_part('loop'); ?>
		</ul>

		<?php get_sidebar(); ?>

		<?php wp_pagenavi(); ?>
	</div>
</div>

<?php get_footer(); ?>