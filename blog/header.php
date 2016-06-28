<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
			<?php
				/*
				 * Print the <title> tag based on what is being viewed.
				 */
				global $page, $paged;

				wp_title( '-', true, 'right' );

				// Add the blog name.
				bloginfo( 'name' );

				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 )
					echo ' - ' . sprintf( __( 'Page %s', 'dpaola' ), max( $paged, $page ) );
			?>
		</title>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php if (is_single()) : ?>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
		<?php endif; ?>

		<div class="header">
			<div class="wrap">
				<?php $heading_tag = (is_home() || is_front_page()) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> class="logo">
					<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home"><?php bloginfo('name'); ?></a>
				</<?php echo $heading_tag; ?>>

				<a href="javascript:void(0)" class="account">Entrar</a>
				<span class="responsive_ico_menu"><span>&bull;</span></span>

				<?php wp_nav_menu('container='); ?>
				<!-- <ul class="menu">
					<li><a href="">Home</a></li>
					<li><a href="">Depoimentos</a></li>
					<li><a href="">Ex-Alunos</a></li>
					<li><a href="">Sobre o QSC</a></li>
					<li><a href="">Contato</a></li>
					<li class="active"><a href="">Blog</a></li>
				</ul> -->
			</div>
		</div>

		<?php if (has_header_image()) : ?>
			<div class="blog-header" style="background-image:url(<?php header_image(); ?>);">
				Blog
			</div>
		<?php endif; ?>













