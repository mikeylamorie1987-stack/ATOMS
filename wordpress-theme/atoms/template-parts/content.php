<?php
/**
 * Template part for displaying posts
 * 
 * @package ATOMS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card post-content' ); ?>>
	<?php
		if ( has_post_thumbnail() ) {
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'medium' ); ?>
			</div>
			<?php
		}
	?>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
