<?php
/**
 * Template auto-appliqué à la page de slug "politique-de-confidentialite"
 * (hiérarchie de gabarits WordPress : page-{slug}.php).
 *
 * Affiche le contenu existant de la page (wp-admin) puis ajoute, codée en
 * dur, la section sur l'assistant virtuel du site (demandée en mise à jour
 * 33 de cosmartis-sync.md, texte à valider par Hamid). Le widget de chat
 * pointe vers l'ancre #assistant-virtuel.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="hero" style="padding-top:56px;padding-bottom:32px;">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<section>
		<div class="container" style="max-width:760px;">
			<div class="entry-content legal-content">
				<?php the_content(); ?>

				<h2 id="pixel-meta"><?php esc_html_e( 'Cookies publicitaires (Pixel Meta)', 'cosmartis' ); ?></h2>
				<p>
					<?php esc_html_e( 'Uniquement si vous l\'acceptez (bouton « Accepter » ou case « Cookies publicitaires (Meta) »), ce site charge le Pixel de Meta Platforms Ireland Ltd (Facebook, Instagram). Il sert à mesurer l\'efficacité de nos publicités sur ces réseaux.', 'cosmartis' ); ?>
				</p>
				<ul>
					<li><?php esc_html_e( 'Données transmises à Meta : pages consultées, envoi du formulaire de contact, prise de rendez-vous, ainsi que des informations techniques (adresse IP, navigateur, identifiant de cookie _fbp).', 'cosmartis' ); ?></li>
					<li><?php esc_html_e( 'Base légale : votre consentement. Sans lui, aucune donnée n\'est envoyée à Meta.', 'cosmartis' ); ?></li>
					<li><?php esc_html_e( 'Durée : le cookie _fbp est conservé au maximum 90 jours ; votre choix de consentement est conservé 6 mois.', 'cosmartis' ); ?></li>
					<li><?php esc_html_e( 'Meta peut transférer ces données hors de l\'Union européenne, dans le cadre du Data Privacy Framework UE–États-Unis.', 'cosmartis' ); ?></li>
					<li><?php esc_html_e( 'Vous pouvez retirer votre consentement à tout moment via le lien « Gérer les cookies » en bas de chaque page.', 'cosmartis' ); ?></li>
				</ul>

				<h2 id="assistant-virtuel"><?php esc_html_e( 'Assistant virtuel (IA)', 'cosmartis' ); ?></h2>
				<p>
					<?php esc_html_e( 'Ce site propose un assistant virtuel, accessible depuis l\'icône de discussion en bas à droite de l\'écran, qui répond aux questions sur les offres de Cosmartis. Ses réponses sont générées automatiquement par un modèle d\'intelligence artificielle.', 'cosmartis' ); ?>
				</p>
				<ul>
					<li><?php esc_html_e( 'Les messages que vous saisissez sont transmis à un fournisseur d\'intelligence artificielle, uniquement pour produire la réponse.', 'cosmartis' ); ?></li>
					<li><?php esc_html_e( 'Aucune conversation n\'est conservée par Cosmartis : l\'historique reste dans votre navigateur et disparaît à la fermeture de l\'onglet.', 'cosmartis' ); ?></li>
					<li><?php esc_html_e( 'Merci de ne saisir aucune donnée personnelle ou sensible (coordonnées, informations de santé, données bancaires, identifiants...).', 'cosmartis' ); ?></li>
					<li><?php esc_html_e( 'Les réponses de l\'assistant sont indicatives et ne constituent pas un engagement contractuel. Pour un échange personnalisé, réservez un diagnostic gratuit ou écrivez à contact@cosmartis.com.', 'cosmartis' ); ?></li>
				</ul>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
