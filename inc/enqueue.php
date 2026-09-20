<?php
/**
 * Styles, scripts, fonts, Calendly embed.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Version de cache basée sur la date de modification réelle du fichier
 * plutôt que sur COSMARTIS_VERSION (constante statique) : sans ça, l'URL
 * de style.css/main.js ne change jamais entre deux déploiements et les
 * navigateurs (ou un cache côté hébergeur) continuent de servir l'ancienne
 * version du fichier indéfiniment. Retombe sur COSMARTIS_VERSION si le
 * fichier est introuvable (ne devrait pas arriver en usage normal).
 */
function cosmartis_asset_version( $relative_path ) {
	$file = COSMARTIS_DIR . $relative_path;
	return file_exists( $file ) ? filemtime( $file ) : COSMARTIS_VERSION;
}

function cosmartis_enqueue_assets() {
	wp_enqueue_style(
		'inter-font',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'cosmartis-style', get_stylesheet_uri(), array(), cosmartis_asset_version( '/style.css' ) );

	wp_enqueue_script( 'cosmartis-main', COSMARTIS_URI . '/assets/js/main.js', array(), cosmartis_asset_version( '/assets/js/main.js' ), true );

	// Le CTA Calendly (popup) est présent dans le header sur toutes les pages.
	wp_enqueue_script( 'calendly-widget', 'https://assets.calendly.com/assets/external/widget.js', array(), null, true );
	wp_enqueue_style( 'calendly-widget-css', 'https://assets.calendly.com/assets/external/widget.css', array(), null );

	// is_page('contact') plutôt que is_page_template() : le gabarit page-contact.php
	// s'applique automatiquement par slug (hiérarchie WordPress), sans sélection
	// manuelle dans Attributs de page, donc is_page_template() ne le détecterait pas.
	if ( is_page( 'contact' ) ) {
		wp_enqueue_script( 'cosmartis-qualification-form', COSMARTIS_URI . '/assets/js/qualification-form.js', array(), cosmartis_asset_version( '/assets/js/qualification-form.js' ), true );
		wp_localize_script(
			'cosmartis-qualification-form',
			'cosmartisQualForm',
			array(
				'restUrl'      => esc_url_raw( rest_url( 'cosmartis/v1/qualification' ) ),
				'nonce'        => wp_create_nonce( 'wp_rest' ),
				'sendingLabel' => __( 'Envoi…', 'cosmartis' ),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'cosmartis_enqueue_assets' );
