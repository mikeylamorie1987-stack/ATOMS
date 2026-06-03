<?php
/**
 * 404 Error Page Template
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
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( '404 - Page Not Found', 'atoms' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'The page you are looking for could not be found. Try returning to the homepage or use the search function.', 'atoms' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn">Back to Home</a>
			</div>
		</section>
	</div>
</main>

<?php get_footer();
