/**
 * Assistant virtuel du site (voir cosmartis-sync.md, mise à jour 33).
 *
 * Aucune bibliothèque externe. Le balisage est rendu par
 * template-parts/chat-widget.php ; ce script (chargé en différé, en pied de
 * page) se contente de brancher les événements, puis affiche l'infobulle
 * d'accueil quand le navigateur est au repos.
 *
 * Appel : POST cosmartisChat.endpoint, { messages: [ {role, content}, ... ] }
 * → { reply: "texte" }. Le message d'accueil n'est jamais envoyé.
 */
(function () {
	'use strict';

	var cfg = window.cosmartisChat || {};
	var root = document.getElementById( 'cz-chat' );
	if ( ! root || ! cfg.endpoint ) {
		return;
	}

	var MAX_HISTORY = 8;
	var MAX_CHARS = 600;
	var TIMEOUT_MS = 30000;
	var STORE_KEY = 'czChatHistory';
	var TEASER_KEY = 'czChatTeaserSeen';

	var toggle = document.getElementById( 'cz-chat-toggle' );
	var panel = document.getElementById( 'cz-chat-panel' );
	var teaser = document.getElementById( 'cz-chat-teaser' );
	var log = document.getElementById( 'cz-chat-log' );
	var form = document.getElementById( 'cz-chat-form' );
	var input = document.getElementById( 'cz-chat-input' );
	var sendBtn = form.querySelector( '.cz-chat__send' );

	var history = [];
	var pending = false;

	// sessionStorage peut être indisponible (navigation privée, stockage bloqué).
	function store( key, value ) {
		try {
			window.sessionStorage.setItem( key, value );
		} catch ( e ) {}
	}

	function load( key ) {
		try {
			return window.sessionStorage.getItem( key );
		} catch ( e ) {
			return null;
		}
	}

	// Les réponses contiennent des URL et des e-mails en texte brut : on les
	// rend cliquables en construisant des nœuds DOM (jamais d'innerHTML).
	var LINK_RE = /(https?:\/\/[^\s<>"]+|www\.[^\s<>"]+|[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})/gi;
	var TRAILING_RE = /[.,;:!?)\]»'"]+$/;

	function appendLinkified( el, text ) {
		var last = 0;
		text.replace( LINK_RE, function ( match, _p, offset ) {
			var trail = ( match.match( TRAILING_RE ) || [ '' ] )[ 0 ];
			var link = trail ? match.slice( 0, -trail.length ) : match;
			el.appendChild( document.createTextNode( text.slice( last, offset ) ) );

			var a = document.createElement( 'a' );
			if ( link.indexOf( '@' ) !== -1 && ! /^https?:|^www\./i.test( link ) ) {
				a.href = 'mailto:' + link;
			} else {
				a.href = /^www\./i.test( link ) ? 'https://' + link : link;
				if ( a.hostname !== window.location.hostname ) {
					a.target = '_blank';
					a.rel = 'noopener';
				}
			}
			a.textContent = link;
			el.appendChild( a );

			last = offset + link.length;
			return match;
		} );
		el.appendChild( document.createTextNode( text.slice( last ) ) );
	}

	function addMessage( role, text ) {
		var el = document.createElement( 'div' );
		el.className = 'cz-chat__msg cz-chat__msg--' + role;
		appendLinkified( el, text );
		log.appendChild( el );
		log.scrollTop = log.scrollHeight;
		return el;
	}

	function showTyping() {
		var el = document.createElement( 'div' );
		el.className = 'cz-chat__msg cz-chat__msg--assistant cz-chat__typing';
		el.innerHTML = '<span></span><span></span><span></span>';
		el.setAttribute( 'aria-label', cfg.typingLabel || '' );
		el.setAttribute( 'role', 'status' );
		log.appendChild( el );
		log.scrollTop = log.scrollHeight;
		return el;
	}

	function saveHistory() {
		store( STORE_KEY, JSON.stringify( history.slice( -20 ) ) );
	}

	function restoreHistory() {
		var saved;
		try {
			saved = JSON.parse( load( STORE_KEY ) || '[]' );
		} catch ( e ) {
			saved = [];
		}
		if ( ! Array.isArray( saved ) ) {
			return;
		}
		saved.forEach( function ( m ) {
			if ( m && ( 'user' === m.role || 'assistant' === m.role ) && 'string' === typeof m.content ) {
				history.push( { role: m.role, content: m.content } );
				addMessage( m.role, m.content );
			}
		} );
	}

	function hideTeaser() {
		if ( teaser && ! teaser.hidden ) {
			teaser.hidden = true;
		}
		store( TEASER_KEY, '1' );
	}

	function setOpen( open ) {
		panel.hidden = ! open;
		root.classList.toggle( 'is-open', open );
		toggle.setAttribute( 'aria-expanded', String( open ) );
		toggle.setAttribute( 'aria-label', open ? cfg.closeLabel : cfg.openLabel );
		if ( open ) {
			hideTeaser();
			log.scrollTop = log.scrollHeight;
			input.focus();
		}
	}

	function autoGrow() {
		input.style.height = 'auto';
		input.style.height = Math.min( input.scrollHeight, 120 ) + 'px';
	}

	function send( text ) {
		pending = true;
		sendBtn.disabled = true;

		history.push( { role: 'user', content: text } );
		addMessage( 'user', text );
		var typing = showTyping();

		var payload = {
			messages: history.slice( -MAX_HISTORY ).map( function ( m ) {
				return { role: m.role, content: m.content.slice( 0, MAX_CHARS ) };
			} ),
		};

		var controller = 'AbortController' in window ? new AbortController() : null;
		var timer = controller ? setTimeout( function () { controller.abort(); }, TIMEOUT_MS ) : null;

		fetch( cfg.endpoint, {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify( payload ),
			signal: controller ? controller.signal : undefined,
		} )
			.then( function ( res ) {
				if ( ! res.ok ) {
					throw new Error( 'HTTP ' + res.status );
				}
				return res.json();
			} )
			.then( function ( data ) {
				var reply = data && 'string' === typeof data.reply ? data.reply.trim() : '';
				if ( ! reply ) {
					throw new Error( 'empty reply' );
				}
				history.push( { role: 'assistant', content: reply } );
				typing.remove();
				addMessage( 'assistant', reply );
			} )
			.catch( function () {
				// Le message de repli n'entre pas dans l'historique envoyé, et la
				// question restée sans réponse en est retirée pour garder une
				// alternance utilisateur / assistant propre.
				history.pop();
				typing.remove();
				addMessage( 'assistant', cfg.fallback );
			} )
			.then( function () {
				if ( timer ) {
					clearTimeout( timer );
				}
				saveHistory();
				pending = false;
				sendBtn.disabled = false;
				input.focus();
			} );
	}

	toggle.addEventListener( 'click', function () {
		setOpen( panel.hidden );
	} );

	root.querySelector( '.cz-chat__close' ).addEventListener( 'click', function () {
		setOpen( false );
		toggle.focus();
	} );

	if ( teaser ) {
		teaser.querySelector( '.cz-chat__teaser-close' ).addEventListener( 'click', hideTeaser );
		teaser.querySelector( 'span' ).addEventListener( 'click', function () {
			setOpen( true );
		} );
	}

	root.addEventListener( 'keydown', function ( e ) {
		if ( 'Escape' === e.key && ! panel.hidden ) {
			setOpen( false );
			toggle.focus();
		}
	} );

	form.addEventListener( 'submit', function ( e ) {
		e.preventDefault();
		var text = input.value.trim().slice( 0, MAX_CHARS );
		if ( ! text || pending ) {
			return;
		}
		input.value = '';
		autoGrow();
		send( text );
	} );

	// Entrée envoie, Maj+Entrée va à la ligne.
	input.addEventListener( 'keydown', function ( e ) {
		if ( 'Enter' === e.key && ! e.shiftKey && ! e.isComposing ) {
			e.preventDefault();
			form.requestSubmit ? form.requestSubmit() : form.dispatchEvent( new Event( 'submit', { cancelable: true } ) );
		}
	} );

	input.addEventListener( 'input', autoGrow );

	restoreHistory();

	// Infobulle d'accueil : affichée une fois par session, après un court
	// délai et quand le navigateur est au repos (n'affecte pas le rendu initial).
	if ( teaser && ! load( TEASER_KEY ) ) {
		var idle = window.requestIdleCallback || function ( cb ) { return setTimeout( cb, 1 ); };
		setTimeout( function () {
			idle( function () {
				if ( panel.hidden && ! load( TEASER_KEY ) ) {
					teaser.hidden = false;
				}
			} );
		}, 2500 );
	}
} )();
