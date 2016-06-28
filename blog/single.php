<?php get_header(); ?>
<?php setPostViews(get_the_ID()); ?>

<div class="container">
	<div class="wrap">
		<p class="breadcrumb"><a href="<?php bloginfo('url'); ?>">Blog</a></p>
		<div class="post">
			<?php get_template_part('loop'); ?>

			<?php get_template_part('share'); ?>

			<div class="about-author">
				<div class="author-avatar"><?php echo get_avatar(get_the_author_meta('gusribeiro@gmail.com'), 132); ?></div>
				<p class="name"><span>Autor:</span> <?php the_author(); ?></p>
				<p class="bio"><?php echo get_the_author_meta('description'); ?></p>
			</div>

			<?php comments_template(); ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>