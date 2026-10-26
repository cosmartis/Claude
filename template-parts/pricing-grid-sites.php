<?php
/**
 * Grille tarifaire « Création de site internet ».
 *
 * Positionnement fixé d'après les prix du marché 2026 pour un site vitrine
 * de TPE (fourchette freelance ~800–3 000 € pour 5 à 10 pages, médiane des
 * projets réels ~3 500 €). Mêmes règles que la grille automatisation :
 * prix finaux (franchise en base de TVA), pas de prix fixe sur le Sur-Mesure.
 *
 * Usage : get_template_part( 'template-parts/pricing-grid-sites' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$formules = array(
	array(
		'title'    => __( 'Site Essentiel', 'cosmartis' ),
		'price'    => '1 490 €',
		'unit'     => __( 'paiement unique', 'cosmartis' ),
		'desc'     => __( 'Un site vitrine clair et rapide pour être trouvé et contacté : l\'essentiel pour démarrer en ligne.', 'cosmartis' ),
		'features' => array(
			__( 'Jusqu\'à 5 pages (accueil, services, à propos, contact, mentions légales)', 'cosmartis' ),
			__( 'Design personnalisé, adapté mobile', 'cosmartis' ),
			__( 'Formulaire de contact + bases du référencement (SEO)', 'cosmartis' ),
			__( '30 jours de support inclus après mise en ligne', 'cosmartis' ),
			__( 'Délai indicatif : 2 à 3 semaines', 'cosmartis' ),
		),
		'cta_label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
	),
	array(
		'title'    => __( 'Site Professionnel', 'cosmartis' ),
		'price'    => '2 790 €',
		'unit'     => __( 'paiement unique', 'cosmartis' ),
		'featured' => true,
		'badge'    => __( 'Recommandé', 'cosmartis' ),
		'desc'     => __( 'Un site pensé pour générer des demandes : contenu structuré, prise de rendez-vous intégrée et blog pour le référencement.', 'cosmartis' ),
		'features' => array(
			__( 'Jusqu\'à 10 pages + blog', 'cosmartis' ),
			__( 'Prise de rendez-vous en ligne intégrée', 'cosmartis' ),
			__( 'Optimisation SEO et performances (Core Web Vitals)', 'cosmartis' ),
			__( 'Formation à la mise à jour du contenu', 'cosmartis' ),
			__( '60 jours de support inclus', 'cosmartis' ),
			__( 'Délai indicatif : 3 à 5 semaines', 'cosmartis' ),
		),
		'cta_label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
	),
	array(
		'title'    => __( 'Site Sur-Mesure', 'cosmartis' ),
		'price'    => __( 'Sur devis', 'cosmartis' ),
		'unit'     => __( 'à partir de 5 000 €', 'cosmartis' ),
		'desc'     => __( 'Pour les projets plus ambitieux : boutique en ligne, espace client, multilingue ou fonctionnalités spécifiques.', 'cosmartis' ),
		'features' => array(),
		'cta_label' => __( 'Demander un devis', 'cosmartis' ),
	),
);

$abonnement = array(
	'label' => __( 'Hébergement & Maintenance', 'cosmartis' ),
	'price' => '49 €',
	'unit'  => __( '/ mois, sans engagement', 'cosmartis' ),
	'desc'  => __( 'Hébergement, nom de domaine, sauvegardes, mises à jour de sécurité et petites modifications de contenu. Résiliable à tout moment.', 'cosmartis' ),
);

get_template_part(
	'template-parts/pricing-cards',
	null,
	array(
		'formules'   => $formules,
		'abonnement' => $abonnement,
	)
);
?>

<p class="pricing-footnote">
	<?php esc_html_e( 'Le site vous appartient : code, contenus et nom de domaine sont à votre nom.', 'cosmartis' ); ?>
	<br />
	<?php esc_html_e( 'TVA non applicable, article 293 B du CGI.', 'cosmartis' ); ?>
</p>
