<?php
/**
 * Reusable FAQ list with schema.org FAQPage markup.
 *
 * Usage: get_template_part( 'template-parts/faq-list', null, array( 'limit' => 6 ) );
 * Sans "limit", les 9 questions du cahier des charges sont affichées (page FAQ dédiée).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_faq_items() {
	return array(
		array(
			'q' => __( 'Combien coûte une automatisation avec Cosmartis ?', 'cosmartis' ),
			'a' => __( 'Le tarif dépend du nombre de process à automatiser. Le diagnostic gratuit de 30 minutes permet d\'obtenir un chiffrage précis, sans engagement.', 'cosmartis' ),
		),
		array(
			'q' => __( 'Mes données sont-elles en sécurité ?', 'cosmartis' ),
			'a' => __( 'Oui : hébergement en UE, sauvegardes automatisées, et conformité RGPD sur l\'ensemble des outils utilisés (CRM, emailing, prise de rendez-vous).', 'cosmartis' ),
		),
		array(
			'q' => __( 'Est-ce compatible avec mes outils actuels ?', 'cosmartis' ),
			'a' => __( 'Dans la grande majorité des cas, oui. On s\'appuie sur des outils d\'automatisation professionnels qui se connectent à des centaines de logiciels (CRM, emailing, agenda, facturation...).', 'cosmartis' ),
		),
		array(
			'q' => __( 'Combien de temps avant d\'avoir un résultat concret ?', 'cosmartis' ),
			'a' => __( 'La plupart des premières automatisations sont livrées en 2 à 4 semaines après le diagnostic.', 'cosmartis' ),
		),
		array(
			'q' => __( 'Je ne suis pas du tout technique, est-ce un problème ?', 'cosmartis' ),
			'a' => __( 'Non. On construit, on teste, on forme — vous n\'avez rien à configurer vous-même.', 'cosmartis' ),
		),
		array(
			'q' => __( 'Que se passe-t-il après la livraison ?', 'cosmartis' ),
			'a' => __( 'Un suivi est prévu pour ajuster les automatisations dans le temps, à mesure que votre activité évolue.', 'cosmartis' ),
		),
		array(
			'q' => __( 'Travaillez-vous avec les indépendants et les petites structures ?', 'cosmartis' ),
			'a' => __( 'Oui, c\'est le cœur de notre activité : indépendants, TPE/PME, commerçants, coachs et consultants, thérapeutes.', 'cosmartis' ),
		),
		array(
			'q' => __( 'Puis-je annuler ou modifier mon rendez-vous de diagnostic ?', 'cosmartis' ),
			'a' => __( 'Oui, directement depuis l\'e-mail de confirmation envoyé après la réservation.', 'cosmartis' ),
		),
		array(
			'q' => __( 'Proposez-vous un accompagnement en dehors de la France ?', 'cosmartis' ),
			'a' => __( 'Oui : Belgique francophone, Suisse romande et Luxembourg, en plus de la France.', 'cosmartis' ),
		),
	);
}

$faq_items = cosmartis_faq_items();
if ( isset( $args['limit'] ) && absint( $args['limit'] ) > 0 ) {
	$faq_items = array_slice( $faq_items, 0, absint( $args['limit'] ) );
}
?>
<div itemscope itemtype="https://schema.org/FAQPage">
	<?php foreach ( $faq_items as $item ) : ?>
		<details class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<summary itemprop="name"><?php echo esc_html( $item['q'] ); ?></summary>
			<div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
				<p itemprop="text"><?php echo esc_html( $item['a'] ); ?></p>
			</div>
		</details>
	<?php endforeach; ?>
</div>
