(function () {
	'use strict';

	var COOKIE_NAME = 'cosmartis_consent';
	var COOKIE_MAX_AGE_DAYS = 180; // Recommandation CNIL : ne pas dépasser 13 mois.
	var CONSENT_VERSION = 1;

	function readConsent() {
		var match = document.cookie.match( new RegExp( '(?:^|; )' + COOKIE_NAME + '=([^;]*)' ) );
		if ( ! match ) {
			return null;
		}
		try {
			var parsed = JSON.parse( decodeURIComponent( match[ 1 ] ) );
			if ( parsed && parsed.version === CONSENT_VERSION ) {
				return parsed;
			}
		} catch ( e ) {
			// Cookie corrompu ou ancien format de consentement : on redemande.
		}
		return null;
	}

	function writeConsent( consent ) {
		var payload = encodeURIComponent( JSON.stringify( consent ) );
		var maxAge = COOKIE_MAX_AGE_DAYS * 24 * 60 * 60;
		var secure = 'https:' === window.location.protocol ? '; Secure' : '';
		document.cookie = COOKIE_NAME + '=' + payload + '; Max-Age=' + maxAge + '; Path=/; SameSite=Lax' + secure;
	}

	// Charge le widget Calendly (script + css tiers) uniquement si le visiteur
	// a explicitement accepté les cookies fonctionnels. Tant que ce n'est pas
	// le cas, le bouton CTA se rabat sur un simple lien vers calendly.com
	// (voir assets/js/main.js) qui ne dépose aucun cookie sur ce site.
	function applyConsent( consent ) {
		if ( consent.functional && ! document.getElementById( 'calendly-widget-css' ) ) {
			var link = document.createElement( 'link' );
			link.id = 'calendly-widget-css';
			link.rel = 'stylesheet';
			link.href = 'https://assets.calendly.com/assets/external/widget.css';
			document.head.appendChild( link );
		}
		if ( consent.functional && ! window.Calendly && ! document.getElementById( 'calendly-widget-js' ) ) {
			var script = document.createElement( 'script' );
			script.id = 'calendly-widget-js';
			script.src = 'https://assets.calendly.com/assets/external/widget.js';
			script.async = true;
			document.body.appendChild( script );
		}
		document.dispatchEvent( new CustomEvent( 'cosmartis:consent-updated', { detail: consent } ) );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		var banner = document.getElementById( 'cookie-consent-banner' );
		var modal = document.getElementById( 'cookie-consent-modal' );
		if ( ! banner || ! modal ) {
			return;
		}

		var functionalToggle = modal.querySelector( '#consent-functional' );

		function showBanner() {
			banner.hidden = false;
			document.body.classList.add( 'has-cookie-banner' );
		}

		function hideBanner() {
			banner.hidden = true;
			modal.hidden = true;
			document.body.classList.remove( 'has-cookie-banner' );
		}

		function saveConsent( functional ) {
			var consent = {
				necessary: true,
				functional: !! functional,
				timestamp: new Date().toISOString(),
				version: CONSENT_VERSION,
			};
			writeConsent( consent );
			applyConsent( consent );
			hideBanner();
		}

		function openModal() {
			var stored = readConsent();
			if ( functionalToggle ) {
				functionalToggle.checked = stored ? !! stored.functional : true;
			}
			banner.hidden = false;
			modal.hidden = false;
			document.body.classList.add( 'has-cookie-banner' );
		}

		banner.querySelector( '.js-consent-accept-all' ).addEventListener( 'click', function () {
			saveConsent( true );
		} );
		banner.querySelector( '.js-consent-reject-all' ).addEventListener( 'click', function () {
			saveConsent( false );
		} );
		banner.querySelector( '.js-consent-customize' ).addEventListener( 'click', openModal );
		modal.querySelector( '.js-consent-save' ).addEventListener( 'click', function () {
			saveConsent( functionalToggle && functionalToggle.checked );
		} );
		modal.querySelector( '.js-consent-close' ).addEventListener( 'click', function () {
			modal.hidden = true;
		} );

		// Lien "Gérer les cookies" (pied de page) : permet de revenir sur son
		// choix à tout moment, retrait aussi simple que le consentement initial.
		document.querySelectorAll( '.js-consent-manage' ).forEach( function ( link ) {
			link.addEventListener( 'click', function ( e ) {
				e.preventDefault();
				openModal();
			} );
		} );

		var existing = readConsent();
		if ( existing ) {
			applyConsent( existing );
		} else {
			// Pas de choix enregistré : la bannière reste visible jusqu'à ce que
			// le visiteur clique sur un des boutons. Le scroll ne la ferme pas.
			showBanner();
		}
	} );
} )();
