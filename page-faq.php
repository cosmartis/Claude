<?php
/**
 * Template auto-appliqué à la page de slug "faq" (hiérarchie de gabarits
 * WordPress : page-{slug}.php).
 *
 * Liste de questions codée en dur, volontairement non modifiable depuis
 * wp-admin — toute évolution passe par une demande directe à Claude Code.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'FAQ', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Questions fréquentes', 'cosmartis' ); ?></h1>
	</div>
</section>

<section>
	<div class="container" style="max-width:760px;">
		<?php get_template_part( 'template-parts/faq-list' ); ?>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2><?php esc_html_e( 'Une autre question ? Parlons-en directement.', 'cosmartis' ); ?></h2>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ), 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
