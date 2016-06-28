<?php if (comments_open()) : ?>
	<div class="post-comments">
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="5" data-width="100%"></div>
	</div>
<?php endif; ?>
