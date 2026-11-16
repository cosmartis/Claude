/**
 * Page /rendez-vous/ : remplace le bouton de secours par l'agenda inline
 * dès que le widget tiers est disponible — au chargement si le consentement
 * existait déjà, ou juste après l'acceptation des cookies fonctionnels.
 */
(function () {
	'use strict';

	var container = null;
	var done = false;

	function tryInit() {
		if ( done || ! container || ! window.Calendly ) {
			return done;
		}
		var url = container.getAttribute( 'data-calendly-url' );
		if ( ! url ) {
			return false;
		}
		container.innerHTML = '';
		container.classList.add( 'is-loaded' );
		window.Calendly.initInlineWidget( { url: url, parentElement: container } );
		done = true;
		return true;
	}

	// Le script tiers est injecté en async par consent.js : on attend qu'il
	// soit prêt (10 s max) avant d'abandonner et de garder le bouton.
	function waitForWidget() {
		var tries = 0;
		var timer = window.setInterval( function () {
			tries++;
			if ( tryInit() || tries > 40 ) {
				window.clearInterval( timer );
			}
		}, 250 );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		container = document.getElementById( 'calendly-inline-embed' );
		if ( container && ! tryInit() ) {
			// Consentement déjà donné mais script pas encore exécuté.
			waitForWidget();
		}
	} );

	document.addEventListener( 'cosmartis:consent-updated', function ( e ) {
		if ( e.detail && e.detail.functional ) {
			waitForWidget();
		}
	} );
} )();
