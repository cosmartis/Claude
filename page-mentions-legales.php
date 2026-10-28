<?php
/**
 * Template auto-appliqué à la page de slug "mentions-legales" (hiérarchie de
 * gabarits WordPress : page-{slug}.php).
 *
 * Mentions codées en dur avec les informations fournies par Hamid DIBARH
 * (remplacent l'ancien contenu wp-admin : numéro RCS factice et statut SASU
 * erronés). Toute modification doit être signalée dans cosmartis-sync.md
 * pour que la base de connaissance de l'assistant du site soit mise à jour.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'Informations légales', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Mentions légales', 'cosmartis' ); ?></h1>
	</div>
</section>

<section>
	<div class="container" style="max-width:760px;">
		<div class="entry-content legal-content">
			<h2><?php esc_html_e( 'Éditeur du site', 'cosmartis' ); ?></h2>
			<figure class="legal-editor-photo">
				<picture>
					<source srcset="<?php echo esc_url( COSMARTIS_URI . '/assets/img/hamid-dibarh.webp' ); ?>" type="image/webp" />
					<img
						src="<?php echo esc_url( COSMARTIS_URI . '/assets/img/hamid-dibarh.jpg' ); ?>"
						alt="<?php esc_attr_e( 'Hamid DIBARH, fondateur de Cosmartis', 'cosmartis' ); ?>"
						width="800"
						height="922"
						loading="lazy"
					/>
				</picture>
				<figcaption>
					<strong>Hamid DIBARH</strong>
					<span class="text-muted"><?php esc_html_e( 'Fondateur de Cosmartis', 'cosmartis' ); ?></span>
				</figcaption>
			</figure>
			<p>
				<?php esc_html_e( 'Le site cosmartis.com est édité par Hamid DIBARH, entrepreneur individuel exerçant sous le nom commercial COSMARTIS.', 'cosmartis' ); ?>
			</p>
			<ul>
				<li><strong><?php esc_html_e( 'Adresse :', 'cosmartis' ); ?></strong> 21 rue Taffin, 59970 Fresnes-sur-Escaut, France</li>
				<li><strong><?php esc_html_e( 'SIRET :', 'cosmartis' ); ?></strong> 802 301 317 00029</li>
				<li><strong><?php esc_html_e( 'E-mail :', 'cosmartis' ); ?></strong> <a href="mailto:h.dibarh@cosmartis.com">h.dibarh@cosmartis.com</a></li>
				<li><strong><?php esc_html_e( 'TVA :', 'cosmartis' ); ?></strong> <?php esc_html_e( 'TVA non applicable, article 293 B du CGI', 'cosmartis' ); ?></li>
			</ul>

			<h2><?php esc_html_e( 'Directeur de la publication', 'cosmartis' ); ?></h2>
			<p>Hamid DIBARH</p>

			<h2><?php esc_html_e( 'Hébergement', 'cosmartis' ); ?></h2>
			<p>
				Hostinger International Ltd<br />
				61 Lordou Vironos Street, 6023 Larnaca, Chypre<br />
				<a href="https://www.hostinger.fr" rel="noopener" target="_blank">www.hostinger.fr</a>
			</p>

			<h2><?php esc_html_e( 'Propriété intellectuelle', 'cosmartis' ); ?></h2>
			<p>
				<?php esc_html_e( 'L\'ensemble des contenus de ce site (textes, visuels, logo, photographies, structure) est la propriété exclusive de Hamid DIBARH – COSMARTIS, sauf mention contraire. Toute reproduction, représentation ou diffusion, totale ou partielle, sans autorisation écrite préalable est interdite.', 'cosmartis' ); ?>
			</p>

			<h2><?php esc_html_e( 'Données personnelles et cookies', 'cosmartis' ); ?></h2>
			<p>
				<?php
				printf(
					/* translators: %s: lien vers la politique de confidentialité */
					esc_html__( 'Le traitement des données personnelles collectées sur ce site (formulaire de contact, prise de rendez-vous, assistant virtuel) et l\'usage des cookies sont décrits dans notre %s. Pour exercer vos droits (accès, rectification, effacement, opposition), écrivez à h.dibarh@cosmartis.com.', 'cosmartis' ),
					'<a href="' . esc_url( home_url( '/politique-de-confidentialite/' ) ) . '">' . esc_html__( 'politique de confidentialité', 'cosmartis' ) . '</a>'
				);
				?>
			</p>

			<h2><?php esc_html_e( 'Responsabilité', 'cosmartis' ); ?></h2>
			<p>
				<?php esc_html_e( 'Les informations publiées sur ce site sont fournies à titre indicatif et peuvent être modifiées à tout moment. Les réponses de l\'assistant virtuel sont générées automatiquement et ne constituent pas un engagement contractuel : seuls les devis et propositions écrites font foi.', 'cosmartis' ); ?>
			</p>

			<h2><?php esc_html_e( 'Droit applicable', 'cosmartis' ); ?></h2>
			<p>
				<?php esc_html_e( 'Le présent site et ses mentions légales sont soumis au droit français.', 'cosmartis' ); ?>
			</p>
		</div>
	</div>
</section>

<?php
get_footer();
