<?php
/**
 * RGPD : bannière de consentement aux cookies.
 *
 * Le seul script non-essentiel chargé par le thème est le widget Calendly
 * (cookies tiers de prise de rendez-vous). Il n'est enqueue au chargement de
 * la page que si un consentement fonctionnel a déjà été enregistré lors
 * d'une visite précédente ; sinon assets/js/consent.js l'injecte dès que le
 * visiteur accepte, via l'événement "cosmartis:consent-updated".
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_has_functional_consent() {
	if ( empty( $_COOKIE['cosmartis_consent'] ) ) {
		return false;
	}

	$decoded = json_decode( wp_unslash( $_COOKIE['cosmartis_consent'] ), true );

	return is_array( $decoded ) && ! empty( $decoded['functional'] );
}

function cosmartis_enqueue_consent_assets() {
	wp_enqueue_script(
		'cosmartis-consent',
		COSMARTIS_URI . '/assets/js/consent.js',
		array(),
		cosmartis_asset_version( '/assets/js/consent.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'cosmartis_enqueue_consent_assets' );

function cosmartis_render_consent_banner() {
	get_template_part( 'template-parts/consent-banner' );
}
add_action( 'wp_footer', 'cosmartis_render_consent_banner' );
