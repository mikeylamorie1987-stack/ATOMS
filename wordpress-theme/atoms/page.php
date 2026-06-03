<?php
/**
 * Page Template
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
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
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
				</article>
				<?php
			}
		?>
	</div>
</main>

<?php get_footer();
