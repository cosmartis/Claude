<?php
/**
 * Grille tarifaire (3 formules + diagnostic gratuit en intro). Montants et
 * formulations conformes aux décisions actées dans le fichier de
 * synchronisation du projet — ne pas modifier ces montants ou ces mentions
 * sans une nouvelle décision explicite qui y est consignée :
 * - Aucune mention « HT »/« TTC » : Cosmartis est en franchise en base de
 *   TVA, les prix affichés sont des prix finaux (mention légale en pied
 *   de grille).
 * - L'abonnement (199 €/mois, sans engagement) ne promet aucun volume
 *   d'heures et apparaît dans les 3 formules, à la demande de Bouchra.
 * - L'offre Sur-Mesure n'affiche jamais de prix fixe.
 * - Aucun TJM interne ne doit apparaître ici (donnée à usage devis uniquement).
 *
 * Usage : get_template_part( 'template-parts/pricing-grid' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$formules = array(
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
		'cta_label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
	),
	array(
		'title'    => __( 'Système Complet', 'cosmartis' ),
		'price'    => '3 900 €',
		'unit'     => __( 'paiement unique', 'cosmartis' ),
		'featured' => true,
		'badge'    => __( 'Recommandé', 'cosmartis' ),
		'desc'     => __( 'Trois à cinq automatisations connectées entre elles pour couvrir l\'ensemble de votre suivi commercial et administratif.', 'cosmartis' ),
		'features' => array(
			__( 'Tableau de bord de suivi', 'cosmartis' ),
			__( 'Formation de l\'équipe + documentation complète', 'cosmartis' ),
			__( '60 jours de support inclus', 'cosmartis' ),
			__( 'Délai indicatif : 3 à 4 semaines', 'cosmartis' ),
		),
		'cta_label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
	),
	array(
		'title'    => __( 'Sur-Mesure / Croissance', 'cosmartis' ),
		'price'    => __( 'Sur devis', 'cosmartis' ),
		'unit'     => __( 'à partir de 6 000 €', 'cosmartis' ),
		'desc'     => __( 'Pour les structures multi-services ou multi-équipes, les besoins spécifiques et les volumes plus importants : accompagnement dédié.', 'cosmartis' ),
		'features' => array(),
		'cta_label' => __( 'Demander un devis', 'cosmartis' ),
	),
);

$abonnement = array(
	'label' => __( 'Abonnement Suivi & Évolution', 'cosmartis' ),
	'price' => '199 €',
	'unit'  => __( '/ mois, sans engagement', 'cosmartis' ),
	'desc'  => __( 'Maintenance corrective, ajustements et petites évolutions, support prioritaire (réponse sous 48h ouvrées). Résiliable à tout moment.', 'cosmartis' ),
);
?>
<p class="pricing-diagnostic">
	<strong><?php esc_html_e( 'Diagnostic gratuit', 'cosmartis' ); ?></strong>
	<?php esc_html_e( '— 30 minutes, sans engagement, avant toute proposition.', 'cosmartis' ); ?>
</p>

<div class="pricing-grid">
	<?php foreach ( $formules as $formule ) : ?>
		<div class="pricing-card<?php echo ! empty( $formule['featured'] ) ? ' pricing-card--featured' : ''; ?>">
			<?php if ( ! empty( $formule['badge'] ) ) : ?>
				<span class="pricing-badge"><?php echo esc_html( $formule['badge'] ); ?></span>
			<?php endif; ?>

			<div class="pricing-card-head">
				<h3><?php echo esc_html( $formule['title'] ); ?></h3>
				<p class="pricing-amount"><?php echo esc_html( $formule['price'] ); ?></p>
				<p class="pricing-unit text-muted"><?php echo esc_html( $formule['unit'] ); ?></p>
			</div>

			<p class="text-muted pricing-desc"><?php echo esc_html( $formule['desc'] ); ?></p>

			<?php if ( ! empty( $formule['features'] ) ) : ?>
				<ul class="pricing-features">
					<?php foreach ( $formule['features'] as $feature ) : ?>
						<li><?php echo esc_html( $feature ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<div class="pricing-addon">
				<span class="pricing-addon-plus">+</span>
				<div class="pricing-addon-body">
					<div class="pricing-addon-head">
						<span class="pricing-addon-label"><?php echo esc_html( $abonnement['label'] ); ?></span>
						<span class="pricing-addon-price">
							<?php echo esc_html( $abonnement['price'] ); ?>
							<span class="text-muted"><?php echo esc_html( $abonnement['unit'] ); ?></span>
						</span>
					</div>
					<p class="text-muted"><?php echo esc_html( $abonnement['desc'] ); ?></p>
				</div>
			</div>

			<?php
			get_template_part(
				'template-parts/calendly-cta',
				null,
				array(
					'label' => $formule['cta_label'],
					'style' => 'primary',
				)
			);
			?>
		</div>
	<?php endforeach; ?>
</div>

<p class="pricing-footnote">
	<?php esc_html_e( 'L\'abonnement Suivi & Évolution peut aussi être souscrit seul, sans automatisation initiale.', 'cosmartis' ); ?>
	<br />
	<?php esc_html_e( 'TVA non applicable, article 293 B du CGI.', 'cosmartis' ); ?>
</p>
