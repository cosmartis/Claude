/**
 * Pixel Meta (Facebook) — chargé UNIQUEMENT après consentement "marketing".
 *
 * Aucun appel vers connect.facebook.net / facebook.com tant que le visiteur
 * n'a pas coché "Cookies publicitaires (Meta)" ou cliqué "Accepter".
 * Le script écoute l'évènement "cosmartis:consent-updated" émis par
 * assets/js/consent.js (au chargement si un choix existe déjà, puis à
 * chaque modification via la bannière ou "Gérer les cookies").
 *
 * Évènements envoyés (seulement si pixel chargé ET consentement actif) :
 *  - PageView  : à l'initialisation ;
 *  - Lead      : envoi réussi d'un formulaire Contact Form 7 (wpcf7mailsent)
 *                ou du questionnaire de qualification du thème
 *                (évènement "cosmartis:lead", cf. qualification-form.js) ;
 *  - Schedule  : rendez-vous confirmé dans Calendly (postMessage
 *                "calendly.event_scheduled").
 *
 * Retrait du consentement : fbq('consent','revoke') + plus aucun évènement
 * envoyé, et suppression des cookies _fbp / _fbc du domaine.
 */
( function () {
	'use strict';

	var PIXEL_ID = '1810473263551718';
	var loaded = false; // fbevents.js injecté + init fait (une seule fois par page).
	var granted = false; // consentement marketing actif à l'instant T.

	function loadPixel() {
		if ( loaded || window.fbq ) {
			loaded = true;
			return;
		}
		loaded = true;

		/* Snippet officiel Meta, injecté dynamiquement. */
		var n = ( window.fbq = function () {
			n.callMethod ? n.callMethod.apply( n, arguments ) : n.queue.push( arguments );
		} );
		if ( ! window._fbq ) {
			window._fbq = n;
		}
		n.push = n;
		n.loaded = true;
		n.version = '2.0';
		n.queue = [];

		var script = document.createElement( 'script' );
		script.id = 'meta-pixel-js';
		script.async = true;
		script.src = 'https://connect.facebook.net/en_US/fbevents.js';
		document.head.appendChild( script );

		window.fbq( 'init', PIXEL_ID );
		window.fbq( 'track', 'PageView' );
	}

	function deleteCookie( name ) {
		var host = window.location.hostname;
		var parts = host.split( '.' );
		var domains = [ '', host ];
		// _fbp est posé sur le domaine racine (".cosmartis.com").
		for ( var i = 0; i < parts.length - 1; i++ ) {
			domains.push( '.' + parts.slice( i ).join( '.' ) );
		}
		domains.forEach( function ( d ) {
			document.cookie = name + '=; Max-Age=0; Path=/' + ( d ? '; Domain=' + d : '' );
		} );
	}

	function track( eventName, params ) {
		if ( ! loaded || ! granted || typeof window.fbq !== 'function' ) {
			return;
		}
		window.fbq( 'track', eventName, params || {} );
	}

	document.addEventListener( 'cosmartis:consent-updated', function ( e ) {
		var consent = e.detail || {};

		if ( consent.marketing === true ) {
			granted = true;
			if ( loaded ) {
				// Pixel déjà présent (consentement retiré puis redonné sans
				// recharger la page) : on réactive simplement l'envoi.
				window.fbq( 'consent', 'grant' );
			} else {
				loadPixel();
			}
			return;
		}

		// Refus ou retrait : plus aucun évènement.
		if ( granted && loaded && typeof window.fbq === 'function' ) {
			window.fbq( 'consent', 'revoke' );
		}
		granted = false;
		deleteCookie( '_fbp' );
		deleteCookie( '_fbc' );
	} );

	// Lead — Contact Form 7 (si un formulaire CF7 est utilisé sur le site).
	document.addEventListener( 'wpcf7mailsent', function () {
		track( 'Lead' );
	} );

	// Lead — questionnaire de qualification du thème (page Contact).
	document.addEventListener( 'cosmartis:lead', function () {
		track( 'Lead' );
	} );

	// Schedule — réservation confirmée dans le widget Calendly (popup ou inline).
	window.addEventListener( 'message', function ( e ) {
		if ( ! e.origin || ! /^https:\/\/([a-z0-9-]+\.)*calendly\.com$/.test( e.origin ) ) {
			return;
		}
		if ( e.data && e.data.event === 'calendly.event_scheduled' ) {
			track( 'Schedule' );
		}
	} );
} )();
