<?php
/**
 * Grille tarifaire « Tout-en-un » : site internet + automatisation + CRM Notion.
 *
 * Chaque pack coûte au plus le prix du site et de l'automatisation achetés
 * séparément (Lancement = Site Essentiel 1 490 € + Première Automatisation
 * 1 490 € ; Croissance = Site Professionnel 2 790 € + Système Complet
 * 3 900 €, soit 6 690 €) : le CRM Notion est donc inclus sans surcoût. Si
 * l'un de ces prix change, recalculer les packs pour garder cette promesse.
 *
 * Usage : get_template_part( 'template-parts/pricing-grid-packs' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$formules = array(
	array(
		'title'    => __( 'Pack Lancement', 'cosmartis' ),
		'price'    => '2 980 €',
		'unit'     => __( 'paiement unique', 'cosmartis' ),
		'desc'     => __( 'Un site qui capte les demandes, une automatisation qui les traite et un CRM Notion pour ne plus rien perdre.', 'cosmartis' ),
		'features' => array(
			__( 'Site Essentiel (jusqu\'à 5 pages)', 'cosmartis' ),
			__( 'Une automatisation ciblée (ex. formulaire → CRM → relance)', 'cosmartis' ),
			__( 'CRM Notion configuré (contacts, prospects, suivi), inclus sans surcoût', 'cosmartis' ),
			__( 'Formation + documentation, 30 jours de support', 'cosmartis' ),
			__( 'Délai indicatif : 1 à 2 semaines', 'cosmartis' ),
		),
		'cta_label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
	),
	array(
		'title'    => __( 'Pack Croissance', 'cosmartis' ),
		'price'    => '6 490 €',
		'unit'     => __( 'paiement unique', 'cosmartis' ),
		'featured' => true,
		'badge'    => __( 'Le plus complet', 'cosmartis' ),
		'desc'     => __( 'Toute votre acquisition et votre suivi client connectés : du premier clic sur votre site jusqu\'à la facture.', 'cosmartis' ),
		'features' => array(
			__( 'Site Professionnel (jusqu\'à 10 pages + blog, prise de RDV)', 'cosmartis' ),
			__( 'Trois à cinq automatisations connectées entre elles', 'cosmartis' ),
			__( 'CRM Notion complet (pipeline, relances, tableau de bord), inclus sans surcoût', 'cosmartis' ),
			__( '200 € d\'économie par rapport aux offres prises séparément', 'cosmartis' ),
			__( 'Formation de l\'équipe, 60 jours de support', 'cosmartis' ),
			__( 'Délai indicatif : 1 à 2 semaines', 'cosmartis' ),
		),
		'cta_label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
	),
	array(
		'title'    => __( 'Pack Sur-Mesure', 'cosmartis' ),
		'price'    => __( 'Sur devis', 'cosmartis' ),
		'unit'     => __( 'à partir de 9 000 €', 'cosmartis' ),
		'desc'     => __( 'Site sur-mesure, automatisations avancées et CRM adapté à plusieurs équipes ou services : accompagnement dédié.', 'cosmartis' ),
		'features' => array(),
		'cta_label' => __( 'Demander un devis', 'cosmartis' ),
	),
);

$abonnement = array(
	'label' => __( 'Suivi Tout-en-un', 'cosmartis' ),
	'price' => '219 €',
	'unit'  => __( '/ mois, sans engagement', 'cosmartis' ),
	'desc'  => __( 'Hébergement et maintenance du site, maintenance des automatisations et du CRM, petites évolutions, support prioritaire (réponse sous 48h ouvrées).', 'cosmartis' ),
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
	<?php esc_html_e( 'Le Suivi Tout-en-un remplace les abonnements séparés (Suivi & Évolution 199 € + Hébergement & Maintenance 49 €).', 'cosmartis' ); ?>
	<br />
	<?php esc_html_e( 'TVA non applicable, article 293 B du CGI.', 'cosmartis' ); ?>
</p>
