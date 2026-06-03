<?php
/**
 * Footer Template
 * 
 * @package ATOMS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
	</div><!-- #page -->
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-content">
				<div class="footer-section">
					<h3><?php bloginfo( 'name' ); ?></h3>
					<p><?php bloginfo( 'description' ); ?></p>
				</div>

				<?php
					if ( has_nav_menu( 'footer' ) ) {
						?>
						<div class="footer-section">
							<h3><?php esc_html_e( 'Quick Links', 'atoms' ); ?></h3>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'menu_id'        => 'footer-menu',
									'depth'          => 1,
								) );
							?>
						</div>
						<?php
					}
				?>

				<div class="footer-section">
					<h3><?php esc_html_e( 'Contact', 'atoms' ); ?></h3>
					<ul>
						<li><a href="mailto:info@atoms.dev">info@atoms.dev</a></li>
						<li><a href="https://atoms.dev" target="_blank">atoms.dev</a></li>
					</ul>
				</div>
			</div>

			<div class="footer-bottom">
				<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
				<p><?php esc_html_e( 'Noble Anarchy Collective - Dark Theme Powered by ATOMS', 'atoms' ); ?></p>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
