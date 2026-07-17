<?php
/**
 * Scynexis functions and definitions
 *
 * @package Scynexis
 */

// Add basic theme support if needed in the future.
add_action( 'after_setup_theme', 'scynexis_setup' );
if ( ! function_exists( 'scynexis_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function scynexis_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Featured Images (Post Thumbnails)
		add_theme_support( 'post-thumbnails' );
	}
}

/**
 * Enqueue scripts and styles.
 */
function scynexis_scripts() {
	// Enqueue DM Sans Google Fonts.
	wp_enqueue_style( 'scynexis-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;700&display=swap', array(), null );

	// Enqueue style.css with dynamic version to prevent browser caching
	$theme_css_ver = file_exists( get_template_directory() . '/style.css' ) ? filemtime( get_template_directory() . '/style.css' ) : '1.0.0';
	wp_enqueue_style( 'scynexis-style', get_stylesheet_uri(), array( 'scynexis-fonts' ), $theme_css_ver );

	// Enqueue main.js with dynamic version to prevent browser caching
	$theme_js_ver = file_exists( get_template_directory() . '/main.js' ) ? filemtime( get_template_directory() . '/main.js' ) : '1.0.0';
	wp_enqueue_script( 'scynexis-main', get_template_directory_uri() . '/main.js', array(), $theme_js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'scynexis_scripts' );

/**
 * Enqueue Media Uploader scripts for the admin panel
 */
function scynexis_admin_media_scripts( $hook ) {
	if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
		wp_enqueue_media();
	}
}
add_action( 'admin_enqueue_scripts', 'scynexis_admin_media_scripts' );

/**
 * Hide default WordPress content editor when editing pages assigned to template-home.php
 */
function scynexis_hide_editor() {
	$post_id = isset( $_GET['post'] ) ? $_GET['post'] : ( isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : false );
	if ( ! $post_id ) {
		return;
	}

	$template = get_post_meta( $post_id, '_wp_page_template', true );
	if ( 'template-home.php' === $template ) {
		remove_post_type_support( 'page', 'editor' );
	}
}
add_action( 'admin_init', 'scynexis_hide_editor' );

/**
 * Add Homepage Layout Metabox for Pages
 */
function scynexis_add_page_metaboxes() {
	global $post;
	if ( ! $post ) {
		return;
	}

	// Verify template selection
	$template = get_post_meta( $post->ID, '_wp_page_template', true );
	if ( 'template-home.php' === $template ) {
		add_meta_box(
			'scynexis_home_meta',
			'Homepage Content Settings',
			'scynexis_render_home_metabox',
			'page',
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'scynexis_add_page_metaboxes' );

/**
 * Render Homepage Metabox Fields
 */
function scynexis_render_home_metabox( $post ) {
	// Add Nonce for security
	wp_nonce_field( 'scynexis_save_home_meta', 'scynexis_home_meta_nonce' );

	// Retrieve Navbar metadata
	$navbar_logo     = get_post_meta( $post->ID, '_navbar_logo', true );
	$navbar_cta_text = get_post_meta( $post->ID, '_navbar_cta_text', true );
	$navbar_cta_link = get_post_meta( $post->ID, '_navbar_cta_link', true );

	// Retrieve Hero metadata
	$prefix         = get_post_meta( $post->ID, '_meta_prefix', true );
	$hero_title     = get_post_meta( $post->ID, '_hero_title', true );
	$hero_desc      = get_post_meta( $post->ID, '_hero_desc', true );
	$hero_image     = get_post_meta( $post->ID, '_hero_image', true );
	$btn1_text      = get_post_meta( $post->ID, '_btn1_text', true );
	$btn1_link      = get_post_meta( $post->ID, '_btn1_link', true );
	$btn2_text      = get_post_meta( $post->ID, '_btn2_text', true );
	$btn2_link      = get_post_meta( $post->ID, '_btn2_link', true );

	// Retrieve About metadata
	$about_pill     = get_post_meta( $post->ID, '_about_pill', true );
	$about_desc     = get_post_meta( $post->ID, '_about_desc', true );
	$about_btn_text = get_post_meta( $post->ID, '_about_btn_text', true );
	$about_btn_link = get_post_meta( $post->ID, '_about_btn_link', true );

	$metric1_val    = get_post_meta( $post->ID, '_metric1_val', true );
	$metric1_lbl    = get_post_meta( $post->ID, '_metric1_lbl', true );
	$metric2_val    = get_post_meta( $post->ID, '_metric2_val', true );
	$metric2_lbl    = get_post_meta( $post->ID, '_metric2_lbl', true );
	$metric3_val    = get_post_meta( $post->ID, '_metric3_val', true );
	$metric3_lbl    = get_post_meta( $post->ID, '_metric3_lbl', true );
	$metric4_val    = get_post_meta( $post->ID, '_metric4_val', true );
	$metric4_lbl    = get_post_meta( $post->ID, '_metric4_lbl', true );


	// Retrieve Disease Areas metadata
	$disease_subtitle    = get_post_meta( $post->ID, '_disease_subtitle', true );
	$disease_title       = get_post_meta( $post->ID, '_disease_title', true );
	$disease_desc        = get_post_meta( $post->ID, '_disease_desc', true );
	$disease_c1_title    = get_post_meta( $post->ID, '_disease_c1_title', true );
	$disease_c1_desc     = get_post_meta( $post->ID, '_disease_c1_desc', true );
	$disease_c1_btn_text = get_post_meta( $post->ID, '_disease_c1_btn_text', true );
	$disease_c1_btn_link = get_post_meta( $post->ID, '_disease_c1_btn_link', true );
	$disease_c2_title    = get_post_meta( $post->ID, '_disease_c2_title', true );
	$disease_c2_desc     = get_post_meta( $post->ID, '_disease_c2_desc', true );
	$disease_c2_btn_text = get_post_meta( $post->ID, '_disease_c2_btn_text', true );
	$disease_c2_btn_link = get_post_meta( $post->ID, '_disease_c2_btn_link', true );

	// Retrieve Pipeline metadata
	$pipe_subtitle    = get_post_meta( $post->ID, '_pipe_subtitle', true );
	$pipe_title       = get_post_meta( $post->ID, '_pipe_title', true );
	$pipe_desc        = get_post_meta( $post->ID, '_pipe_desc', true );
	$pipe_body        = get_post_meta( $post->ID, '_pipe_body', true );
	
	$pipe_c1_title    = get_post_meta( $post->ID, '_pipe_c1_title', true );
	$pipe_c1_sub      = get_post_meta( $post->ID, '_pipe_c1_sub', true );
	$pipe_c1_desc     = get_post_meta( $post->ID, '_pipe_c1_desc', true );
	$pipe_c1_status   = get_post_meta( $post->ID, '_pipe_c1_status', true );
	
	$pipe_c2_title    = get_post_meta( $post->ID, '_pipe_c2_title', true );
	$pipe_c2_sub      = get_post_meta( $post->ID, '_pipe_c2_sub', true );
	$pipe_c2_desc     = get_post_meta( $post->ID, '_pipe_c2_desc', true );
	$pipe_c2_status   = get_post_meta( $post->ID, '_pipe_c2_status', true );
	
	$pipe_c3_title    = get_post_meta( $post->ID, '_pipe_c3_title', true );
	$pipe_c3_sub      = get_post_meta( $post->ID, '_pipe_c3_sub', true );
	$pipe_c3_desc     = get_post_meta( $post->ID, '_pipe_c3_desc', true );
	$pipe_c3_status   = get_post_meta( $post->ID, '_pipe_c3_status', true );
	
	$pipe_c4_title    = get_post_meta( $post->ID, '_pipe_c4_title', true );
	$pipe_c4_sub      = get_post_meta( $post->ID, '_pipe_c4_sub', true );
	$pipe_c4_desc     = get_post_meta( $post->ID, '_pipe_c4_desc', true );
	$pipe_c4_status   = get_post_meta( $post->ID, '_pipe_c4_status', true );
	
	$pipe_btn_text    = get_post_meta( $post->ID, '_pipe_btn_text', true );
	$pipe_btn_link    = get_post_meta( $post->ID, '_pipe_btn_link', true );

	// Retrieve News metadata
	$news_subtitle   = get_post_meta( $post->ID, '_news_subtitle', true );
	$news_title      = get_post_meta( $post->ID, '_news_title', true );
	$news_desc       = get_post_meta( $post->ID, '_news_desc', true );
	$news_btn_text   = get_post_meta( $post->ID, '_news_btn_text', true );
	$news_btn_link   = get_post_meta( $post->ID, '_news_btn_link', true );

	// Retrieve Investor Relations metadata
	$investor_subtitle       = get_post_meta( $post->ID, '_investor_subtitle', true );
	$investor_title          = get_post_meta( $post->ID, '_investor_title', true );
	$investor_desc           = get_post_meta( $post->ID, '_investor_desc', true );
	$investor_btn1_text      = get_post_meta( $post->ID, '_investor_btn1_text', true );
	$investor_btn1_link      = get_post_meta( $post->ID, '_investor_btn1_link', true );
	$investor_btn2_text      = get_post_meta( $post->ID, '_investor_btn2_text', true );
	$investor_btn2_link      = get_post_meta( $post->ID, '_investor_btn2_link', true );
	$investor_ticker         = get_post_meta( $post->ID, '_investor_ticker', true );
	$investor_stock_price    = get_post_meta( $post->ID, '_investor_stock_price', true );
	$investor_stock_change   = get_post_meta( $post->ID, '_investor_stock_change', true );
	$investor_market_cap     = get_post_meta( $post->ID, '_investor_market_cap', true );
	$investor_range          = get_post_meta( $post->ID, '_investor_range', true );
	$investor_volume         = get_post_meta( $post->ID, '_investor_volume', true );
	$investor_stock_btn_text = get_post_meta( $post->ID, '_investor_stock_btn_text', true );
	$investor_stock_btn_link = get_post_meta( $post->ID, '_investor_stock_btn_link', true );

	// Retrieve CTA Banner and FAQ metadata
	$cta_banner_subtitle  = get_post_meta( $post->ID, '_cta_banner_subtitle', true );
	$cta_banner_title     = get_post_meta( $post->ID, '_cta_banner_title', true );
	$cta_banner_desc      = get_post_meta( $post->ID, '_cta_banner_desc', true );
	$cta_banner_btn_text  = get_post_meta( $post->ID, '_cta_banner_btn_text', true );
	$cta_banner_btn_link  = get_post_meta( $post->ID, '_cta_banner_btn_link', true );
	$faq_subtitle         = get_post_meta( $post->ID, '_faq_subtitle', true );
	$faq_title            = get_post_meta( $post->ID, '_faq_title', true );
	$faq_desc             = get_post_meta( $post->ID, '_faq_desc', true );

	// Retrieve Purpose metadata
	$purpose_subtitle    = get_post_meta( $post->ID, '_purpose_subtitle', true );
	$purpose_title       = get_post_meta( $post->ID, '_purpose_title', true );
	$purpose_desc        = get_post_meta( $post->ID, '_purpose_desc', true );
	$purpose_metric1_val = get_post_meta( $post->ID, '_purpose_metric1_val', true );
	$purpose_metric1_lbl = get_post_meta( $post->ID, '_purpose_metric1_lbl', true );
	$purpose_metric2_val = get_post_meta( $post->ID, '_purpose_metric2_val', true );
	$purpose_metric2_lbl = get_post_meta( $post->ID, '_purpose_metric2_lbl', true );
	$purpose_btn_text    = get_post_meta( $post->ID, '_purpose_btn_text', true );
	$purpose_btn_link    = get_post_meta( $post->ID, '_purpose_btn_link', true );
	$purpose_image       = get_post_meta( $post->ID, '_purpose_image', true );
	
	?>
	<div style="padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;">
		
		<!-- NAVBAR SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; color: #1d2327; margin-top: 0;">1. Header Navbar Settings</h2>
		
		<div style="margin-bottom: 25px;">
			<label style="display: block; margin-bottom: 8px;"><strong>Navbar Logo:</strong></label>
			<input type="hidden" id="scynexis_navbar_logo" name="navbar_logo" value="<?php echo esc_attr( $navbar_logo ); ?>" />
			<div id="scynexis_navbar_logo_preview" style="margin-bottom: 10px;">
				<?php if ( ! empty( $navbar_logo ) ) : ?>
					<img src="<?php echo esc_url( $navbar_logo ); ?>" style="max-height: 80px; display: block; border: 1px solid #ccc; border-radius: 6px; padding: 5px; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.05);" />
				<?php else : ?>
					<div style="width: 180px; height: 60px; background-color: #f0f0f1; border: 2px dashed #c3c4c7; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #8c8f94; font-size: 12px;">No logo selected</div>
				<?php endif; ?>
			</div>
			<button type="button" class="button button-secondary" id="scynexis_upload_logo_btn">Choose/Upload Logo</button>
			<button type="button" class="button button-link-delete" id="scynexis_remove_logo_btn" style="<?php echo empty( $navbar_logo ) ? 'display: none;' : ''; ?> margin-left: 10px;">Remove Logo</button>
		</div>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 30px;">
			<div>
				<label for="scynexis_navbar_cta_text"><strong>CTA Button Text:</strong></label>
				<input type="text" id="scynexis_navbar_cta_text" name="navbar_cta_text" value="<?php echo esc_attr( $navbar_cta_text ); ?>" style="width: 100%;" placeholder="Investor Relations >" />
			</div>
			<div>
				<label for="scynexis_navbar_cta_link"><strong>CTA Button Link:</strong></label>
				<input type="text" id="scynexis_navbar_cta_link" name="navbar_cta_link" value="<?php echo esc_attr( $navbar_cta_link ); ?>" style="width: 100%;" placeholder="#console" />
			</div>
		</div>

		<!-- HERO SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">2. Hero Section Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_meta_prefix"><strong>Section Prefix:</strong></label><br />
			<input type="text" id="scynexis_meta_prefix" name="meta_prefix" value="<?php echo esc_attr( $prefix ); ?>" style="width: 100%; max-width: 600px;" placeholder="Advancing Innovation for Rare Diseases" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_hero_title"><strong>Hero Headline:</strong> (HTML tags like &lt;em&gt; supported)</label><br />
			<input type="text" id="scynexis_hero_title" name="hero_title" value="<?php echo esc_attr( $hero_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Engineering the Next Generation of &lt;em&gt;Rare Disease Therapies&lt;/em&gt;." />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_hero_desc"><strong>Hero Description:</strong></label><br />
			<textarea id="scynexis_hero_desc" name="hero_desc" rows="4" style="width: 100%; max-width: 600px;" placeholder="We're a clinical-stage biotechnology company..."><?php echo esc_textarea( $hero_desc ); ?></textarea>
		</p>

		<div style="margin-bottom: 25px;">
			<label style="display: block; margin-bottom: 8px;"><strong>Hero Background Image:</strong></label>
			<input type="hidden" id="scynexis_hero_image" name="hero_image" value="<?php echo esc_attr( $hero_image ); ?>" />
			<div id="scynexis_hero_image_preview" style="margin-bottom: 10px;">
				<?php if ( ! empty( $hero_image ) ) : ?>
					<img src="<?php echo esc_url( $hero_image ); ?>" style="max-width: 250px; max-height: 180px; display: block; border: 1px solid #ccc; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" />
				<?php else : ?>
					<div style="width: 250px; height: 150px; background-color: #f0f0f1; border: 2px dashed #c3c4c7; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #8c8f94; font-size: 13px;">No image selected</div>
				<?php endif; ?>
			</div>
			<button type="button" class="button button-secondary" id="scynexis_upload_image_btn">Select/Upload Image</button>
			<button type="button" class="button button-link-delete" id="scynexis_remove_image_btn" style="<?php echo empty( $hero_image ) ? 'display: none;' : ''; ?> margin-left: 10px;">Remove Image</button>
		</div>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 30px;">
			<div>
				<label for="scynexis_btn1_text"><strong>Primary Button Text:</strong></label>
				<input type="text" id="scynexis_btn1_text" name="btn1_text" value="<?php echo esc_attr( $btn1_text ); ?>" style="width: 100%;" placeholder="Explore Our Pipeline" />
			</div>
			<div>
				<label for="scynexis_btn1_link"><strong>Primary Button Link:</strong></label>
				<input type="text" id="scynexis_btn1_link" name="btn1_link" value="<?php echo esc_attr( $btn1_link ); ?>" style="width: 100%;" placeholder="#pipeline" />
			</div>
			<div>
				<label for="scynexis_btn2_text"><strong>Secondary Button Text:</strong></label>
				<input type="text" id="scynexis_btn2_text" name="btn2_text" value="<?php echo esc_attr( $btn2_text ); ?>" style="width: 100%;" placeholder="Our Science" />
			</div>
			<div>
				<label for="scynexis_btn2_link"><strong>Secondary Button Link:</strong></label>
				<input type="text" id="scynexis_btn2_link" name="btn2_link" value="<?php echo esc_attr( $btn2_link ); ?>" style="width: 100%;" placeholder="#science" />
			</div>
		</div>

		<!-- ABOUT SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">3. About Section Settings</h2>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_about_pill"><strong>About Section Pill Text:</strong></label><br />
			<input type="text" id="scynexis_about_pill" name="about_pill" value="<?php echo esc_attr( $about_pill ); ?>" style="width: 100%; max-width: 600px;" placeholder="About SCYNEXIS" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_about_desc"><strong>About Section Description:</strong></label><br />
			<textarea id="scynexis_about_desc" name="about_desc" rows="4" style="width: 100%; max-width: 600px;" placeholder="SCYNEXIS is a clinical-stage biotechnology company..."><?php echo esc_textarea( $about_desc ); ?></textarea>
		</p>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 20px;">
			<div>
				<label for="scynexis_about_btn_text"><strong>About Button Text:</strong></label>
				<input type="text" id="scynexis_about_btn_text" name="about_btn_text" value="<?php echo esc_attr( $about_btn_text ); ?>" style="width: 100%;" placeholder="Learn More About us" />
			</div>
			<div>
				<label for="scynexis_about_btn_link"><strong>About Button Link:</strong></label>
				<input type="text" id="scynexis_about_btn_link" name="about_btn_link" value="<?php echo esc_attr( $about_btn_link ); ?>" style="width: 100%;" placeholder="#pipeline" />
			</div>
		</div>

		<h3 style="margin-top: 30px; margin-bottom: 10px; color: #1d2327;">Metrics</h3>
		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px;">
			<div>
				<label><strong>Metric 1 Number:</strong></label>
				<input type="text" name="metric1_val" value="<?php echo esc_attr( $metric1_val ); ?>" style="width: 100%;" placeholder="25+" />
			</div>
			<div>
				<label><strong>Metric 1 Label:</strong></label>
				<input type="text" name="metric1_lbl" value="<?php echo esc_attr( $metric1_lbl ); ?>" style="width: 100%;" placeholder="Years Advancing Innovation" />
			</div>
			<div>
				<label><strong>Metric 2 Number:</strong></label>
				<input type="text" name="metric2_val" value="<?php echo esc_attr( $metric2_val ); ?>" style="width: 100%;" placeholder="2" />
			</div>
			<div>
				<label><strong>Metric 2 Label:</strong></label>
				<input type="text" name="metric2_lbl" value="<?php echo esc_attr( $metric2_lbl ); ?>" style="width: 100%;" placeholder="Clinical-Stage Programs" />
			</div>
			<div>
				<label><strong>Metric 3 Number:</strong></label>
				<input type="text" name="metric3_val" value="<?php echo esc_attr( $metric3_val ); ?>" style="width: 100%;" placeholder="1" />
			</div>
			<div>
				<label><strong>Metric 3 Label:</strong></label>
				<input type="text" name="metric3_lbl" value="<?php echo esc_attr( $metric3_lbl ); ?>" style="width: 100%;" placeholder="Mission to Improve Lives" />
			</div>
			<div>
				<label><strong>Metric 4 Number:</strong></label>
				<input type="text" name="metric4_val" value="<?php echo esc_attr( $metric4_val ); ?>" style="width: 100%;" placeholder="100%" />
			</div>
			<div>
				<label><strong>Metric 4 Label:</strong></label>
				<input type="text" name="metric4_lbl" value="<?php echo esc_attr( $metric4_lbl ); ?>" style="width: 100%;" placeholder="Focused on Rare Diseases" />
			</div>
		</div>

		<!-- PURPOSE SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">5. Purpose Section Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_purpose_subtitle"><strong>Purpose Subtitle (Pill):</strong></label><br />
			<input type="text" id="scynexis_purpose_subtitle" name="purpose_subtitle" value="<?php echo esc_attr( $purpose_subtitle ); ?>" style="width: 100%; max-width: 600px;" placeholder="Our Purpose" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_purpose_title"><strong>Purpose Headline:</strong></label><br />
			<input type="text" id="scynexis_purpose_title" name="purpose_title" value="<?php echo esc_attr( $purpose_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Advancing Science With &lt;em&gt;Purpose for Patients&lt;/em&gt; Worldwide" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_purpose_desc"><strong>Purpose Description:</strong></label><br />
			<textarea id="scynexis_purpose_desc" name="purpose_desc" rows="4" style="width: 100%; max-width: 600px;" placeholder="Every discovery at SCYNEXIS is driven by a commitment to addressing significant unmet medical needs. Through innovative research, clinical expertise, and scientific collaboration, we develop therapies designed to improve outcomes for patients living with severe rare diseases."><?php echo esc_textarea( $purpose_desc ); ?></textarea>
		</p>

		<h3 style="margin-top: 25px; margin-bottom: 10px; color: #1d2327;">Metrics</h3>
		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 25px;">
			<div>
				<label><strong>Metric 1 Number:</strong></label>
				<input type="text" name="purpose_metric1_val" value="<?php echo esc_attr( $purpose_metric1_val ); ?>" style="width: 100%;" placeholder="25+" />
			</div>
			<div>
				<label><strong>Metric 1 Label:</strong></label>
				<input type="text" name="purpose_metric1_lbl" value="<?php echo esc_attr( $purpose_metric1_lbl ); ?>" style="width: 100%;" placeholder="Years of Scientific Innovation" />
			</div>
			<div>
				<label><strong>Metric 2 Number:</strong></label>
				<input type="text" name="purpose_metric2_val" value="<?php echo esc_attr( $purpose_metric2_val ); ?>" style="width: 100%;" placeholder="2" />
			</div>
			<div>
				<label><strong>Metric 2 Label:</strong></label>
				<input type="text" name="purpose_metric2_lbl" value="<?php echo esc_attr( $purpose_metric2_lbl ); ?>" style="width: 100%;" placeholder="Clinical-Stage Lead Programs" />
			</div>
		</div>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 25px;">
			<div>
				<label for="scynexis_purpose_btn_text"><strong>Button Text:</strong></label>
				<input type="text" id="scynexis_purpose_btn_text" name="purpose_btn_text" value="<?php echo esc_attr( $purpose_btn_text ); ?>" style="width: 100%;" placeholder="Learn More About Us" />
			</div>
			<div>
				<label for="scynexis_purpose_btn_link"><strong>Button Link:</strong></label>
				<input type="text" id="scynexis_purpose_btn_link" name="purpose_btn_link" value="<?php echo esc_attr( $purpose_btn_link ); ?>" style="width: 100%;" placeholder="#purpose" />
			</div>
		</div>

		<div style="margin-bottom: 25px;">
			<label style="display: block; margin-bottom: 8px;"><strong>Purpose Section Image:</strong></label>
			<input type="hidden" id="scynexis_purpose_image" name="purpose_image" value="<?php echo esc_attr( $purpose_image ); ?>" />
			<div id="scynexis_purpose_image_preview" style="margin-bottom: 10px;">
				<?php if ( ! empty( $purpose_image ) ) : ?>
					<img src="<?php echo esc_url( $purpose_image ); ?>" style="max-width: 250px; max-height: 250px; border-radius: 8px; display: block; border: 1px solid #ccc; box-shadow: 0 4px 8px rgba(0,0,0,0.1);" />
				<?php else : ?>
					<div style="width: 220px; height: 180px; background-color: #f0f0f1; border: 2px dashed #c3c4c7; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #8c8f94; font-size: 12px; text-align: center; padding: 10px;">No image selected (Uses purpose-science.png fallback)</div>
				<?php endif; ?>
			</div>
			<button type="button" class="button button-secondary" id="scynexis_upload_purpose_image_btn">Select/Upload Image</button>
			<button type="button" class="button button-link-delete" id="scynexis_remove_purpose_image_btn" style="<?php echo empty( $purpose_image ) ? 'display: none;' : ''; ?> margin-left: 10px;">Remove Image</button>
		</div>

		<!-- DISEASE AREAS SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">6. Disease Areas Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_disease_subtitle"><strong>Disease Areas Subtitle:</strong></label><br />
			<input type="text" id="scynexis_disease_subtitle" name="disease_subtitle" value="<?php echo esc_attr( $disease_subtitle ); ?>" style="width: 100%; max-width: 600px;" placeholder="Disease Areas" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_disease_title"><strong>Disease Areas Headline:</strong> (HTML tags like &lt;em&gt; supported)</label><br />
			<input type="text" id="scynexis_disease_title" name="disease_title" value="<?php echo esc_attr( $disease_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Focused on Diseases With the &lt;em&gt;Greatest Unmet Need&lt;/em&gt;" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_disease_desc"><strong>Section Description:</strong></label><br />
			<textarea id="scynexis_disease_desc" name="disease_desc" rows="3" style="width: 100%; max-width: 600px;" placeholder="We develop innovative therapies..."><?php echo esc_textarea( $disease_desc ); ?></textarea>
		</p>

		<h3 style="margin-top: 25px; margin-bottom: 10px; color: #1d2327;">Card 1 (Left Card)</h3>
		<div style="background: #f6f7f7; padding: 15px; border-radius: 6px; border: 1px solid #dcdcde; max-width: 600px; margin-bottom: 20px;">
			<p style="margin-bottom: 10px; margin-top: 0;">
				<label for="scynexis_disease_c1_title"><strong>Card 1 Title:</strong></label><br />
				<input type="text" id="scynexis_disease_c1_title" name="disease_c1_title" value="<?php echo esc_attr( $disease_c1_title ); ?>" style="width: 100%;" placeholder="Rare Kidney Disease" />
			</p>
			<p style="margin-bottom: 10px;">
				<label for="scynexis_disease_c1_desc"><strong>Card 1 Description:</strong></label><br />
				<textarea id="scynexis_disease_c1_desc" name="disease_c1_desc" rows="3" style="width: 100%;" placeholder="Advancing innovative therapies..."><?php echo esc_textarea( $disease_c1_desc ); ?></textarea>
			</p>
			<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
				<div>
					<label for="scynexis_disease_c1_btn_text"><strong>Button Text:</strong></label>
					<input type="text" id="scynexis_disease_c1_btn_text" name="disease_c1_btn_text" value="<?php echo esc_attr( $disease_c1_btn_text ); ?>" style="width: 100%;" placeholder="Learn More" />
				</div>
				<div>
					<label for="scynexis_disease_c1_btn_link"><strong>Button Link:</strong></label>
					<input type="text" id="scynexis_disease_c1_btn_link" name="disease_c1_btn_link" value="<?php echo esc_attr( $disease_c1_btn_link ); ?>" style="width: 100%;" placeholder="#kidney" />
				</div>
			</div>
		</div>

		<h3 style="margin-top: 25px; margin-bottom: 10px; color: #1d2327;">Card 2 (Right Card)</h3>
		<div style="background: #f6f7f7; padding: 15px; border-radius: 6px; border: 1px solid #dcdcde; max-width: 600px; margin-bottom: 20px;">
			<p style="margin-bottom: 10px; margin-top: 0;">
				<label for="scynexis_disease_c2_title"><strong>Card 2 Title:</strong></label><br />
				<input type="text" id="scynexis_disease_c2_title" name="disease_c2_title" value="<?php echo esc_attr( $disease_c2_title ); ?>" style="width: 100%;" placeholder="Serious Fungal Infections" />
			</p>
			<p style="margin-bottom: 10px;">
				<label for="scynexis_disease_c2_desc"><strong>Card 2 Description:</strong></label><br />
				<textarea id="scynexis_disease_c2_desc" name="disease_c2_desc" rows="3" style="width: 100%;" placeholder="Developing next-generation..."><?php echo esc_textarea( $disease_c2_desc ); ?></textarea>
			</p>
			<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
				<div>
					<label for="scynexis_disease_c2_btn_text"><strong>Button Text:</strong></label>
					<input type="text" id="scynexis_disease_c2_btn_text" name="disease_c2_btn_text" value="<?php echo esc_attr( $disease_c2_btn_text ); ?>" style="width: 100%;" placeholder="Explore Research" />
				</div>
				<div>
					<label for="scynexis_disease_c2_btn_link"><strong>Button Link:</strong></label>
					<input type="text" id="scynexis_disease_c2_btn_link" name="disease_c2_btn_link" value="<?php echo esc_attr( $disease_c2_btn_link ); ?>" style="width: 100%;" placeholder="#fungal" />
				</div>
			</div>
		</div>

		<!-- PIPELINE SECTION SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">7. Pipeline Section Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_pipe_subtitle"><strong>Pipeline Subtitle:</strong></label><br />
			<input type="text" id="scynexis_pipe_subtitle" name="pipe_subtitle" value="<?php echo esc_attr( $pipe_subtitle ); ?>" style="width: 100%; max-width: 600px;" placeholder="Our Pipeline" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_pipe_title"><strong>Pipeline Headline:</strong> (HTML tags like &lt;em&gt; supported)</label><br />
			<input type="text" id="scynexis_pipe_title" name="pipe_title" value="<?php echo esc_attr( $pipe_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Advancing a Diverse &lt;em&gt;Pipeline of Innovative Therapies&lt;/em&gt;" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_pipe_desc"><strong>Pipeline Short Description:</strong></label><br />
			<textarea id="scynexis_pipe_desc" name="pipe_desc" rows="3" style="width: 100%; max-width: 600px;" placeholder="From rare kidney disease to life-threatening fungal infections..."><?php echo esc_textarea( $pipe_desc ); ?></textarea>
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_pipe_body"><strong>Pipeline Detailed Introduction:</strong></label><br />
			<textarea id="scynexis_pipe_body" name="pipe_body" rows="4" style="width: 100%; max-width: 600px;" placeholder="Our programs span early research, clinical development, and approved therapies..."><?php echo esc_textarea( $pipe_body ); ?></textarea>
		</p>

		<h3 style="margin-top: 25px; margin-bottom: 10px; color: #1d2327;">Pipeline Cards</h3>
		
		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; max-width: 800px; margin-bottom: 30px;">
			<!-- Card 1 -->
			<div style="background: #f6f7f7; padding: 15px; border-radius: 6px; border: 1px solid #dcdcde;">
				<h4 style="margin-top: 0; margin-bottom: 10px; border-bottom: 1px solid #dcdcde; padding-bottom: 5px;">Card 1</h4>
				<p><label><strong>Title:</strong></label><input type="text" name="pipe_c1_title" value="<?php echo esc_attr( $pipe_c1_title ); ?>" style="width: 100%;" placeholder="SCY-770" /></p>
				<p><label><strong>Subtitle:</strong></label><input type="text" name="pipe_c1_sub" value="<?php echo esc_attr( $pipe_c1_sub ); ?>" style="width: 100%;" placeholder="Rare Kidney Disease (ADPKD)" /></p>
				<p><label><strong>Description:</strong></label><textarea name="pipe_c1_desc" rows="3" style="width: 100%;" placeholder="A highly selective direct AMPK activator..."><?php echo esc_textarea( $pipe_c1_desc ); ?></textarea></p>
				<p><label><strong>Status:</strong></label><input type="text" name="pipe_c1_status" value="<?php echo esc_attr( $pipe_c1_status ); ?>" style="width: 100%;" placeholder="Clinical Development" /></p>
			</div>
			
			<!-- Card 2 -->
			<div style="background: #f6f7f7; padding: 15px; border-radius: 6px; border: 1px solid #dcdcde;">
				<h4 style="margin-top: 0; margin-bottom: 10px; border-bottom: 1px solid #dcdcde; padding-bottom: 5px;">Card 2</h4>
				<p><label><strong>Title:</strong></label><input type="text" name="pipe_c2_title" value="<?php echo esc_attr( $pipe_c2_title ); ?>" style="width: 100%;" placeholder="SCY-247" /></p>
				<p><label><strong>Subtitle:</strong></label><input type="text" name="pipe_c2_sub" value="<?php echo esc_attr( $pipe_c2_sub ); ?>" style="width: 100%;" placeholder="Next-Generation Antifungal Therapy" /></p>
				<p><label><strong>Description:</strong></label><textarea name="pipe_c2_desc" rows="3" style="width: 100%;" placeholder="A second-generation fungerp designed..."><?php echo esc_textarea( $pipe_c2_desc ); ?></textarea></p>
				<p><label><strong>Status:</strong></label><input type="text" name="pipe_c2_status" value="<?php echo esc_attr( $pipe_c2_status ); ?>" style="width: 100%;" placeholder="Clinical Development" /></p>
			</div>
			
			<!-- Card 3 -->
			<div style="background: #f6f7f7; padding: 15px; border-radius: 6px; border: 1px solid #dcdcde;">
				<h4 style="margin-top: 0; margin-bottom: 10px; border-bottom: 1px solid #dcdcde; padding-bottom: 5px;">Card 3</h4>
				<p><label><strong>Title:</strong></label><input type="text" name="pipe_c3_title" value="<?php echo esc_attr( $pipe_c3_title ); ?>" style="width: 100%;" placeholder="Fungerp® Analogs" /></p>
				<p><label><strong>Subtitle:</strong></label><input type="text" name="pipe_c3_sub" value="<?php echo esc_attr( $pipe_c3_sub ); ?>" style="width: 100%;" placeholder="Expanding the Antifungal Platform" /></p>
				<p><label><strong>Description:</strong></label><textarea name="pipe_c3_desc" rows="3" style="width: 100%;" placeholder="Advancing structurally distinct antifungal compounds..."><?php echo esc_textarea( $pipe_c3_desc ); ?></textarea></p>
				<p><label><strong>Status:</strong></label><input type="text" name="pipe_c3_status" value="<?php echo esc_attr( $pipe_c3_status ); ?>" style="width: 100%;" placeholder="Preclinical Research" /></p>
			</div>
			
			<!-- Card 4 -->
			<div style="background: #f6f7f7; padding: 15px; border-radius: 6px; border: 1px solid #dcdcde;">
				<h4 style="margin-top: 0; margin-bottom: 10px; border-bottom: 1px solid #dcdcde; padding-bottom: 5px;">Card 4</h4>
				<p><label><strong>Title:</strong></label><input type="text" name="pipe_c4_title" value="<?php echo esc_attr( $pipe_c4_title ); ?>" style="width: 100%;" placeholder="BREXAFEMME®" /></p>
				<p><label><strong>Subtitle:</strong></label><input type="text" name="pipe_c4_sub" value="<?php echo esc_attr( $pipe_c4_sub ); ?>" style="width: 100%;" placeholder="Approved & Partnered Therapy" /></p>
				<p><label><strong>Description:</strong></label><textarea name="pipe_c4_desc" rows="3" style="width: 100%;" placeholder="The first approved medicine from the Fungerp platform..."><?php echo esc_textarea( $pipe_c4_desc ); ?></textarea></p>
				<p><label><strong>Status:</strong></label><input type="text" name="pipe_c4_status" value="<?php echo esc_attr( $pipe_c4_status ); ?>" style="width: 100%;" placeholder="Approved & Licensed" /></p>
			</div>
		</div>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 35px;">
			<div>
				<label for="scynexis_pipe_btn_text"><strong>Section CTA Button Text:</strong></label>
				<input type="text" id="scynexis_pipe_btn_text" name="pipe_btn_text" value="<?php echo esc_attr( $pipe_btn_text ); ?>" style="width: 100%;" placeholder="Explore the Full Pipeline" />
			</div>
			<div>
				<label for="scynexis_pipe_btn_link"><strong>Section CTA Button Link:</strong></label>
				<input type="text" id="scynexis_pipe_btn_link" name="pipe_btn_link" value="<?php echo esc_attr( $pipe_btn_link ); ?>" style="width: 100%;" placeholder="#pipeline" />
			</div>
		</div>

		<!-- INVESTOR RELATIONS SECTION SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">9. Investor Relations Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_investor_subtitle"><strong>Investor Subtitle (Pill):</strong></label><br />
			<input type="text" id="scynexis_investor_subtitle" name="investor_subtitle" value="<?php echo esc_attr( $investor_subtitle ); ?>" style="width: 100%; max-width: 600px;" placeholder="Investor Relations" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_investor_title"><strong>Headline:</strong> (HTML like &lt;em&gt; supported)</label><br />
			<input type="text" id="scynexis_investor_title" name="investor_title" value="<?php echo esc_attr( $investor_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Building Long-Term Value Through &lt;em&gt;Scientific Innovation&lt;/em&gt;" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_investor_desc"><strong>Supporting Paragraph:</strong></label><br />
			<textarea id="scynexis_investor_desc" name="investor_desc" rows="4" style="width: 100%; max-width: 600px;" placeholder="SCYNEXIS is advancing a focused pipeline..."><?php echo esc_textarea( $investor_desc ); ?></textarea>
		</p>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 25px;">
			<div>
				<label for="scynexis_investor_btn1_text"><strong>Button 1 Text:</strong></label>
				<input type="text" id="scynexis_investor_btn1_text" name="investor_btn1_text" value="<?php echo esc_attr( $investor_btn1_text ); ?>" style="width: 100%;" placeholder="Investor Center" />
			</div>
			<div>
				<label for="scynexis_investor_btn1_link"><strong>Button 1 Link:</strong></label>
				<input type="text" id="scynexis_investor_btn1_link" name="investor_btn1_link" value="<?php echo esc_attr( $investor_btn1_link ); ?>" style="width: 100%;" placeholder="#investor-center" />
			</div>
			<div>
				<label for="scynexis_investor_btn2_text"><strong>Button 2 Text:</strong></label>
				<input type="text" id="scynexis_investor_btn2_text" name="investor_btn2_text" value="<?php echo esc_attr( $investor_btn2_text ); ?>" style="width: 100%;" placeholder="Latest Reports" />
			</div>
			<div>
				<label for="scynexis_investor_btn2_link"><strong>Button 2 Link:</strong></label>
				<input type="text" id="scynexis_investor_btn2_link" name="investor_btn2_link" value="<?php echo esc_attr( $investor_btn2_link ); ?>" style="width: 100%;" placeholder="#latest-reports" />
			</div>
		</div>

		<h3 style="margin-top: 25px; margin-bottom: 10px; color: #1d2327;">Stock Card Details</h3>
		<div style="background: #f6f7f7; padding: 15px; border-radius: 6px; border: 1px solid #dcdcde; max-width: 600px; margin-bottom: 20px;">
			<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 10px;">
				<div>
					<label><strong>Ticker Symbol:</strong></label>
					<input type="text" name="investor_ticker" value="<?php echo esc_attr( $investor_ticker ); ?>" style="width: 100%;" placeholder="SCYX" />
				</div>
				<div>
					<label><strong>Stock Price ($):</strong></label>
					<input type="text" name="investor_stock_price" value="<?php echo esc_attr( $investor_stock_price ); ?>" style="width: 100%;" placeholder="2.18" />
				</div>
				<div>
					<label><strong>Daily Change:</strong></label>
					<input type="text" name="investor_stock_change" value="<?php echo esc_attr( $investor_stock_change ); ?>" style="width: 100%;" placeholder="+3.81%" />
				</div>
			</div>
			<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 10px;">
				<div>
					<label><strong>Market Cap:</strong></label>
					<input type="text" name="investor_market_cap" value="<?php echo esc_attr( $investor_market_cap ); ?>" style="width: 100%;" placeholder="$84.2M" />
				</div>
				<div>
					<label><strong>52-Week Range:</strong></label>
					<input type="text" name="investor_range" value="<?php echo esc_attr( $investor_range ); ?>" style="width: 100%;" placeholder="$1.12 - $3.40" />
				</div>
				<div>
					<label><strong>Volume:</strong></label>
					<input type="text" name="investor_volume" value="<?php echo esc_attr( $investor_volume ); ?>" style="width: 100%;" placeholder="142K" />
				</div>
			</div>
			<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
				<div>
					<label><strong>Stock Button Text:</strong></label>
					<input type="text" name="investor_stock_btn_text" value="<?php echo esc_attr( $investor_stock_btn_text ); ?>" style="width: 100%;" placeholder="View Stock Information" />
				</div>
				<div>
					<label><strong>Stock Button Link:</strong></label>
					<input type="text" name="investor_stock_btn_link" value="<?php echo esc_attr( $investor_stock_btn_link ); ?>" style="width: 100%;" placeholder="#stock-info" />
				</div>
			</div>
		</div>

		<!-- CTA BANNER SECTION SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">10. CTA Banner Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_cta_banner_subtitle"><strong>CTA Banner Subtitle (Pill):</strong></label><br />
			<input type="text" id="scynexis_cta_banner_subtitle" name="cta_banner_subtitle" value="<?php echo esc_attr( $cta_banner_subtitle ); ?>" style="width: 100%; max-width: 600px;" placeholder="Partner With Us" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_cta_banner_title"><strong>CTA Banner Headline:</strong> (HTML like &lt;em&gt; supported)</label><br />
			<input type="text" id="scynexis_cta_banner_title" name="cta_banner_title" value="<?php echo esc_attr( $cta_banner_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Advancing Science, &lt;em&gt;Improving Outcomes&lt;/em&gt;" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_cta_banner_desc"><strong>CTA Banner Description:</strong></label><br />
			<textarea id="scynexis_cta_banner_desc" name="cta_banner_desc" rows="3" style="width: 100%; max-width: 600px;" placeholder="We collaborate with global leaders..."><?php echo esc_textarea( $cta_banner_desc ); ?></textarea>
		</p>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 25px;">
			<div>
				<label for="scynexis_cta_banner_btn_text"><strong>Button Text:</strong></label>
				<input type="text" id="scynexis_cta_banner_btn_text" name="cta_banner_btn_text" value="<?php echo esc_attr( $cta_banner_btn_text ); ?>" style="width: 100%;" placeholder="Explore Partnerships" />
			</div>
			<div>
				<label for="scynexis_cta_banner_btn_link"><strong>Button Link:</strong></label>
				<input type="text" id="scynexis_cta_banner_btn_link" name="cta_banner_btn_link" value="<?php echo esc_attr( $cta_banner_btn_link ); ?>" style="width: 100%;" placeholder="#partnership" />
			</div>
		</div>

		<!-- FAQ SECTION SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">11. FAQ Accordion Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_faq_subtitle"><strong>FAQ Subtitle (Pill):</strong></label><br />
			<input type="text" id="scynexis_faq_subtitle" name="faq_subtitle" value="<?php echo esc_attr( $faq_subtitle ); ?>" style="width: 100%; max-width: 600px;" placeholder="FAQ" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_faq_title"><strong>FAQ Headline:</strong> (HTML like &lt;em&gt; supported)</label><br />
			<input type="text" id="scynexis_faq_title" name="faq_title" value="<?php echo esc_attr( $faq_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Frequently Asked &lt;em&gt;Questions&lt;/em&gt;" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_faq_desc"><strong>FAQ Description:</strong></label><br />
			<textarea id="scynexis_faq_desc" name="faq_desc" rows="3" style="width: 100%; max-width: 600px;" placeholder="Find answers to common questions about SCYNEXIS's..."><?php echo esc_textarea( $faq_desc ); ?></textarea>
		</p>

		<!-- NEWS SECTION SETTINGS -->
		<h2 style="border-bottom: 2px solid #2271b1; padding-bottom: 10px; margin-bottom: 20px; margin-top: 40px; color: #1d2327;">8. Latest News Settings</h2>
		
		<p style="margin-bottom: 15px;">
			<label for="scynexis_news_subtitle"><strong>News Subtitle:</strong></label><br />
			<input type="text" id="scynexis_news_subtitle" name="news_subtitle" value="<?php echo esc_attr( $news_subtitle ); ?>" style="width: 100%; max-width: 600px;" placeholder="Latest News" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_news_title"><strong>News Headline:</strong> (HTML tags like &lt;em&gt; supported)</label><br />
			<input type="text" id="scynexis_news_title" name="news_title" value="<?php echo esc_attr( $news_title ); ?>" style="width: 100%; max-width: 600px;" placeholder="Stay Up to Date With Our &lt;em&gt;Latest Progress&lt;/em&gt;" />
		</p>

		<p style="margin-bottom: 15px;">
			<label for="scynexis_news_desc"><strong>News Description:</strong></label><br />
			<textarea id="scynexis_news_desc" name="news_desc" rows="3" style="width: 100%; max-width: 600px;" placeholder="Follow the latest scientific advancements..."><?php echo esc_textarea( $news_desc ); ?></textarea>
		</p>

		<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; max-width: 600px; margin-bottom: 25px;">
			<div>
				<label for="scynexis_news_btn_text"><strong>CTA Button Text:</strong></label>
				<input type="text" id="scynexis_news_btn_text" name="news_btn_text" value="<?php echo esc_attr( $news_btn_text ); ?>" style="width: 100%;" placeholder="View All" />
			</div>
			<div>
				<label for="scynexis_news_btn_link"><strong>CTA Button Link:</strong></label>
				<input type="text" id="scynexis_news_btn_link" name="news_btn_link" value="<?php echo esc_attr( $news_btn_link ); ?>" style="width: 100%;" placeholder="#news" />
			</div>
		</div>
		<p style="color: #646970; font-style: italic;">News cards are automatically pulled from the 7 most recent posts in WordPress.</p>

		<script>
		jQuery(document).ready(function($){
			// Hero Background image
			var heroUploader;
			$('#scynexis_upload_image_btn').click(function(e) {
				e.preventDefault();
				if (heroUploader) {
					heroUploader.open();
					return;
				}
				heroUploader = wp.media({
					title: 'Choose Hero Background Image',
					button: { text: 'Use this image' },
					multiple: false
				});
				heroUploader.on('select', function() {
					var attachment = heroUploader.state().get('selection').first().toJSON();
					$('#scynexis_hero_image').val(attachment.url);
					$('#scynexis_hero_image_preview').html('<img src="' + attachment.url + '" style="max-width: 250px; max-height: 180px; display: block; border: 1px solid #ccc; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" />');
					$('#scynexis_remove_image_btn').show();
				});
				heroUploader.open();
			});
			$('#scynexis_remove_image_btn').click(function(e) {
				e.preventDefault();
				$('#scynexis_hero_image').val('');
				$('#scynexis_hero_image_preview').html('<div style="width: 250px; height: 150px; background-color: #f0f0f1; border: 2px dashed #c3c4c7; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #8c8f94; font-size: 13px;">No image selected</div>');
				$(this).hide();
			});

			// Navbar Logo
			var logoUploader;
			$('#scynexis_upload_logo_btn').click(function(e) {
				e.preventDefault();
				if (logoUploader) {
					logoUploader.open();
					return;
				}
				logoUploader = wp.media({
					title: 'Choose Navbar Logo',
					button: { text: 'Use this logo' },
					multiple: false
				});
				logoUploader.on('select', function() {
					var attachment = logoUploader.state().get('selection').first().toJSON();
					$('#scynexis_navbar_logo').val(attachment.url);
					$('#scynexis_navbar_logo_preview').html('<img src="' + attachment.url + '" style="max-height: 80px; display: block; border: 1px solid #ccc; border-radius: 6px; padding: 5px; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.05);" />');
					$('#scynexis_remove_logo_btn').show();
				});
				logoUploader.open();
			});
			$('#scynexis_remove_logo_btn').click(function(e) {
				e.preventDefault();
				$('#scynexis_navbar_logo').val('');
				$('#scynexis_navbar_logo_preview').html('<div style="width: 180px; height: 60px; background-color: #f0f0f1; border: 2px dashed #c3c4c7; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #8c8f94; font-size: 12px;">No logo selected</div>');
				$(this).hide();
			});


			// Purpose Image
			var purposeUploader;
			$('#scynexis_upload_purpose_image_btn').click(function(e) {
				e.preventDefault();
				if (purposeUploader) {
					purposeUploader.open();
					return;
				}
				purposeUploader = wp.media({
					title: 'Choose Purpose Section Image',
					button: { text: 'Use this image' },
					multiple: false
				});
				purposeUploader.on('select', function() {
					var attachment = purposeUploader.state().get('selection').first().toJSON();
					$('#scynexis_purpose_image').val(attachment.url);
					$('#scynexis_purpose_image_preview').html('<img src="' + attachment.url + '" style="max-width: 250px; max-height: 250px; border-radius: 8px; display: block; border: 1px solid #ccc; box-shadow: 0 4px 8px rgba(0,0,0,0.1);" />');
					$('#scynexis_remove_purpose_image_btn').show();
				});
				purposeUploader.open();
			});
			$('#scynexis_remove_purpose_image_btn').click(function(e) {
				e.preventDefault();
				$('#scynexis_purpose_image').val('');
				$('#scynexis_purpose_image_preview').html('<div style="width: 220px; height: 180px; background-color: #f0f0f1; border: 2px dashed #c3c4c7; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #8c8f94; font-size: 12px; text-align: center; padding: 10px;">No image selected (Uses purpose-science.png fallback)</div>');
				$(this).hide();
			});
		});
		</script>
	</div>
	<?php
}

/**
 * Save Homepage Metabox Data
 */
function scynexis_save_home_meta( $post_id ) {
	// Verify nonce
	if ( ! isset( $_POST['scynexis_home_meta_nonce'] ) || ! wp_verify_nonce( $_POST['scynexis_home_meta_nonce'], 'scynexis_save_home_meta' ) ) {
		return;
	}

	// Avoid autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Sanitize and save fields
	$fields = array(
		'navbar_logo'          => '_navbar_logo',
		'navbar_cta_text'      => '_navbar_cta_text',
		'navbar_cta_link'      => '_navbar_cta_link',
		'meta_prefix'          => '_meta_prefix',
		'hero_title'           => '_hero_title',
		'hero_desc'            => '_hero_desc',
		'hero_image'           => '_hero_image',
		'btn1_text'            => '_btn1_text',
		'btn1_link'            => '_btn1_link',
		'btn2_text'            => '_btn2_text',
		'btn2_link'            => '_btn2_link',
		'about_pill'           => '_about_pill',
		'about_desc'           => '_about_desc',
		'about_btn_text'       => '_about_btn_text',
		'about_btn_link'       => '_about_btn_link',
		'metric1_val'          => '_metric1_val',
		'metric1_lbl'          => '_metric1_lbl',
		'metric2_val'          => '_metric2_val',
		'metric2_lbl'          => '_metric2_lbl',
		'metric3_val'          => '_metric3_val',
		'metric3_lbl'          => '_metric3_lbl',
		'metric4_val'          => '_metric4_val',
		'metric4_lbl'          => '_metric4_lbl',
		'disease_subtitle'     => '_disease_subtitle',
		'disease_title'        => '_disease_title',
		'disease_desc'         => '_disease_desc',
		'disease_c1_title'     => '_disease_c1_title',
		'disease_c1_desc'      => '_disease_c1_desc',
		'disease_c1_btn_text'  => '_disease_c1_btn_text',
		'disease_c1_btn_link'  => '_disease_c1_btn_link',
		'disease_c2_title'     => '_disease_c2_title',
		'disease_c2_desc'      => '_disease_c2_desc',
		'disease_c2_btn_text'  => '_disease_c2_btn_text',
		'disease_c2_btn_link'  => '_disease_c2_btn_link',
		'investor_subtitle'       => '_investor_subtitle',
		'investor_title'          => '_investor_title',
		'investor_desc'           => '_investor_desc',
		'investor_btn1_text'      => '_investor_btn1_text',
		'investor_btn1_link'      => '_investor_btn1_link',
		'investor_btn2_text'      => '_investor_btn2_text',
		'investor_btn2_link'      => '_investor_btn2_link',
		'investor_ticker'         => '_investor_ticker',
		'investor_stock_price'    => '_investor_stock_price',
		'investor_stock_change'   => '_investor_stock_change',
		'investor_market_cap'     => '_investor_market_cap',
		'investor_range'          => '_investor_range',
		'investor_volume'         => '_investor_volume',
		'investor_stock_btn_text' => '_investor_stock_btn_text',
		'investor_stock_btn_link' => '_investor_stock_btn_link',
		'cta_banner_subtitle'     => '_cta_banner_subtitle',
		'cta_banner_title'        => '_cta_banner_title',
		'cta_banner_desc'         => '_cta_banner_desc',
		'cta_banner_btn_text'     => '_cta_banner_btn_text',
		'cta_banner_btn_link'     => '_cta_banner_btn_link',
		'faq_subtitle'            => '_faq_subtitle',
		'faq_title'               => '_faq_title',
		'faq_desc'                => '_faq_desc',
		'news_subtitle'        => '_news_subtitle',
		'news_title'           => '_news_title',
		'news_desc'            => '_news_desc',
		'news_btn_text'        => '_news_btn_text',
		'news_btn_link'        => '_news_btn_link',
		'pipe_subtitle'        => '_pipe_subtitle',
		'pipe_title'           => '_pipe_title',
		'pipe_desc'            => '_pipe_desc',
		'pipe_body'            => '_pipe_body',
		'pipe_c1_title'        => '_pipe_c1_title',
		'pipe_c1_sub'          => '_pipe_c1_sub',
		'pipe_c1_desc'         => '_pipe_c1_desc',
		'pipe_c1_status'       => '_pipe_c1_status',
		'pipe_c2_title'        => '_pipe_c2_title',
		'pipe_c2_sub'          => '_pipe_c2_sub',
		'pipe_c2_desc'         => '_pipe_c2_desc',
		'pipe_c2_status'       => '_pipe_c2_status',
		'pipe_c3_title'        => '_pipe_c3_title',
		'pipe_c3_sub'          => '_pipe_c3_sub',
		'pipe_c3_desc'         => '_pipe_c3_desc',
		'pipe_c3_status'       => '_pipe_c3_status',
		'pipe_c4_title'        => '_pipe_c4_title',
		'pipe_c4_sub'          => '_pipe_c4_sub',
		'pipe_c4_desc'         => '_pipe_c4_desc',
		'pipe_c4_status'       => '_pipe_c4_status',
		'pipe_btn_text'        => '_pipe_btn_text',
		'pipe_btn_link'        => '_pipe_btn_link',
		'purpose_subtitle'     => '_purpose_subtitle',
		'purpose_title'        => '_purpose_title',
		'purpose_desc'         => '_purpose_desc',
		'purpose_metric1_val'  => '_purpose_metric1_val',
		'purpose_metric1_lbl'  => '_purpose_metric1_lbl',
		'purpose_metric2_val'  => '_purpose_metric2_val',
		'purpose_metric2_lbl'  => '_purpose_metric2_lbl',
		'purpose_btn_text'     => '_purpose_btn_text',
		'purpose_btn_link'     => '_purpose_btn_link',
		'purpose_image'        => '_purpose_image',
	);

	foreach ( $fields as $post_key => $meta_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
		}
	}
}
add_action( 'save_post', 'scynexis_save_home_meta' );
