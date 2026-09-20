<?php
/**
 * Bannière de consentement aux cookies (RGPD).
 *
 * Reste affichée tant qu'aucun choix explicite n'a été fait — elle ne se
 * ferme jamais au simple scroll, un défilement de page ne valant pas
 * consentement valide au sens RGPD (recommandation CNIL, 2020).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="cookie-consent-banner" class="cookie-consent-banner" role="dialog" aria-live="polite" aria-label="<?php esc_attr_e( 'Gestion des cookies', 'cosmartis' ); ?>" hidden>
	<div class="container cookie-consent-banner__inner">
		<p class="cookie-consent-banner__text">
			<?php
			printf(
				/* translators: %s: link to the privacy policy page. */
				esc_html__( 'Nous utilisons des cookies strictement nécessaires au fonctionnement du site et, avec votre accord, des cookies fonctionnels (widget de prise de rendez-vous Calendly). Vous pouvez accepter, refuser ou personnaliser vos choix, et en changer à tout moment. %s', 'cosmartis' ),
				'<a href="' . esc_url( home_url( '/politique-de-confidentialite/' ) ) . '">' . esc_html__( 'En savoir plus', 'cosmartis' ) . '</a>'
			);
			?>
		</p>
		<div class="cookie-consent-banner__actions">
			<button type="button" class="btn btn-secondary js-consent-reject-all"><?php esc_html_e( 'Refuser', 'cosmartis' ); ?></button>
			<button type="button" class="btn btn-secondary js-consent-customize"><?php esc_html_e( 'Personnaliser', 'cosmartis' ); ?></button>
			<button type="button" class="btn btn-primary js-consent-accept-all"><?php esc_html_e( 'Accepter', 'cosmartis' ); ?></button>
		</div>
	</div>

	<div id="cookie-consent-modal" class="cookie-consent-modal" hidden>
		<div class="cookie-consent-modal__inner" role="document">
			<h2><?php esc_html_e( 'Personnaliser les cookies', 'cosmartis' ); ?></h2>

			<div class="cookie-consent-modal__category">
				<div class="cookie-consent-modal__category-head">
					<label for="consent-necessary"><?php esc_html_e( 'Cookies nécessaires', 'cosmartis' ); ?></label>
					<input type="checkbox" id="consent-necessary" checked disabled />
				</div>
				<p class="text-muted"><?php esc_html_e( 'Indispensables au fonctionnement du site (navigation, sécurité). Ils ne peuvent pas être désactivés.', 'cosmartis' ); ?></p>
			</div>

			<div class="cookie-consent-modal__category">
				<div class="cookie-consent-modal__category-head">
					<label for="consent-functional"><?php esc_html_e( 'Cookies fonctionnels (Calendly)', 'cosmartis' ); ?></label>
					<input type="checkbox" id="consent-functional" name="consent-functional" />
				</div>
				<p class="text-muted"><?php esc_html_e( 'Permettent d\'afficher le widget de prise de rendez-vous Calendly directement sur le site. Si vous refusez, la réservation s\'ouvre dans un nouvel onglet sur le site de Calendly.', 'cosmartis' ); ?></p>
			</div>

			<div class="cookie-consent-modal__actions">
				<button type="button" class="btn btn-secondary js-consent-close"><?php esc_html_e( 'Fermer', 'cosmartis' ); ?></button>
				<button type="button" class="btn btn-primary js-consent-save"><?php esc_html_e( 'Enregistrer mes préférences', 'cosmartis' ); ?></button>
			</div>
		</div>
	</div>
</div>
