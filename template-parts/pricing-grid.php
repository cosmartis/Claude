<?php
/**
 * Grille tarifaire (5 offres). Montants et formulations conformes aux
 * décisions actées dans le fichier de synchronisation du projet — ne pas
 * modifier ces montants ou ces mentions sans une nouvelle décision explicite
 * qui y est consignée :
 * - Aucune mention « HT »/« TTC » : Cosmartis est en franchise en base de
 *   TVA, les prix affichés sont des prix finaux (mention légale en pied
 *   de grille).
 * - L'abonnement ne promet aucun volume d'heures.
 * - L'offre Sur-Mesure n'affiche jamais de prix fixe.
 * - Aucun TJM interne ne doit apparaître ici (donnée à usage devis uniquement).
 *
 * Usage : get_template_part( 'template-parts/pricing-grid' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$offers = array(
	array(
		'title'    => __( 'Diagnostic', 'cosmartis' ),
		'price'    => __( 'Gratuit', 'cosmartis' ),
		'unit'     => __( '30 minutes', 'cosmartis' ),
		'desc'     => __( 'Un échange pour comprendre vos process actuels et vos points de friction, sans engagement.', 'cosmartis' ),
		'features' => array(),
		'cta'      => 'calendly',
	),
	array(
		'title'    => __( 'Première Automatisation', 'cosmartis' ),
		'price'    => '1 490 €',
		'unit'     => __( 'paiement unique', 'cosmartis' ),
		'desc'     => __( 'Une automatisation ciblée reliée aux outils existants du client (ex. prise de rendez-vous, relance clients, facturation, qualification de leads).', 'cosmartis' ),
		'features' => array(
			__( 'Formation à l\'usage + documentation', 'cosmartis' ),
			__( '30 jours de support inclus après mise en service', 'cosmartis' ),
			__( 'Délai indicatif : 1 à 2 semaines', 'cosmartis' ),
		),
		'cta'      => 'calendly',
	),
	array(
		'title'     => __( 'Système Complet', 'cosmartis' ),
		'price'     => '3 900 €',
		'unit'      => __( 'paiement unique', 'cosmartis' ),
		'featured'  => true,
		'badge'     => __( 'Recommandé', 'cosmartis' ),
		'desc'      => __( 'Trois à cinq automatisations connectées entre elles pour couvrir l\'ensemble de votre suivi commercial et administratif.', 'cosmartis' ),
		'features'  => array(
			__( 'Tableau de bord de suivi', 'cosmartis' ),
			__( 'Formation de l\'équipe + documentation complète', 'cosmartis' ),
			__( '60 jours de support inclus', 'cosmartis' ),
			__( 'Délai indicatif : 3 à 4 semaines', 'cosmartis' ),
		),
		'cta'       => 'calendly',
	),
	array(
		'title'    => __( 'Suivi & Évolution', 'cosmartis' ),
		'price'    => '199 €',
		'unit'     => __( 'par mois, sans engagement', 'cosmartis' ),
		'desc'     => __( 'Abonnement résiliable à tout moment : maintenance corrective, ajustements et petites évolutions.', 'cosmartis' ),
		'features' => array(
			__( 'Support prioritaire (réponse sous 48h ouvrées)', 'cosmartis' ),
			__( 'Peut être souscrit seul ou à la suite d\'une des offres ci-dessus', 'cosmartis' ),
		),
		'cta'      => 'calendly',
	),
	array(
		'title'    => __( 'Sur-Mesure / Croissance', 'cosmartis' ),
		'price'    => __( 'Sur devis', 'cosmartis' ),
		'unit'     => __( 'à partir de 6 000 €', 'cosmartis' ),
		'desc'     => __( 'Pour les structures multi-services ou multi-équipes, les besoins spécifiques et les volumes plus importants : accompagnement dédié.', 'cosmartis' ),
		'features' => array(),
		'cta'      => 'calendly',
		'cta_label' => __( 'Demander un devis', 'cosmartis' ),
	),
);
?>
<div class="pricing-grid">
	<?php foreach ( $offers as $offer ) : ?>
		<div class="pricing-card<?php echo ! empty( $offer['featured'] ) ? ' pricing-card--featured' : ''; ?>">
			<?php if ( ! empty( $offer['badge'] ) ) : ?>
				<span class="pricing-badge"><?php echo esc_html( $offer['badge'] ); ?></span>
			<?php endif; ?>
			<h3><?php echo esc_html( $offer['title'] ); ?></h3>
			<p class="pricing-amount"><?php echo esc_html( $offer['price'] ); ?></p>
			<p class="pricing-unit text-muted"><?php echo esc_html( $offer['unit'] ); ?></p>
			<p class="text-muted"><?php echo esc_html( $offer['desc'] ); ?></p>
			<?php if ( ! empty( $offer['features'] ) ) : ?>
				<ul class="pricing-features">
					<?php foreach ( $offer['features'] as $feature ) : ?>
						<li><?php echo esc_html( $feature ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<?php
			get_template_part(
				'template-parts/calendly-cta',
				null,
				array(
					'label' => isset( $offer['cta_label'] ) ? $offer['cta_label'] : __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
					'style' => ! empty( $offer['featured'] ) ? 'primary' : 'secondary',
				)
			);
			?>
		</div>
	<?php endforeach; ?>
</div>
<p class="pricing-footnote"><?php esc_html_e( 'TVA non applicable, article 293 B du CGI.', 'cosmartis' ); ?></p>
