<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Fetch Frontpage metadata for navbar configuration
$frontpage_id = get_option( 'page_on_front' );

$logo_url = get_post_meta( $frontpage_id, '_navbar_logo', true );
if ( empty( $logo_url ) ) {
	$logo_url = get_template_directory_uri() . '/assets/images/logo.webp';
}

$cta_text = get_post_meta( $frontpage_id, '_navbar_cta_text', true );
if ( empty( $cta_text ) ) {
	$cta_text = 'Investor Relations >';
}

$cta_link = get_post_meta( $frontpage_id, '_navbar_cta_link', true );
if ( empty( $cta_link ) ) {
	$cta_link = '#console';
}
?>

<div class="site-wrapper">
	<header class="site-header">
		<div class="nav-container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="site-logo">
			</a>
			
			<nav class="main-navigation" id="primary-menu">
				<a href="#product" class="nav-link fs-base">Product</a>
				<a href="#science" class="nav-link fs-base">Science</a>
				<a href="#pipeline" class="nav-link fs-base">Pipeline</a>
				<a href="#about" class="nav-link fs-base">About</a>
				<a href="#news" class="nav-link fs-base">News</a>
			</nav>
			
			<div class="nav-cta">
				<a href="<?php echo esc_url( $cta_link ); ?>" class="btn-outline fs-sm"><?php echo esc_html( $cta_text ); ?></a>
			</div>

			<button class="menu-toggle" aria-label="Toggle Navigation">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</button>
		</div>
	</header>
