<?php
/**
 * Rendu d'une grille de cartes tarifaires.
 *
 * Usage : get_template_part( 'template-parts/pricing-cards', null, array(
 *     'formules'   => array( ... ), // title, price, unit, desc, features, cta_label, featured?, badge?
 *     'abonnement' => array( ... ), // optionnel : label, price, unit, desc
 * ) );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$formules   = isset( $args['formules'] ) ? $args['formules'] : array();
$abonnement = isset( $args['abonnement'] ) ? $args['abonnement'] : null;
?>
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

			<?php if ( $abonnement ) : ?>
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
			<?php endif; ?>

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
