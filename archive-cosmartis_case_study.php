<?php
/**
 * Archive des études de cas (/etudes-de-cas/).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'Études de cas', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Client → Problème → Solution → Résultat', 'cosmartis' ); ?></h1>
	</div>
</section>

<section>
	<div class="container">
		<?php get_template_part( 'template-parts/case-studies-grid' ); ?>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2><?php esc_html_e( 'Votre situation ressemble à l\'un de ces cas ?', 'cosmartis' ); ?></h2>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ), 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
