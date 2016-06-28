<?php get_header(); ?>

<div class="container">
	<div class="wrap">
		<?php if (!is_home()) : ?>
			<p class="breadcrumb"><a href="<?php bloginfo('url'); ?>">Blog</a></p>
		<?php endif; ?>
		<ul class="posts">
			<?php get_template_part('loop'); ?>
		</ul>

		<?php get_sidebar(); ?>

		<?php wp_pagenavi(); ?>
	</div>
</div>

<?php get_footer(); ?>