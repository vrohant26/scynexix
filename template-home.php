<?php
/**
 * Template Name: Homepage
 *
 * @package Scynexis
 */

get_header();

// Fetch current page ID
$page_id = get_the_ID();

// Retrieve Page Metadata with defaults
$hero_prefix = get_post_meta( $page_id, '_meta_prefix', true );
if ( empty( $hero_prefix ) ) {
	$hero_prefix = 'Advancing Innovation for Rare Diseases';
}

$hero_title = get_post_meta( $page_id, '_hero_title', true );
if ( empty( $hero_title ) ) {
	$hero_title = 'Engineering the Next Generation of <em>Rare Disease Therapies</em>.';
}

$hero_desc = get_post_meta( $page_id, '_hero_desc', true );
if ( empty( $hero_desc ) ) {
	$hero_desc = "We're a clinical-stage biotechnology company developing innovative therapies for severe rare diseases through pioneering science, rigorous clinical research, and a commitment to improving patient outcomes worldwide.";
}

$hero_btn1_text = get_post_meta( $page_id, '_btn1_text', true );
if ( empty( $hero_btn1_text ) ) {
	$hero_btn1_text = 'Explore Our Pipeline';
}
$hero_btn1_link = get_post_meta( $page_id, '_btn1_link', true );
if ( empty( $hero_btn1_link ) ) {
	$hero_btn1_link = '#pipeline';
}

$hero_btn2_text = get_post_meta( $page_id, '_btn2_text', true );
if ( empty( $hero_btn2_text ) ) {
	$hero_btn2_text = 'Our Science';
}
$hero_btn2_link = get_post_meta( $page_id, '_btn2_link', true );
if ( empty( $hero_btn2_link ) ) {
	$hero_btn2_link = '#science';
}

$hero_image_url = get_post_meta( $page_id, '_hero_image', true );
if ( empty( $hero_image_url ) ) {
	if ( has_post_thumbnail( $page_id ) ) {
		$hero_image_url = get_the_post_thumbnail_url( $page_id, 'full' );
	} else {
		$hero_image_url = get_template_directory_uri() . '/hero-bg.png';
	}
}

$about_pill = get_post_meta( $page_id, '_about_pill', true );
if ( empty( $about_pill ) ) {
	$about_pill = 'About SCYNEXIS';
}

$about_desc = get_post_meta( $page_id, '_about_desc', true );
if ( empty( $about_desc ) ) {
	$about_desc = 'SCYNEXIS is a clinical-stage biotechnology company advancing innovative therapies for severe rare diseases through breakthrough science, rigorous clinical development, and a commitment to delivering meaningful solutions for patients with unmet medical needs.';
}

$about_btn_text = get_post_meta( $page_id, '_about_btn_text', true );
if ( empty( $about_btn_text ) ) {
	$about_btn_text = 'Learn More About us';
}
$about_btn_link = get_post_meta( $page_id, '_about_btn_link', true );
if ( empty( $about_btn_link ) ) {
	$about_btn_link = '#pipeline';
}

$metrics = array(
	array(
		'val' => get_post_meta( $page_id, '_metric1_val', true ) ?: '25+',
		'lbl' => get_post_meta( $page_id, '_metric1_lbl', true ) ?: 'Years Advancing Innovation',
	),
	array(
		'val' => get_post_meta( $page_id, '_metric2_val', true ) ?: '2',
		'lbl' => get_post_meta( $page_id, '_metric2_lbl', true ) ?: 'Clinical-Stage Programs',
	),
	array(
		'val' => get_post_meta( $page_id, '_metric3_val', true ) ?: '1',
		'lbl' => get_post_meta( $page_id, '_metric3_lbl', true ) ?: 'Mission to Improve Lives',
	),
	array(
		'val' => get_post_meta( $page_id, '_metric4_val', true ) ?: '100%',
		'lbl' => get_post_meta( $page_id, '_metric4_lbl', true ) ?: 'Focused on Rare Diseases',
	),
);

// Fetch Disease Areas metadata
$disease_subtitle = get_post_meta( $page_id, '_disease_subtitle', true );
if ( empty( $disease_subtitle ) ) {
	$disease_subtitle = 'Disease Areas';
}

$disease_title = get_post_meta( $page_id, '_disease_title', true );
if ( empty( $disease_title ) ) {
	$disease_title = 'Focused on Diseases With the <em>Greatest Unmet Need</em>';
}

$disease_desc = get_post_meta( $page_id, '_disease_desc', true );
if ( empty( $disease_desc ) ) {
	$disease_desc = 'We develop innovative therapies for conditions where current treatment options remain limited, combining breakthrough science with a patient-first approach to create meaningful clinical impact.';
}

$disease_c1_title = get_post_meta( $page_id, '_disease_c1_title', true );
if ( empty( $disease_c1_title ) ) {
	$disease_c1_title = 'Rare Kidney Disease';
}

$disease_c1_desc = get_post_meta( $page_id, '_disease_c1_desc', true );
if ( empty( $disease_c1_desc ) ) {
	$disease_c1_desc = 'Advancing innovative therapies for Autosomal Dominant Polycystic Kidney Disease (ADPKD) with the goal of slowing disease progression and improving long-term patient outcomes.';
}

$disease_c1_btn_text = get_post_meta( $page_id, '_disease_c1_btn_text', true );
if ( empty( $disease_c1_btn_text ) ) {
	$disease_c1_btn_text = 'Learn More';
}

$disease_c1_btn_link = get_post_meta( $page_id, '_disease_c1_btn_link', true );
if ( empty( $disease_c1_btn_link ) ) {
	$disease_c1_btn_link = '#kidney';
}

$disease_c2_title = get_post_meta( $page_id, '_disease_c2_title', true );
if ( empty( $disease_c2_title ) ) {
	$disease_c2_title = 'Serious Fungal Infections';
}

$disease_c2_desc = get_post_meta( $page_id, '_disease_c2_desc', true );
if ( empty( $disease_c2_desc ) ) {
	$disease_c2_desc = 'Developing next-generation antifungal therapies designed to combat drug-resistant and life-threatening fungal infections through novel scientific approaches.';
}

$disease_c2_btn_text = get_post_meta( $page_id, '_disease_c2_btn_text', true );
if ( empty( $disease_c2_btn_text ) ) {
	$disease_c2_btn_text = 'Explore Research';
}

$disease_c2_btn_link = get_post_meta( $page_id, '_disease_c2_btn_link', true );
if ( empty( $disease_c2_btn_link ) ) {
	$disease_c2_btn_link = '#fungal';
}

// Fetch Pipeline metadata
$pipe_subtitle = get_post_meta( $page_id, '_pipe_subtitle', true );
if ( empty( $pipe_subtitle ) ) {
	$pipe_subtitle = 'Our Pipeline';
}

$pipe_title = get_post_meta( $page_id, '_pipe_title', true );
if ( empty( $pipe_title ) ) {
	$pipe_title = 'Advancing a Diverse <em>Pipeline of Innovative Therapies</em>';
}

$pipe_desc = get_post_meta( $page_id, '_pipe_desc', true );
if ( empty( $pipe_desc ) ) {
	$pipe_desc = 'From rare kidney disease to life-threatening fungal infections, our pipeline combines breakthrough science with clinical development to address conditions where better treatment options are urgently needed.';
}

$pipe_body = get_post_meta( $page_id, '_pipe_body', true );
if ( empty( $pipe_body ) ) {
	$pipe_body = 'Our programs span early research, clinical development, and approved therapies, creating a balanced portfolio focused on delivering meaningful advances for patients with significant unmet medical needs.';
}

$pipe_c1_title = get_post_meta( $page_id, '_pipe_c1_title', true );
if ( empty( $pipe_c1_title ) ) {
	$pipe_c1_title = 'SCY-770';
}
$pipe_c1_sub = get_post_meta( $page_id, '_pipe_c1_sub', true );
if ( empty( $pipe_c1_sub ) ) {
	$pipe_c1_sub = 'Rare Kidney Disease (ADPKD)';
}
$pipe_c1_desc = get_post_meta( $page_id, '_pipe_c1_desc', true );
if ( empty( $pipe_c1_desc ) ) {
	$pipe_c1_desc = 'A highly selective direct AMPK activator being developed to target the underlying mechanisms of Autosomal Dominant Polycystic Kidney Disease, with the goal of slowing disease progression.';
}
$pipe_c1_status = get_post_meta( $page_id, '_pipe_c1_status', true );
if ( empty( $pipe_c1_status ) ) {
	$pipe_c1_status = 'Clinical Development';
}

$pipe_c2_title = get_post_meta( $page_id, '_pipe_c2_title', true );
if ( empty( $pipe_c2_title ) ) {
	$pipe_c2_title = 'SCY-247';
}
$pipe_c2_sub = get_post_meta( $page_id, '_pipe_c2_sub', true );
if ( empty( $pipe_c2_sub ) ) {
	$pipe_c2_sub = 'Next-Generation Antifungal Therapy';
}
$pipe_c2_desc = get_post_meta( $page_id, '_pipe_c2_desc', true );
if ( empty( $pipe_c2_desc ) ) {
	$pipe_c2_desc = 'A second-generation fungerp designed for both oral and intravenous administration, targeting invasive and drug-resistant fungal infections with broad-spectrum activity.';
}
$pipe_c2_status = get_post_meta( $page_id, '_pipe_c2_status', true );
if ( empty( $pipe_c2_status ) ) {
	$pipe_c2_status = 'Clinical Development';
}

$pipe_c3_title = get_post_meta( $page_id, '_pipe_c3_title', true );
if ( empty( $pipe_c3_title ) ) {
	$pipe_c3_title = 'Fungerp® Analogs';
}
$pipe_c3_sub = get_post_meta( $page_id, '_pipe_c3_sub', true );
if ( empty( $pipe_c3_sub ) ) {
	$pipe_c3_sub = 'Expanding the Antifungal Platform';
}
$pipe_c3_desc = get_post_meta( $page_id, '_pipe_c3_desc', true );
if ( empty( $pipe_c3_desc ) ) {
	$pipe_c3_desc = 'Advancing structurally distinct antifungal compounds to strengthen the next generation of therapies against resistant fungal pathogens and future infectious disease challenges.';
}
$pipe_c3_status = get_post_meta( $page_id, '_pipe_c3_status', true );
if ( empty( $pipe_c3_status ) ) {
	$pipe_c3_status = 'Preclinical Research';
}

$pipe_c4_title = get_post_meta( $page_id, '_pipe_c4_title', true );
if ( empty( $pipe_c4_title ) ) {
	$pipe_c4_title = 'BREXAFEMME®';
}
$pipe_c4_sub = get_post_meta( $page_id, '_pipe_c4_sub', true );
if ( empty( $pipe_c4_sub ) ) {
	$pipe_c4_sub = 'Approved & Partnered Therapy';
}
$pipe_c4_desc = get_post_meta( $page_id, '_pipe_c4_desc', true );
if ( empty( $pipe_c4_desc ) ) {
	$pipe_c4_desc = 'The first approved medicine from the Fungerp® platform, licensed to GSK, demonstrating the successful translation of innovative science into approved treatment.';
}
$pipe_c4_status = get_post_meta( $page_id, '_pipe_c4_status', true );
if ( empty( $pipe_c4_status ) ) {
	$pipe_c4_status = 'Approved & Licensed';
}

$pipe_btn_text = get_post_meta( $page_id, '_pipe_btn_text', true );
if ( empty( $pipe_btn_text ) ) {
	$pipe_btn_text = 'Explore the Full Pipeline';
}
$pipe_btn_link = get_post_meta( $page_id, '_pipe_btn_link', true );
if ( empty( $pipe_btn_link ) ) {
	$pipe_btn_link = '#pipeline';
}

// Fetch News metadata
$news_subtitle = get_post_meta( $page_id, '_news_subtitle', true );
if ( empty( $news_subtitle ) ) {
	$news_subtitle = 'Latest News';
}

$news_title = get_post_meta( $page_id, '_news_title', true );
if ( empty( $news_title ) ) {
	$news_title = 'Stay Up to Date With Our <em>Latest Progress</em>';
}

$news_desc = get_post_meta( $page_id, '_news_desc', true );
if ( empty( $news_desc ) ) {
	$news_desc = 'Follow the latest scientific advancements, clinical milestones, corporate announcements, and investor updates as we continue advancing innovative therapies for patients with significant unmet medical needs.';
}

$news_btn_text = get_post_meta( $page_id, '_news_btn_text', true );
if ( empty( $news_btn_text ) ) {
	$news_btn_text = 'View All';
}

$news_btn_link = get_post_meta( $page_id, '_news_btn_link', true );
if ( empty( $news_btn_link ) ) {
	$news_btn_link = '#news';
}

// Pull the 7 latest posts
$news_query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 7,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

// Fetch Purpose metadata
$purpose_subtitle = get_post_meta( $page_id, '_purpose_subtitle', true );
if ( empty( $purpose_subtitle ) ) {
	$purpose_subtitle = 'Our Purpose';
}

$purpose_title = get_post_meta( $page_id, '_purpose_title', true );
if ( empty( $purpose_title ) ) {
	$purpose_title = 'Advancing Science With <em>Purpose for Patients</em> Worldwide';
}

$purpose_desc = get_post_meta( $page_id, '_purpose_desc', true );
if ( empty( $purpose_desc ) ) {
	$purpose_desc = 'Every discovery at SCYNEXIS is driven by a commitment to addressing significant unmet medical needs. Through innovative research, clinical expertise, and scientific collaboration, we develop therapies designed to improve outcomes for patients living with severe rare diseases.';
}

$purpose_metric1_val = get_post_meta( $page_id, '_purpose_metric1_val', true );
if ( empty( $purpose_metric1_val ) ) {
	$purpose_metric1_val = '25+';
}
$purpose_metric1_lbl = get_post_meta( $page_id, '_purpose_metric1_lbl', true );
if ( empty( $purpose_metric1_lbl ) ) {
	$purpose_metric1_lbl = 'Years of Scientific Innovation';
}

$purpose_metric2_val = get_post_meta( $page_id, '_purpose_metric2_val', true );
if ( empty( $purpose_metric2_val ) ) {
	$purpose_metric2_val = '2';
}
$purpose_metric2_lbl = get_post_meta( $page_id, '_purpose_metric2_lbl', true );
if ( empty( $purpose_metric2_lbl ) ) {
	$purpose_metric2_lbl = 'Clinical-Stage Lead Programs';
}

$purpose_btn_text = get_post_meta( $page_id, '_purpose_btn_text', true );
if ( empty( $purpose_btn_text ) ) {
	$purpose_btn_text = 'Learn More About Us';
}

$purpose_btn_link = get_post_meta( $page_id, '_purpose_btn_link', true );
if ( empty( $purpose_btn_link ) ) {
	$purpose_btn_link = '#purpose';
}

$purpose_image_url = get_post_meta( $page_id, '_purpose_image', true );
if ( empty( $purpose_image_url ) ) {
	$purpose_image_url = get_template_directory_uri() . '/assets/images/purpose-science.png';
}
?>

<main class="site-main">
	<section class="hero-split">
		<div class="hero-content-col">
			<div class="hero-content-inner">
				<div class="meta-prefix fs-xs"><?php echo esc_html( $hero_prefix ); ?></div>
				
				<h1 class="headline fs-display"><?php echo wp_kses_post( $hero_title ); ?></h1>
				
				<div class="description fs-md">
					<?php echo wp_kses_post( wpautop( $hero_desc ) ); ?>
				</div>
				
				<div class="hero-actions">
					<a href="<?php echo esc_url( $hero_btn1_link ); ?>" class="btn btn-primary fs-base"><?php echo esc_html( $hero_btn1_text ); ?></a>
					<a href="<?php echo esc_url( $hero_btn2_link ); ?>" class="btn-secondary fs-base"><?php echo esc_html( $hero_btn2_text ); ?></a>
				</div>
			</div>
		</div>
		
		<div class="hero-image-col">
			<div class="hero-image" style="background-image: url('<?php echo esc_url( $hero_image_url ); ?>');">
				<div class="image-overlay"></div>
			</div>
		</div>
	</section>

	<section class="about-section">
		<div class="about-container">
			<div class="about-header-row">
				<div class="about-pill-col">
					<div class="about-pill">
						<span class="pill-dot"></span>
						<span class="pill-text fs-xs"><?php echo esc_html( $about_pill ); ?></span>
					</div>
				</div>
				<div class="about-desc-col">
					<div class="about-description fs-display-small">
						<?php echo wp_kses_post( wpautop( $about_desc ) ); ?>
					</div>
					
					<div class="about-metrics-grid">
						<?php foreach ( $metrics as $metric ) : ?>
							<div class="metric-column">
								<div class="metric-number"><?php echo esc_html( $metric['val'] ); ?></div>
								<div class="metric-label fs-xs"><?php echo esc_html( $metric['lbl'] ); ?></div>
							</div>
						<?php endforeach; ?>
					</div>
					
					<a href="<?php echo esc_url( $about_btn_link ); ?>" class="btn btn-primary fs-base"><?php echo esc_html( $about_btn_text ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<section class="purpose-section">
		<div class="purpose-container">
			<div class="purpose-grid">
				<div class="purpose-media-col">
					<div class="purpose-image-wrapper">
						<img src="<?php echo esc_url( $purpose_image_url ); ?>" alt="SCYNEXIS Scientific Purpose" class="purpose-main-image" />
					</div>
				</div>
				<div class="purpose-content-col">
					<div class="purpose-subtitle fs-xs"><?php echo esc_html( $purpose_subtitle ); ?></div>
					<h2 class="purpose-title"><?php echo wp_kses_post( $purpose_title ); ?></h2>
					
					<div class="purpose-desc fs-md">
						<p><?php echo esc_html( $purpose_desc ); ?></p>
					</div>

					<div class="purpose-metrics-row">
						<div class="purpose-metric-item">
							<div class="purpose-metric-val"><?php echo esc_html( $purpose_metric1_val ); ?></div>
							<div class="purpose-metric-lbl fs-xs"><?php echo esc_html( $purpose_metric1_lbl ); ?></div>
						</div>
						<div class="purpose-metric-item">
							<div class="purpose-metric-val"><?php echo esc_html( $purpose_metric2_val ); ?></div>
							<div class="purpose-metric-lbl fs-xs"><?php echo esc_html( $purpose_metric2_lbl ); ?></div>
						</div>
					</div>

					<div class="purpose-actions">
						<a href="<?php echo esc_url( $purpose_btn_link ); ?>" class="btn btn-primary fs-base"><?php echo esc_html( $purpose_btn_text ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="disease-section">
		<div class="disease-container">
			<div class="disease-header">
				<div class="disease-subtitle fs-xs"><?php echo esc_html( $disease_subtitle ); ?></div>
				<h2 class="disease-title"><?php echo wp_kses_post( $disease_title ); ?></h2>
				<div class="disease-desc fs-md">
					<p><?php echo esc_html( $disease_desc ); ?></p>
				</div>
			</div>
			
			<div class="disease-grid">
				<div class="disease-card">
					<h3 class="disease-card-title"><?php echo esc_html( $disease_c1_title ); ?></h3>
					<p class="disease-card-desc fs-base"><?php echo esc_html( $disease_c1_desc ); ?></p>
					<a href="<?php echo esc_url( $disease_c1_btn_link ); ?>" class="disease-card-link fs-base"><?php echo esc_html( $disease_c1_btn_text ); ?> <span class="arrow">&rarr;</span></a>
				</div>
				<div class="disease-card">
					<h3 class="disease-card-title"><?php echo esc_html( $disease_c2_title ); ?></h3>
					<p class="disease-card-desc fs-base"><?php echo esc_html( $disease_c2_desc ); ?></p>
					<a href="<?php echo esc_url( $disease_c2_btn_link ); ?>" class="disease-card-link fs-base"><?php echo esc_html( $disease_c2_btn_text ); ?> <span class="arrow">&rarr;</span></a>
				</div>
			</div>
		</div>
	</section>

	<section class="pipeline-section">
		<div class="pipeline-container">
			<div class="pipeline-grid">
				<div class="pipeline-sticky-col">
					<div class="pipeline-subtitle fs-xs"><?php echo esc_html( $pipe_subtitle ); ?></div>
					<h2 class="pipeline-title"><?php echo wp_kses_post( $pipe_title ); ?></h2>
					<div class="pipeline-desc fs-md">
						<p><?php echo esc_html( $pipe_desc ); ?></p>
					</div>
					<div class="pipeline-intro-body fs-base">
						<p><?php echo esc_html( $pipe_body ); ?></p>
					</div>
					<div class="pipeline-actions">
						<a href="<?php echo esc_url( $pipe_btn_link ); ?>" class="btn btn-primary fs-base"><?php echo esc_html( $pipe_btn_text ); ?></a>
					</div>
				</div>
				
				<div class="pipeline-cards-col">
					<!-- Program Card 1 -->
					<div class="pipeline-card">
						<div class="pipeline-card-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/Kidney Icon.svg" alt="Kidney icon" /></div>
						<div class="pipeline-badge badge-clinical"><?php echo esc_html( $pipe_c1_status ); ?></div>
						<h3 class="pipeline-card-title"><?php echo esc_html( $pipe_c1_title ); ?></h3>
						<div class="pipeline-card-subtitle fs-xs"><?php echo esc_html( $pipe_c1_sub ); ?></div>
						<div class="pipeline-card-divider"></div>
						<p class="pipeline-card-desc fs-sm"><?php echo esc_html( $pipe_c1_desc ); ?></p>
					</div>
					
					<!-- Program Card 2 -->
					<div class="pipeline-card">
						<div class="pipeline-card-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/Cell Icon.svg" alt="Cell icon" /></div>
						<div class="pipeline-badge badge-clinical"><?php echo esc_html( $pipe_c2_status ); ?></div>
						<h3 class="pipeline-card-title"><?php echo esc_html( $pipe_c2_title ); ?></h3>
						<div class="pipeline-card-subtitle fs-xs"><?php echo esc_html( $pipe_c2_sub ); ?></div>
						<div class="pipeline-card-divider"></div>
						<p class="pipeline-card-desc fs-sm"><?php echo esc_html( $pipe_c2_desc ); ?></p>
					</div>
					
					<!-- Program Card 3 -->
					<div class="pipeline-card">
						<div class="pipeline-card-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/Molecule icon.svg" alt="Molecule icon" /></div>
						<div class="pipeline-badge badge-preclinical"><?php echo esc_html( $pipe_c3_status ); ?></div>
						<h3 class="pipeline-card-title"><?php echo esc_html( $pipe_c3_title ); ?></h3>
						<div class="pipeline-card-subtitle fs-xs"><?php echo esc_html( $pipe_c3_sub ); ?></div>
						<div class="pipeline-card-divider"></div>
						<p class="pipeline-card-desc fs-sm"><?php echo esc_html( $pipe_c3_desc ); ?></p>
					</div>
					
					<!-- Program Card 4 -->
					<div class="pipeline-card">
						<div class="pipeline-card-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/Capsule Icon.svg" alt="Capsule icon" /></div>
						<div class="pipeline-badge badge-approved"><?php echo esc_html( $pipe_c4_status ); ?></div>
						<h3 class="pipeline-card-title"><?php echo esc_html( $pipe_c4_title ); ?></h3>
						<div class="pipeline-card-subtitle fs-xs"><?php echo esc_html( $pipe_c4_sub ); ?></div>
						<div class="pipeline-card-divider"></div>
						<p class="pipeline-card-desc fs-sm"><?php echo esc_html( $pipe_c4_desc ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="news-section">
		<div class="news-container">
			<div class="news-header">
				<div class="news-header-content">
					<div class="news-subtitle fs-xs"><?php echo esc_html( $news_subtitle ); ?></div>
					<h2 class="news-title"><?php echo wp_kses_post( $news_title ); ?></h2>
					<div class="news-desc fs-md">
						<p><?php echo esc_html( $news_desc ); ?></p>
					</div>
				</div>
				<div class="news-slider-nav">
					<button type="button" class="news-nav-prev" aria-label="Previous news">&larr;</button>
					<button type="button" class="news-nav-next" aria-label="Next news">&rarr;</button>
				</div>
			</div>
			
			<div class="news-slider-wrapper">
				<div class="news-track">
					<div class="news-card">
						<div class="news-card-date fs-xs">06/30/26</div>
						<h3 class="news-card-title">SCYNEXIS Initiates Phase 1 Study of SCY-770, a Novel AMPK Activator for the Treatment of Autosomal Dominant Polycystic Kidney Disease (ADPKD)</h3>
						<div class="news-card-cta fs-xs">Read More &rarr;</div>
					</div>
					<div class="news-card">
						<div class="news-card-date fs-xs">05/22/26</div>
						<h3 class="news-card-title">SCYNEXIS Announces One-for-Eight Reverse Stock Split</h3>
						<div class="news-card-cta fs-xs">Read More &rarr;</div>
					</div>
					<div class="news-card">
						<div class="news-card-date fs-xs">05/11/26</div>
						<h3 class="news-card-title">SCYNEXIS Reports First Quarter 2026 Financial Results and Provides Corporate Update</h3>
						<div class="news-card-cta fs-xs">Read More &rarr;</div>
					</div>
					<div class="news-card">
						<div class="news-card-date fs-xs">05/07/26</div>
						<h3 class="news-card-title">SCYNEXIS Announces Inducement Awards Under Nasdaq Listing Rule 5635(c)(4)</h3>
						<div class="news-card-cta fs-xs">Read More &rarr;</div>
					</div>
					<div class="news-card">
						<div class="news-card-date fs-xs">03/31/26</div>
						<h3 class="news-card-title">SCYNEXIS Announces $40.0 Million Private Placement</h3>
						<div class="news-card-cta fs-xs">Read More &rarr;</div>
					</div>
					<div class="news-card">
						<div class="news-card-date fs-xs">03/31/26</div>
						<h3 class="news-card-title">SCYNEXIS Completes Transformative Acquisition of PXL-770, an Innovative, Highly Selective, Direct AMPK Activator for the Treatment of Autosomal Dominant Polycystic Kidney Disease (ADPKD)</h3>
						<div class="news-card-cta fs-xs">Read More &rarr;</div>
					</div>
					<div class="news-card">
						<div class="news-card-date fs-xs">03/04/26</div>
						<h3 class="news-card-title">SCYNEXIS Reports Full Year 2025 Financial Results and Provides Corporate Update</h3>
						<div class="news-card-cta fs-xs">Read More &rarr;</div>
					</div>
				</div>
			</div>
			
			<div class="news-footer">
				<a href="<?php echo esc_url( $news_btn_link ); ?>" class="btn btn-outline-light fs-base"><?php echo esc_html( $news_btn_text ); ?></a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
