<?php
/**
 * Shortcodes exposant les blocs fonctionnels du thème (tarifs, FAQ, CTA
 * Calendly, études de cas) à l'éditeur de blocs (bloc "Shortcode") et à un
 * constructeur de page comme Elementor (widget "Shortcode").
 *
 * But : permettre à Bouchra de composer librement ses pages depuis
 * l'interface WordPress sans dupliquer le contenu (tarifs, FAQ...) qui doit
 * rester une source unique définie dans les template-parts correspondantes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_shortcode_tarifs() {
	ob_start();
	get_template_part( 'template-parts/pricing-grid' );
	return ob_get_clean();
}
add_shortcode( 'cosmartis_tarifs', 'cosmartis_shortcode_tarifs' );

function cosmartis_shortcode_faq( $atts ) {
	$atts = shortcode_atts( array( 'limit' => 0 ), $atts, 'cosmartis_faq' );
	ob_start();
	get_template_part( 'template-parts/faq-list', null, array( 'limit' => absint( $atts['limit'] ) ) );
	return ob_get_clean();
}
add_shortcode( 'cosmartis_faq', 'cosmartis_shortcode_faq' );

function cosmartis_shortcode_etudes_de_cas( $atts ) {
	$atts = shortcode_atts( array( 'limit' => -1 ), $atts, 'cosmartis_etudes_de_cas' );
	ob_start();
	get_template_part( 'template-parts/case-studies-grid', null, array( 'limit' => (int) $atts['limit'] ) );
	return ob_get_clean();
}
add_shortcode( 'cosmartis_etudes_de_cas', 'cosmartis_shortcode_etudes_de_cas' );

function cosmartis_shortcode_calendly( $atts ) {
	$atts = shortcode_atts(
		array(
			'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ),
			'style' => 'primary',
		),
		$atts,
		'cosmartis_calendly'
	);
	ob_start();
	get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $atts['label'], 'style' => $atts['style'] ) );
	return ob_get_clean();
}
add_shortcode( 'cosmartis_calendly', 'cosmartis_shortcode_calendly' );
