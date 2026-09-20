<?php
/**
 * Footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>

<footer class="site-footer">
	<div class="container">
		<div class="footer-grid">
			<div>
				<div class="site-branding"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></div>
				<p class="text-muted"><?php esc_html_e( 'Automatisation commerciale, marketing, administrative et opérationnelle pour indépendants et TPE/PME — France, Belgique francophone, Suisse romande, Luxembourg.', 'cosmartis' ); ?></p>
			</div>

			<div>
				<h4><?php esc_html_e( 'Navigation', 'cosmartis' ); ?></h4>
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false ) );
				} else {
					cosmartis_fallback_primary_menu();
				}
				?>
			</div>

			<div>
				<h4><?php esc_html_e( 'Légal', 'cosmartis' ); ?></h4>
				<?php
				if ( has_nav_menu( 'legal' ) ) {
					wp_nav_menu( array( 'theme_location' => 'legal', 'container' => false ) );
				} else {
					?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>"><?php esc_html_e( 'Mentions légales', 'cosmartis' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/politique-de-confidentialite/' ) ); ?>"><?php esc_html_e( 'Politique de confidentialité', 'cosmartis' ); ?></a></li>
					</ul>
					<?php
				}
				?>
				<ul>
					<li><a href="#" class="js-consent-manage"><?php esc_html_e( 'Gérer les cookies', 'cosmartis' ); ?></a></li>
				</ul>
			</div>

			<div>
				<h4><?php esc_html_e( 'Diagnostic gratuit', 'cosmartis' ); ?></h4>
				<?php
				get_template_part(
					'template-parts/calendly-cta',
					null,
					array(
						'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
						'style' => 'secondary',
					)
				);
				?>
			</div>
		</div>

		<div class="footer-bottom">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
			<span class="text-muted"><?php esc_html_e( 'Conforme RGPD / UE', 'cosmartis' ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
