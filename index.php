<?php
/**
 * The main template file
 *
 * @package Scynexis
 */

get_header();
?>

<main class="site-main" style="max-width: 1280px; margin: 0 auto; padding: 80px 40px; min-height: 50vh;">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 60px;">
				<header class="entry-header">
					<h2 class="entry-title" style="margin-bottom: 15px;">
						<a href="<?php the_permalink(); ?>" style="color: var(--color-navy); text-decoration: none; font-weight: 700;"><?php the_title(); ?></a>
					</h2>
				</header>
				
				<div class="entry-content" style="line-height: 1.6; color: var(--color-gray);">
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p>No content found.</p>
	<?php endif; ?>
</main>

<?php
get_footer();
