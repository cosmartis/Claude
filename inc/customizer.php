<?php
/**
 * Customizer settings for values that change often and shouldn't require touching code:
 * n8n webhook URL, prix d'entrée indicatif.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'cosmartis_integrations',
		array(
			'title'    => __( 'Cosmartis — Intégrations & offre', 'cosmartis' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'cosmartis_n8n_webhook_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'cosmartis_n8n_webhook_url',
		array(
			'section'     => 'cosmartis_integrations',
			'label'       => __( 'URL webhook n8n (formulaire de qualification → CRM Notion)', 'cosmartis' ),
			'description' => __( 'Laisser vide tant que Bouchra n\'a pas fourni le workflow n8n : les prospects sont alors conservés dans "Prospects (non relayés)" et un e-mail de secours est envoyé.', 'cosmartis' ),
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'cosmartis_prix_indicatif',
		array(
			'default'           => __( 'À partir de 490 € / mois', 'cosmartis' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'cosmartis_prix_indicatif',
		array(
			'section'     => 'cosmartis_integrations',
			'label'       => __( "Prix d'entrée indicatif (affiché dans le hero)", 'cosmartis' ),
			'description' => __( 'Valeur temporaire — à remplacer par le tarif réel de Bouchra.', 'cosmartis' ),
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'cosmartis_customize_register' );
