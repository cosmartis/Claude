<?php
/**
 * RGPD : bannière de consentement aux cookies.
 *
 * Le seul script non-essentiel chargé par le thème est le widget Calendly
 * (cookies tiers de prise de rendez-vous). Il n'est enqueue au chargement de
 * la page que si un consentement fonctionnel a déjà été enregistré lors
 * d'une visite précédente ; sinon assets/js/consent.js l'injecte dès que le
 * visiteur accepte, via l'événement "cosmartis:consent-updated".
 *
 * Le Pixel Meta (assets/js/meta-pixel.js) n'est jamais chargé côté serveur :
 * le fichier du thème est servi à tous, mais il n'injecte fbevents.js
 * (connect.facebook.net) qu'après un consentement "marketing" explicite.
 */

// Doit rester égal à CONSENT_VERSION dans assets/js/consent.js.
define( 'COSMARTIS_CONSENT_VERSION', 2 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_has_functional_consent() {
	if ( empty( $_COOKIE['cosmartis_consent'] ) ) {
		return false;
	}

	$decoded = json_decode( wp_unslash( $_COOKIE['cosmartis_consent'] ), true );

	// Un choix d'une ancienne version est ignoré (la bannière le redemande).
	return is_array( $decoded )
		&& isset( $decoded['version'] ) && (int) $decoded['version'] === COSMARTIS_CONSENT_VERSION
		&& ! empty( $decoded['functional'] );
}

function cosmartis_enqueue_consent_assets() {
	// meta-pixel.js est chargé AVANT consent.js (dépendance) pour que son
	// écouteur de "cosmartis:consent-updated" soit en place quand consent.js
	// émet le choix du visiteur.
	wp_enqueue_script(
		'cosmartis-meta-pixel',
		COSMARTIS_URI . '/assets/js/meta-pixel.js',
		array(),
		cosmartis_asset_version( '/assets/js/meta-pixel.js' ),
		true
	);

	wp_enqueue_script(
		'cosmartis-consent',
		COSMARTIS_URI . '/assets/js/consent.js',
		array( 'cosmartis-meta-pixel' ),
		cosmartis_asset_version( '/assets/js/consent.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'cosmartis_enqueue_consent_assets' );

function cosmartis_render_consent_banner() {
	get_template_part( 'template-parts/consent-banner' );
}
add_action( 'wp_footer', 'cosmartis_render_consent_banner' );
