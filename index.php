<?php
/**
 * The main template file
 *
 * @package Scynexis
 */

get_header();
?>

<main class="site-main">
	<section class="hero-split">
		<div class="hero-content-col">
			<div class="hero-content-inner">
				<div class="meta-prefix fs-xs">Advancing Innovation for Rare Diseases</div>
				
				<h1 class="headline fs-display">Engineering the Next Generation of <em>Rare Disease Therapies</em>.</h1>
				
				<p class="description fs-md">
					We're a clinical-stage biotechnology company developing innovative therapies for severe rare diseases through pioneering science, rigorous clinical research, and a commitment to improving patient outcomes worldwide.
				</p>
				
				<div class="hero-actions">
					<a href="#pipeline" class="btn btn-primary fs-base">Explore Our Pipeline</a>
					<a href="#science" class="btn-secondary fs-base">Our Science</a>
				</div>
			</div>
		</div>
		
		<div class="hero-image-col">
			<div class="hero-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/hero-bg.png' ); ?>');">
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
						<span class="pill-text fs-xs">About SCYNEXIS</span>
					</div>
				</div>
				<div class="about-desc-col">
					<p class="about-description fs-display-small">
						SCYNEXIS is a clinical-stage biotechnology company advancing innovative therapies for severe rare diseases through breakthrough science, rigorous clinical development, and a commitment to delivering meaningful solutions for patients with unmet medical needs.
					</p>
					
					<div class="about-metrics-grid">
						<div class="metric-column">
							<div class="metric-number">25+</div>
							<div class="metric-label fs-xs">Years Advancing Innovation</div>
						</div>
						
						<div class="metric-column">
							<div class="metric-number">2</div>
							<div class="metric-label fs-xs">Clinical-Stage Programs</div>
						</div>
						
						<div class="metric-column">
							<div class="metric-number">1</div>
							<div class="metric-label fs-xs">Mission to Improve Lives</div>
						</div>
						
						<div class="metric-column">
							<div class="metric-number">100%</div>
							<div class="metric-label fs-xs">Focused on Rare Diseases</div>
						</div>
					</div>
                    <a href="#pipeline" class="btn btn-primary fs-base">Learn More About us</a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
