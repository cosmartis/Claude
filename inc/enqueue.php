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

	// Le CTA Calendly (popup) est présent dans le header sur toutes les pages,
	// mais le script tiers n'est enqueue au chargement que si le visiteur a
	// déjà accepté les cookies fonctionnels lors d'une visite précédente
	// (cf. inc/consent.php). Sinon, assets/js/consent.js l'injecte dès que le
	// consentement est donné, et en son absence le bouton CTA se rabat sur un
	// simple lien externe vers calendly.com (voir assets/js/main.js).
	if ( cosmartis_has_functional_consent() ) {
		wp_enqueue_script( 'calendly-widget', 'https://assets.calendly.com/assets/external/widget.js', array(), null, true );
		wp_enqueue_style( 'calendly-widget-css', 'https://assets.calendly.com/assets/external/widget.css', array(), null );
	}

	// Assistant virtuel (bulle de chat, toutes les pages) : script léger, sans
	// dépendance, chargé en différé pour ne pas peser sur les Core Web Vitals.
	wp_enqueue_script(
		'cosmartis-chat-widget',
		COSMARTIS_URI . '/assets/js/chat-widget.js',
		array(),
		cosmartis_asset_version( '/assets/js/chat-widget.js' ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
	wp_localize_script(
		'cosmartis-chat-widget',
		'cosmartisChat',
		array(
			'endpoint'    => esc_url_raw( COSMARTIS_CHAT_ENDPOINT ),
			'openLabel'   => __( 'Ouvrir l\'assistant virtuel', 'cosmartis' ),
			'closeLabel'  => __( 'Fermer l\'assistant virtuel', 'cosmartis' ),
			'typingLabel' => __( 'L\'assistant est en train d\'écrire…', 'cosmartis' ),
			'fallback'    => sprintf(
				/* translators: 1: lien Calendly, 2: adresse e-mail */
				__( 'Désolé, je ne parviens pas à répondre pour le moment. Vous pouvez réserver un diagnostic gratuit ici : %1$s, ou écrire à %2$s.', 'cosmartis' ),
				COSMARTIS_CALENDLY_URL,
				'contact@cosmartis.com'
			),
		)
	);

	// is_page('contact') plutôt que is_page_template() : le gabarit page-contact.php
	// s'applique automatiquement par slug (hiérarchie WordPress), sans sélection
	// manuelle dans Attributs de page, donc is_page_template() ne le détecterait pas.
	if ( is_page( 'contact' ) ) {
		wp_enqueue_script( 'cosmartis-qualification-form', COSMARTIS_URI . '/assets/js/qualification-form.js', array(), cosmartis_asset_version( '/assets/js/qualification-form.js' ), true );
		wp_localize_script(
			'cosmartis-qualification-form',
			'cosmartisQualForm',
			array(
				'restUrl'           => esc_url_raw( rest_url( 'cosmartis/v1/qualification' ) ),
				'nonce'             => wp_create_nonce( 'wp_rest' ),
				'sendingLabel'      => __( 'Envoi…', 'cosmartis' ),
				'calendlyLinkLabel' => __( 'Choisir mon créneau sur Calendly', 'cosmartis' ),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'cosmartis_enqueue_assets' );

function cosmartis_render_chat_widget() {
	get_template_part( 'template-parts/chat-widget' );
}
add_action( 'wp_footer', 'cosmartis_render_chat_widget' );
