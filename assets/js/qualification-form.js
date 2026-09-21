(function () {
	'use strict';

	var form = document.getElementById( 'qual-form' );
	var embedContainer = document.getElementById( 'calendly-inline-embed' );

	function initCalendly( prefill ) {
		if ( ! embedContainer ) {
			return;
		}
		var baseUrl = embedContainer.getAttribute( 'data-calendly-url' );

		if ( ! window.Calendly ) {
			// Widget non chargé (cookies fonctionnels non acceptés, ou script
			// tiers indisponible) : on garde un lien direct vers Calendly pour
			// que la prise de rendez-vous reste possible.
			embedContainer.innerHTML = '';
			var link = document.createElement( 'a' );
			link.href = baseUrl;
			link.target = '_blank';
			link.rel = 'noopener';
			link.className = 'btn btn-primary';
			link.textContent = cosmartisQualForm.calendlyLinkLabel || 'Choisir mon créneau sur Calendly';
			embedContainer.appendChild( link );
			return;
		}

		embedContainer.innerHTML = '';
		window.Calendly.initInlineWidget( {
			url: baseUrl,
			parentElement: embedContainer,
			prefill: prefill || {},
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		initCalendly();
	} );

	if ( ! form ) {
		return;
	}

	var steps = Array.prototype.slice.call( form.querySelectorAll( 'fieldset[data-step]' ) );
	var totalSteps = steps.length;
	var currentStep = 1;

	var prevBtn = document.getElementById( 'qf-prev' );
	var nextBtn = document.getElementById( 'qf-next' );
	var submitBtn = document.getElementById( 'qf-submit' );
	var errorEl = document.getElementById( 'qf-error' );
	var successEl = document.getElementById( 'qf-success' );
	var progressBar = form.querySelector( '.progress-bar' );

	function showStep( step ) {
		steps.forEach( function ( fieldset ) {
			fieldset.classList.toggle( 'active', parseInt( fieldset.getAttribute( 'data-step' ), 10 ) === step );
		} );
		progressBar.style.width = ( step / totalSteps * 100 ) + '%';
		prevBtn.hidden = step === 1;
		nextBtn.hidden = step === totalSteps;
		submitBtn.hidden = step !== totalSteps;
		errorEl.style.display = 'none';
	}

	function stepIsValid( step ) {
		var fieldset = steps[ step - 1 ];
		var requiredInputs = fieldset.querySelectorAll( '[required]' );
		for ( var i = 0; i < requiredInputs.length; i++ ) {
			if ( ! requiredInputs[ i ].value.trim() ) {
				return false;
			}
			if ( requiredInputs[ i ].type === 'email' && ! /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test( requiredInputs[ i ].value ) ) {
				return false;
			}
		}
		var choiceGroups = fieldset.querySelectorAll( '.choice-group' );
		for ( var j = 0; j < choiceGroups.length; j++ ) {
			var name = choiceGroups[ j ].querySelector( 'input' ).name;
			if ( ! fieldset.querySelector( 'input[name="' + name + '"]:checked' ) ) {
				return false;
			}
		}
		return true;
	}

	nextBtn.addEventListener( 'click', function () {
		if ( ! stepIsValid( currentStep ) ) {
			errorEl.style.display = 'block';
			return;
		}
		currentStep = Math.min( currentStep + 1, totalSteps );
		showStep( currentStep );
	} );

	prevBtn.addEventListener( 'click', function () {
		currentStep = Math.max( currentStep - 1, 1 );
		showStep( currentStep );
	} );

	function computeScore() {
		var score = 0;
		form.querySelectorAll( 'input[type="radio"]:checked' ).forEach( function ( input ) {
			score += parseInt( input.getAttribute( 'data-score' ) || '0', 10 );
		} );
		return score;
	}

	function collectAnswers() {
		var answers = {};
		Array.prototype.slice.call( form.elements ).forEach( function ( el ) {
			if ( ! el.name ) {
				return;
			}
			if ( ( el.type === 'radio' || el.type === 'checkbox' ) && ! el.checked ) {
				return;
			}
			answers[ el.name ] = el.value;
		} );
		return answers;
	}

	form.addEventListener( 'submit', function ( event ) {
		event.preventDefault();

		if ( ! stepIsValid( currentStep ) ) {
			errorEl.style.display = 'block';
			return;
		}

		submitBtn.disabled = true;
		submitBtn.textContent = cosmartisQualForm.sendingLabel || '…';

		var payload = {
			answers: collectAnswers(),
			score: computeScore(),
		};

		fetch( cosmartisQualForm.restUrl, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-WP-Nonce': cosmartisQualForm.nonce,
			},
			body: JSON.stringify( payload ),
		} )
			.catch( function () {
				// Le formulaire reste utile même en cas d'échec réseau : on
				// n'empêche jamais l'utilisateur d'aller jusqu'à la réservation.
			} )
			.finally( function () {
				form.querySelectorAll( 'fieldset' ).forEach( function ( fieldset ) {
					fieldset.classList.remove( 'active' );
				} );
				form.querySelector( '.form-nav' ).style.display = 'none';
				successEl.style.display = 'block';

				initCalendly( {
					name: payload.answers.prenom || '',
					email: payload.answers.email || '',
				} );

				var reservation = document.getElementById( 'reservation' );
				if ( reservation ) {
					reservation.scrollIntoView( { behavior: 'smooth' } );
				}
			} );
	} );

	showStep( currentStep );
} )();
