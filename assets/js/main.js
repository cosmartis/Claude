(function () {
	'use strict';

	// Menu mobile
	var toggle = document.querySelector( '.menu-toggle' );
	var mobileNav = document.getElementById( 'mobile-nav' );
	if ( toggle && mobileNav ) {
		toggle.addEventListener( 'click', function () {
			var isOpen = ! mobileNav.hidden;
			mobileNav.hidden = isOpen;
			toggle.setAttribute( 'aria-expanded', String( ! isOpen ) );
		} );
	}

	// CTA Calendly (popup) — jamais un simple lien de sortie.
	document.querySelectorAll( '.js-calendly-popup' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			var url = btn.getAttribute( 'data-calendly-url' );
			if ( window.Calendly && url ) {
				window.Calendly.initPopupWidget( { url: url } );
			} else if ( url ) {
				window.open( url, '_blank', 'noopener' );
			}
		} );
	} );

	// Même popup Calendly pour tout bouton Gutenberg/Elementor stylé
	// "Popup Calendly" (voir inc/setup.php > cosmartis_register_block_styles) :
	// Bouchra peut ainsi ajouter ce CTA depuis l'éditeur, sans toucher au code.
	document.querySelectorAll( '.is-style-calendly-popup a' ).forEach( function ( link ) {
		link.addEventListener( 'click', function ( event ) {
			var url = ( window.cosmartisSettings && cosmartisSettings.calendlyUrl ) || link.getAttribute( 'href' );
			if ( window.Calendly && url ) {
				event.preventDefault();
				window.Calendly.initPopupWidget( { url: url } );
			}
		} );
	} );
} )();
