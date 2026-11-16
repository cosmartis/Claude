<?php
/**
 * Template auto-appliqué à la page de slug "rendez-vous" (hiérarchie de
 * gabarits WordPress : page-{slug}.php). URL finale : /rendez-vous/.
 *
 * Adresse courte à partager (e-mails, réseaux, signatures…) qui affiche
 * directement l'agenda de réservation COSMARTIS_CALENDLY_URL en widget
 * inline, sans questionnaire préalable (contrairement à /contact/).
 * La page est créée automatiquement par cosmartis_ensure_static_pages().
 * Seul l'agenda est affiché : le contenu saisi dans wp-admin est ignoré.
 *
 * Sans consentement aux cookies fonctionnels, le widget tiers n'est pas
 * chargé : le bouton rendu côté serveur ci-dessous reste alors affiché et
 * ouvre l'agenda dans un nouvel onglet (cf. assets/js/rendez-vous.js).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<h1 class="screen-reader-text"><?php esc_html_e( 'Réservez votre diagnostic gratuit', 'cosmartis' ); ?></h1>

<section id="reservation" style="padding-top:32px;">
	<div class="container">
		<div class="calendly-embed-wrap">
			<div
				id="calendly-inline-embed"
				class="rdv-embed"
				data-calendly-url="<?php echo esc_url( COSMARTIS_CALENDLY_URL ); ?>"
			>
				<p class="rdv-embed-fallback">
					<a class="btn btn-primary" href="<?php echo esc_url( COSMARTIS_CALENDLY_URL ); ?>" target="_blank" rel="noopener">
						<?php esc_html_e( 'Voir les créneaux disponibles', 'cosmartis' ); ?>
					</a>
				</p>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
