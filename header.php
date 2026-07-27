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

// Fetch Top Ticker metadata
$ticker_price = get_post_meta( $frontpage_id, '_ticker_price', true );
if ( empty( $ticker_price ) ) {
	$ticker_price = '0.84'; // Default price value
}

$ticker_change = get_post_meta( $frontpage_id, '_ticker_change', true );
if ( empty( $ticker_change ) ) {
	$ticker_change = '+0.03 (+3.7%)';
}

$ticker_cash = get_post_meta( $frontpage_id, '_ticker_cash', true );
if ( empty( $ticker_cash ) ) {
	$ticker_cash = '~$43.0M';
}

$ticker_runway = get_post_meta( $frontpage_id, '_ticker_runway', true );
if ( empty( $ticker_runway ) ) {
	$ticker_runway = 'mid-2029';
}

$ticker_btn_text = get_post_meta( $frontpage_id, '_ticker_btn_text', true );
if ( empty( $ticker_btn_text ) ) {
	$ticker_btn_text = 'Investors Hub';
}

$ticker_btn_link = get_post_meta( $frontpage_id, '_ticker_btn_link', true );
if ( empty( $ticker_btn_link ) ) {
	$ticker_btn_link = '#investors';
}
?>

<div class="site-wrapper">
	<!-- TOP TICKER NAVBAR -->
	<div class="top-ticker-navbar">
		<div class="ticker-container">
			<button class="ticker-nav-btn prev-btn" aria-label="Previous Ticker Section">
				<svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
			</button>
			
			<div class="ticker-items-wrapper">
				<div class="ticker-column">
					<span class="ticker-label">NASDAQ / LAST</span>
					<div class="ticker-value">
						<span class="stock-currency">$</span><span class="stock-price-val"><?php echo esc_html( $ticker_price ); ?></span>
						<span class="stock-change up">
							<span class="change-indicator">&uarr;</span>
							<span class="change-val"><?php echo esc_html( $ticker_change ); ?></span>
						</span>
					</div>
				</div>
				
				<div class="ticker-divider"></div>
				
				<div class="ticker-column">
					<span class="ticker-label">CASH</span>
					<div class="ticker-value font-serif"><?php echo esc_html( $ticker_cash ); ?></div>
				</div>
				
				<div class="ticker-divider"></div>
				
				<div class="ticker-column">
					<span class="ticker-label">RUNWAY</span>
					<div class="ticker-value font-serif"><?php echo esc_html( $ticker_runway ); ?></div>
				</div>
				
				<div class="ticker-divider"></div>
				
				<div class="ticker-column btn-col">
					<a href="<?php echo esc_url( $ticker_btn_link ); ?>" class="ticker-btn"><?php echo esc_html( $ticker_btn_text ); ?></a>
				</div>
			</div>
			
			<button class="ticker-nav-btn next-btn" aria-label="Next Ticker Section">
				<svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</button>
		</div>
	</div>

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
