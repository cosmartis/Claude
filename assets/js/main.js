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
} )();
