<div class="sidebar">
	<div class="search">
		<form class="box" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
			<input type="text" value="<?php the_search_query(); ?>" placeholder="Pesquisar" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="Buscar" />
		</form>
	</div>

	<div class="categories">
		<h4>Categorias</h4>
		<ul>
			<?php wp_list_categories('title_li=0'); ?>
		</ul>
	</div>

	<?php query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC'); ?>
	<?php if (have_posts()) : ?>
		<div class="popular-posts">
			<h4>Postagens populares</h4>
			<ul>
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<span><?php the_time('d M Y') ?></span>
						<?php the_title(); ?>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>

	<div class="post-tags">
		<h4>Tags</h4>
		<div>
			<?php wp_tag_cloud(); ?>
		</div>
	</div>
</div>