<?php
/**
 * Template auto-appliqué à la page de slug "contact" (hiérarchie de gabarits
 * WordPress : page-{slug}.php). Créer la page dans wp-admin avec ce slug
 * (URL finale : /contact/).
 *
 * Contact / Réservation : questionnaire de qualification → score → CRM
 * (via webhook configurable) → widget Calendly inline intégré (pas un
 * simple lien). Le formulaire et l'intégration Calendly restent toujours
 * actifs, quel que soit le contenu de la page — c'est le canal principal
 * de génération de leads du site, il ne doit jamais pouvoir disparaître
 * par une simple édition de contenu. Seule l'introduction ci-dessous
 * (titre + texte) est modifiable depuis wp-admin : si du contenu est ajouté
 * dans l'éditeur de cette page, il remplace le titre et le texte par défaut.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( have_posts() ) {
	the_post();
}
$cosmartis_page_content = trim( (string) get_the_content() );
?>

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<?php if ( '' !== $cosmartis_page_content ) : ?>
			<span class="eyebrow"><?php esc_html_e( 'Contact / Réservation', 'cosmartis' ); ?></span>
			<div class="entry-content cosmartis-editable"><?php the_content(); ?></div>
		<?php else : ?>
			<span class="eyebrow"><?php esc_html_e( 'Contact / Réservation', 'cosmartis' ); ?></span>
			<h1><?php esc_html_e( 'Réservez votre diagnostic gratuit', 'cosmartis' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Deux minutes de questions pour qu\'on prépare un diagnostic pertinent, puis choisissez votre créneau directement ci-dessous.', 'cosmartis' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<section>
	<div class="container">
		<form id="qual-form" class="qual-form" novalidate>
			<div class="progress"><div class="progress-bar" style="width:33%;"></div></div>

			<fieldset class="active" data-step="1">
				<legend><?php esc_html_e( 'Vous', 'cosmartis' ); ?></legend>
				<label for="qf-prenom">
					<?php esc_html_e( 'Prénom', 'cosmartis' ); ?>
					<input type="text" id="qf-prenom" name="prenom" required />
				</label>
				<label for="qf-email">
					<?php esc_html_e( 'E-mail', 'cosmartis' ); ?>
					<input type="email" id="qf-email" name="email" required />
				</label>
				<label for="qf-telephone">
					<?php esc_html_e( 'Téléphone (optionnel)', 'cosmartis' ); ?>
					<input type="tel" id="qf-telephone" name="telephone" />
				</label>
			</fieldset>

			<fieldset data-step="2">
				<legend><?php esc_html_e( 'Votre activité', 'cosmartis' ); ?></legend>
				<label>
					<?php esc_html_e( 'Quel type de structure ?', 'cosmartis' ); ?>
					<span class="choice-group" data-score-field="structure">
						<label><input type="radio" name="structure" value="independant" data-score="2" /> <?php esc_html_e( 'Indépendant', 'cosmartis' ); ?></label>
						<label><input type="radio" name="structure" value="tpe_pme" data-score="3" /> <?php esc_html_e( 'TPE / PME', 'cosmartis' ); ?></label>
						<label><input type="radio" name="structure" value="commercant" data-score="2" /> <?php esc_html_e( 'Commerçant', 'cosmartis' ); ?></label>
						<label><input type="radio" name="structure" value="autre" data-score="1" /> <?php esc_html_e( 'Autre', 'cosmartis' ); ?></label>
					</span>
				</label>
				<label>
					<?php esc_html_e( 'Quel est votre principal point de friction ?', 'cosmartis' ); ?>
					<span class="choice-group" data-score-field="friction">
						<label><input type="radio" name="friction" value="prospects_non_suivis" data-score="3" /> <?php esc_html_e( 'Prospects non suivis', 'cosmartis' ); ?></label>
						<label><input type="radio" name="friction" value="taches_repetitives" data-score="2" /> <?php esc_html_e( 'Tâches répétitives', 'cosmartis' ); ?></label>
						<label><input type="radio" name="friction" value="outils_deconnectes" data-score="2" /> <?php esc_html_e( 'Outils déconnectés', 'cosmartis' ); ?></label>
						<label><input type="radio" name="friction" value="rdv_manuels" data-score="2" /> <?php esc_html_e( 'Rendez-vous gérés manuellement', 'cosmartis' ); ?></label>
					</span>
				</label>
			</fieldset>

			<fieldset data-step="3">
				<legend><?php esc_html_e( 'Votre projet', 'cosmartis' ); ?></legend>
				<label>
					<?php esc_html_e( 'Sous quel délai souhaitez-vous avancer ?', 'cosmartis' ); ?>
					<span class="choice-group" data-score-field="delai">
						<label><input type="radio" name="delai" value="immediat" data-score="3" /> <?php esc_html_e( 'Le plus vite possible', 'cosmartis' ); ?></label>
						<label><input type="radio" name="delai" value="1_3_mois" data-score="2" /> <?php esc_html_e( 'Dans 1 à 3 mois', 'cosmartis' ); ?></label>
						<label><input type="radio" name="delai" value="exploration" data-score="1" /> <?php esc_html_e( 'Je me renseigne pour l\'instant', 'cosmartis' ); ?></label>
					</span>
				</label>
				<p class="form-error" id="qf-error"><?php esc_html_e( 'Merci de compléter les champs requis.', 'cosmartis' ); ?></p>
			</fieldset>

			<div class="form-success" id="qf-success">
				<h3><?php esc_html_e( 'Merci !', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Choisissez maintenant votre créneau ci-dessous.', 'cosmartis' ); ?></p>
			</div>

			<div class="form-nav">
				<button type="button" class="btn btn-secondary" id="qf-prev" hidden><?php esc_html_e( 'Précédent', 'cosmartis' ); ?></button>
				<button type="button" class="btn btn-primary" id="qf-next"><?php esc_html_e( 'Suivant', 'cosmartis' ); ?></button>
				<button type="submit" class="btn btn-primary" id="qf-submit" hidden><?php esc_html_e( 'Voir les créneaux disponibles', 'cosmartis' ); ?></button>
			</div>
		</form>
	</div>
</section>

<section id="reservation">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Dernière étape', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Choisissez votre créneau', 'cosmartis' ); ?></h2>
		</div>
		<div class="calendly-embed-wrap">
			<div
				id="calendly-inline-embed"
				data-calendly-url="<?php echo esc_url( COSMARTIS_CALENDLY_URL ); ?>"
			></div>
		</div>
	</div>
</section>

<?php
get_footer();
