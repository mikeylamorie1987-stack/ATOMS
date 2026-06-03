<?php
/**
 * Header Template
 * 
 * @package ATOMS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'atoms' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php
					if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					}
					if ( is_home() && is_front_page() ) {
						?>
						<h1 class="site-logo"><?php bloginfo( 'name' ); ?></h1>
						<?php
					} else {
						?>
						<p class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					}
				?>
			</div>

			<nav id="site-navigation" class="site-nav">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => 'wp_page_menu',
					) );
				?>
			</nav>
		</div>
	</header>
