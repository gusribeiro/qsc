<?php #if (is_home() || is_search()) : ?>
<?php if (!is_single()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<li>
			<div class="post-head">
				<?php if (has_post_thumbnail()) : ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php endif; ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
			<p class="excerpt"><a href="<?php the_permalink(); ?>"><?php echo(get_the_excerpt()); ?></a></p>
			<p class="meta">
				<span><?php the_time('d M Y') ?></span>
				<?php the_author(); ?>
			</p>
			<a href="<?php the_permalink(); ?>" class="read-more">Ler mais</a>
		</li>
	<?php endwhile; ?>
<?php endif; ?>

<?php if (is_single()) : ?>
	<?php the_post(); ?>
		<div class="post-head">
			<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1><?php the_title(); ?></h1>
		</div>
		<p class="meta">
			<span class="date"><span>Data:</span> <?php the_time('d') ?> de <?php the_time('F') ?> de <?php the_time('Y') ?></span>
			<span class="author"><span>Autor:</span> <?php the_author(); ?></span>
		</p>
		<div class="post-content"><?php the_content(); ?></div>
	<?php #endwhile; ?>
<?php endif; ?>