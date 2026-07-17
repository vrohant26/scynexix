<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrapper">
	<header class="site-header">
		<div class="nav-container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.webp' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="site-logo">
			</a>
			
			<nav class="main-navigation" id="primary-menu">
				<a href="#product" class="nav-link fs-base">Product</a>
				<a href="#science" class="nav-link fs-base">Science</a>
				<a href="#pipeline" class="nav-link fs-base">Pipeline</a>
				<a href="#about" class="nav-link fs-base">About</a>
				<a href="#news" class="nav-link fs-base">News</a>
			</nav>
			
			<div class="nav-cta">
				<a href="#console" class="btn-outline fs-sm">Investor Relations &gt;</a>
			</div>

			<button class="menu-toggle" aria-label="Toggle Navigation">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</button>
		</div>
	</header>
