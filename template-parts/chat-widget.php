<?php
/**
 * Assistant virtuel du site : bulle en bas à droite + infobulle d'accueil +
 * panneau de conversation (voir cosmartis-sync.md, mise à jour 33).
 *
 * Le balisage est rendu côté serveur (léger, visible immédiatement) ; toute
 * la logique vit dans assets/js/chat-widget.js, chargé en différé.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$welcome = __( 'Bonjour ! Comment puis-je vous aider ?', 'cosmartis' );
?>
<div class="cz-chat" id="cz-chat">
	<div class="cz-chat__teaser" id="cz-chat-teaser" hidden>
		<span><?php echo esc_html( $welcome ); ?></span>
		<button type="button" class="cz-chat__teaser-close" aria-label="<?php esc_attr_e( 'Masquer ce message', 'cosmartis' ); ?>">&times;</button>
	</div>

	<button
		type="button"
		class="cz-chat__bubble"
		id="cz-chat-toggle"
		aria-controls="cz-chat-panel"
		aria-expanded="false"
		aria-label="<?php esc_attr_e( 'Ouvrir l\'assistant virtuel', 'cosmartis' ); ?>"
	>
		<svg class="cz-chat__icon-open" width="26" height="26" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M4 3h16a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H8.4L4 21.5V18a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Zm3 6.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm5 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm5 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/></svg>
		<svg class="cz-chat__icon-close" width="22" height="22" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M6.4 5 5 6.4 10.6 12 5 17.6 6.4 19l5.6-5.6 5.6 5.6 1.4-1.4-5.6-5.6L19 6.4 17.6 5 12 10.6Z"/></svg>
	</button>

	<div class="cz-chat__panel" id="cz-chat-panel" role="dialog" aria-modal="false" aria-labelledby="cz-chat-title" hidden>
		<div class="cz-chat__header">
			<div>
				<strong id="cz-chat-title"><?php esc_html_e( 'Assistant Cosmartis', 'cosmartis' ); ?></strong>
				<a class="cz-chat__ai-link" href="<?php echo esc_url( home_url( '/politique-de-confidentialite/#assistant-virtuel' ) ); ?>"><?php esc_html_e( 'Assistant virtuel (IA)', 'cosmartis' ); ?></a>
			</div>
			<button type="button" class="cz-chat__close" aria-label="<?php esc_attr_e( 'Fermer l\'assistant', 'cosmartis' ); ?>">&times;</button>
		</div>

		<div class="cz-chat__log" id="cz-chat-log" role="log" aria-live="polite" aria-relevant="additions">
			<div class="cz-chat__msg cz-chat__msg--assistant"><?php echo esc_html( $welcome ); ?></div>
		</div>

		<form class="cz-chat__form" id="cz-chat-form">
			<label for="cz-chat-input" class="screen-reader-text"><?php esc_html_e( 'Votre message', 'cosmartis' ); ?></label>
			<textarea id="cz-chat-input" rows="1" maxlength="600" placeholder="<?php esc_attr_e( 'Écrivez votre question…', 'cosmartis' ); ?>" autocomplete="off"></textarea>
			<button type="submit" class="cz-chat__send" aria-label="<?php esc_attr_e( 'Envoyer', 'cosmartis' ); ?>">
				<svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M3 20.5 21 12 3 3.5v6.6L15 12 3 13.9Z"/></svg>
			</button>
		</form>
	</div>
</div>
