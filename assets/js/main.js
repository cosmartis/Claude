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

	// Barre CTA sticky (mobile) : masquée en haut de page, apparaît dès
	// qu'on scrolle et reste fixée en bas de l'écran.
	var stickyCta = document.querySelector( '.mobile-sticky-cta' );
	if ( stickyCta ) {
		var showAfter = 120;
		var toggleStickyCta = function () {
			stickyCta.classList.toggle( 'is-visible', window.scrollY > showAfter );
		};
		window.addEventListener( 'scroll', toggleStickyCta, { passive: true } );
		toggleStickyCta();
	}
} )();
