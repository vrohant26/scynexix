<?php
$frontpage_id = get_option( 'page_on_front' );
$logo_url = get_post_meta( $frontpage_id, '_navbar_logo', true );
if ( empty( $logo_url ) ) {
	$logo_url = get_template_directory_uri() . '/assets/images/logo.webp';
}
?>
	<!-- Footer Section -->
	<footer class="site-footer">
		<div class="footer-container">
			<div class="footer-top-row">
				<!-- Brand Column -->
				<div class="footer-brand-col">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link">
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="SCYNEXIS" class="footer-logo">
					</a>
					<div class="footer-brand-tagline">Advancing Science With Purpose</div>
					<p class="footer-brand-desc fs-xs">
						SCYNEXIS is a biotechnology company developing innovative therapies to address significant unmet medical needs in severe rare diseases.
					</p>
					<div class="footer-ticker-badge fs-xs">NASDAQ: SCYX</div>
				</div>
				
				<!-- Navigation Columns -->
				<div class="footer-nav-col">
					<h4 class="footer-nav-title fs-xs">Lead Programs</h4>
					<ul class="footer-links-list fs-xs">
						<li><a href="#pipeline">SCY-770 (ADPKD)</a></li>
						<li><a href="#pipeline">SCY-247 (Antifungal)</a></li>
						<li><a href="#pipeline">Fungerp® Platform</a></li>
						<li><a href="#pipeline">BREXAFEMME®</a></li>
					</ul>
				</div>
				
				<div class="footer-nav-col">
					<h4 class="footer-nav-title fs-xs">Investors</h4>
					<ul class="footer-links-list fs-xs">
						<li><a href="#stock-info">Stock Information</a></li>
						<li><a href="#latest-reports">Financial Reports</a></li>
						<li><a href="#investor-center">Investor Center</a></li>
						<li><a href="#news">News & Events</a></li>
					</ul>
				</div>
				
				<div class="footer-nav-col">
					<h4 class="footer-nav-title fs-xs">Corporate</h4>
					<ul class="footer-links-list fs-xs">
						<li><a href="#about">About SCYNEXIS</a></li>
						<li><a href="#purpose">Our Purpose</a></li>
						<li><a href="#partnership">Partnerships</a></li>
						<li><a href="#contact">Contact Us</a></li>
					</ul>
				</div>
			</div>
			
			<!-- Bottom copyright row -->
			<div class="footer-bottom-row fs-xs">
				<div class="footer-copyright">&copy; <?php echo date('Y'); ?> SCYNEXIS, Inc. All rights reserved.</div>
				<div class="footer-legal-links">
					<a href="#privacy">Privacy Policy</a>
					<a href="#terms">Terms of Use</a>
					<a href="#disclaimer">Disclaimer</a>
				</div>
			</div>
		</div>
	</footer>
</div><!-- .site-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
