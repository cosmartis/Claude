<?php
/**
 * Template auto-appliqué à la page de slug "rendez-vous" (hiérarchie de
 * gabarits WordPress : page-{slug}.php). URL finale : /rendez-vous/.
 *
 * Adresse courte à partager (e-mails, réseaux, signatures…) qui affiche
 * directement l'agenda de réservation COSMARTIS_CALENDLY_URL en widget
 * inline, sans questionnaire préalable (contrairement à /contact/).
 * La page est créée automatiquement par cosmartis_ensure_static_pages().
 * Le contenu éventuellement saisi dans wp-admin (titre, image…) est affiché
 * au-dessus de l'agenda.
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

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'Rendez-vous', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Réservez votre diagnostic gratuit', 'cosmartis' ); ?></h1>
		<p class="lede"><?php esc_html_e( '30 minutes pour faire le point sur votre activité et identifier ce qui peut être automatisé. Choisissez votre créneau ci-dessous.', 'cosmartis' ); ?></p>
	</div>
</section>

<?php
// Contenu saisi dans wp-admin (titre, visuel…) conservé au-dessus de l'agenda.
while ( have_posts() ) :
	the_post();
	if ( '' !== trim( get_the_content() ) ) :
		?>
		<section style="padding-top:0;padding-bottom:24px;">
			<div class="container" style="max-width:760px;">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
		<?php
	endif;
endwhile;
?>

<section id="reservation" style="padding-top:0;">
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
