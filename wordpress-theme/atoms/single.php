<?php
/**
 * Single Post Template
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
			while ( have_posts() ) {
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-meta">
							<span class="posted-on">Posted on <?php the_date(); ?></span>
							<span class="byline">by <?php the_author(); ?></span>
							<?php the_category( ', ' ); ?>
						</div>
					</header>

					<?php
						if ( has_post_thumbnail() ) {
							?>
							<div class="post-thumbnail">
								<?php the_post_thumbnail( 'full' ); ?>
							</div>
							<?php
						}
					?>

					<div class="entry-content">
						<?php
							the_content();
							wp_link_pages( array(
								'before' => '<div class="page-links">',
								'after'  => '</div>',
							) );
						?>
					</div>

					<footer class="entry-footer">
						<?php the_tags( '<div class="tags">', ' ', '</div>' ); ?>
					</footer>
				</article>

				<?php comments_template(); ?>
				<?php
			}
		?>
	</div>
</main>

<?php get_footer();
