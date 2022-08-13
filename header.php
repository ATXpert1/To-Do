<!doctype html>
<html>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header id="masthead" class="site-header bg-dark text-white">
			<div class="site-branding container pt-3 pb-3 mb-4">
				<h1 class="site-title text-white text-center text-sm-left">
					<a href="<?php echo get_home_url(); ?>" class="text-white">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
			</div>
		</header>
	</div>