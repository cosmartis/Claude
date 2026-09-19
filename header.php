<?php
/**
 * Header.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Aller au contenu', 'cosmartis' ); ?></a>

<header class="site-header">
	<div class="container">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>

		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Menu principal', 'cosmartis' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) );
			} else {
				cosmartis_fallback_primary_menu();
			}
			?>
		</nav>

		<div class="header-cta">
			<?php
			get_template_part(
				'template-parts/calendly-cta',
				null,
				array(
					'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
					'style' => 'primary',
				)
			);
			?>
			<button type="button" class="menu-toggle btn btn-secondary" aria-expanded="false" aria-controls="mobile-nav">
				<?php esc_html_e( 'Menu', 'cosmartis' ); ?>
			</button>
		</div>
	</div>

	<nav id="mobile-nav" class="mobile-nav" aria-label="<?php esc_attr_e( 'Menu mobile', 'cosmartis' ); ?>" hidden>
		<div class="container">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) );
			} else {
				cosmartis_fallback_primary_menu();
			}
			?>
		</div>
	</nav>
</header>

<div class="mobile-sticky-cta">
	<?php
	get_template_part(
		'template-parts/calendly-cta',
		null,
		array(
			'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
			'style' => 'primary',
		)
	);
	?>
</div>

<main id="main">
