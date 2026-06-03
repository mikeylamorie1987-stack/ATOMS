<?php
/**
 * Main Template File
 * 
 * @package ATOMS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main">
	<div class="container">
		<?php
			if ( have_posts() ) {
				?>
				<div class="posts-list">
					<?php
						while ( have_posts() ) {
							the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'card post-item' ); ?>>
								<?php
									if ( has_post_thumbnail() ) {
										?>
										<div class="post-thumbnail">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( 'medium' ); ?>
											</a>
										</div>
										<?php
									}
								?>
								<header class="entry-header">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="entry-meta">
										<span class="posted-on">Posted on <?php the_date(); ?></span>
										<span class="byline">by <?php the_author(); ?></span>
									</div>
								</header>
								<div class="entry-content">
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
								</div>
							</article>
							<?php
						}
					?>
				</div>
				<?php
				the_posts_pagination();
			} else {
				?>
				<p><?php esc_html_e( 'No posts found.', 'atoms' ); ?></p>
				<?php
			}
		?>
	</div>
</main>

<?php get_footer();
