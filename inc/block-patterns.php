<?php
/**
 * Compositions de blocs ("Cosmartis") pour composer une page depuis
 * l'éditeur WordPress (Gutenberg) sans écrire de code : chaque pattern
 * insère un point de départ éditable, avec le CTA/les tarifs/la FAQ reliés
 * aux shortcodes du thème (inc/shortcodes.php) pour rester à jour.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_register_block_pattern_category() {
	register_block_pattern_category(
		'cosmartis',
		array( 'label' => __( 'Cosmartis', 'cosmartis' ) )
	);
}
add_action( 'init', 'cosmartis_register_block_pattern_category' );

function cosmartis_register_block_patterns() {
	register_block_pattern(
		'cosmartis/hero',
		array(
			'title'      => __( 'Cosmartis : en-tête d\'accueil', 'cosmartis' ),
			'categories' => array( 'cosmartis' ),
			'content'    =>
				'<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->' .
				'<div class="wp-block-group alignwide">' .
				'<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.08em"}},"textColor":"accent","fontSize":"small"} -->' .
				'<p class="has-text-align-center has-accent-color has-text-color has-small-font-size">' . esc_html__( 'Automatisation pour indépendants & TPE/PME', 'cosmartis' ) . '</p>' .
				'<!-- /wp:paragraph -->' .
				'<!-- wp:heading {"textAlign":"center","level":1} -->' .
				'<h1 class="wp-block-heading has-text-align-center">' . esc_html__( 'Un titre qui décrit le résultat obtenu pour vos clients', 'cosmartis' ) . '</h1>' .
				'<!-- /wp:heading -->' .
				'<!-- wp:paragraph {"align":"center"} -->' .
				'<p class="has-text-align-center">' . esc_html__( 'Une ou deux phrases expliquant ce que vous automatisez et pour qui.', 'cosmartis' ) . '</p>' .
				'<!-- /wp:paragraph -->' .
				'<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->' .
				'<div class="wp-block-buttons">' .
				'<!-- wp:button {"className":"is-style-calendly-popup"} -->' .
				'<div class="wp-block-button is-style-calendly-popup"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__( 'Réserver mon diagnostic gratuit', 'cosmartis' ) . '</a></div>' .
				'<!-- /wp:button -->' .
				'</div>' .
				'<!-- /wp:buttons -->' .
				'</div>' .
				'<!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'cosmartis/tarifs',
		array(
			'title'      => __( 'Cosmartis : section tarifs', 'cosmartis' ),
			'categories' => array( 'cosmartis' ),
			'content'    =>
				'<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->' .
				'<div class="wp-block-group alignwide">' .
				'<!-- wp:heading {"textAlign":"center"} -->' .
				'<h2 class="wp-block-heading has-text-align-center">' . esc_html__( 'Tarifs', 'cosmartis' ) . '</h2>' .
				'<!-- /wp:heading -->' .
				'<!-- wp:shortcode -->' .
				'[cosmartis_tarifs]' .
				'<!-- /wp:shortcode -->' .
				'</div>' .
				'<!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'cosmartis/faq',
		array(
			'title'      => __( 'Cosmartis : FAQ', 'cosmartis' ),
			'categories' => array( 'cosmartis' ),
			'content'    =>
				'<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->' .
				'<div class="wp-block-group alignwide">' .
				'<!-- wp:heading {"textAlign":"center"} -->' .
				'<h2 class="wp-block-heading has-text-align-center">' . esc_html__( 'Questions fréquentes', 'cosmartis' ) . '</h2>' .
				'<!-- /wp:heading -->' .
				'<!-- wp:shortcode -->' .
				'[cosmartis_faq]' .
				'<!-- /wp:shortcode -->' .
				'</div>' .
				'<!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'cosmartis/etudes-de-cas',
		array(
			'title'      => __( 'Cosmartis : études de cas', 'cosmartis' ),
			'categories' => array( 'cosmartis' ),
			'content'    =>
				'<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->' .
				'<div class="wp-block-group alignwide">' .
				'<!-- wp:heading {"textAlign":"center"} -->' .
				'<h2 class="wp-block-heading has-text-align-center">' . esc_html__( 'Études de cas', 'cosmartis' ) . '</h2>' .
				'<!-- /wp:heading -->' .
				'<!-- wp:shortcode -->' .
				'[cosmartis_etudes_de_cas limit="3"]' .
				'<!-- /wp:shortcode -->' .
				'</div>' .
				'<!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'cosmartis/cta',
		array(
			'title'      => __( 'Cosmartis : appel à l\'action Calendly', 'cosmartis' ),
			'categories' => array( 'cosmartis' ),
			'content'    =>
				'<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->' .
				'<div class="wp-block-group alignwide">' .
				'<!-- wp:heading {"textAlign":"center"} -->' .
				'<h2 class="wp-block-heading has-text-align-center">' . esc_html__( 'Prêt à voir ce qu\'on peut automatiser chez vous ?', 'cosmartis' ) . '</h2>' .
				'<!-- /wp:heading -->' .
				'<!-- wp:shortcode -->' .
				'[cosmartis_calendly]' .
				'<!-- /wp:shortcode -->' .
				'</div>' .
				'<!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'cosmartis_register_block_patterns' );
