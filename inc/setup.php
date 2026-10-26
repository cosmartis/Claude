<?php
/**
 * Theme support, nav menus, image sizes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'cosmartis' ),
			'footer'  => __( 'Menu pied de page', 'cosmartis' ),
			'legal'   => __( 'Mentions légales', 'cosmartis' ),
		)
	);

	add_image_size( 'cosmartis-case-thumb', 640, 400, true );
}
add_action( 'after_setup_theme', 'cosmartis_setup' );

/**
 * Performance: remove default WP cruft that hurts Core Web Vitals
 * and isn't used by this theme (emoji script, oEmbed discovery, etc.).
 */
function cosmartis_trim_head() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
}
add_action( 'init', 'cosmartis_trim_head' );

/**
 * Liens « Tarifs » : une entrée par grille tarifaire de la page Services.
 */
function cosmartis_tarifs_links() {
	return array(
		'/services/#tarifs'     => __( 'Automatisations', 'cosmartis' ),
		'/services/#sites'      => __( 'Création de site internet', 'cosmartis' ),
		'/services/#tout-en-un' => __( 'Offres tout-en-un', 'cosmartis' ),
	);
}

/**
 * Affiche une liste de liens ; une valeur tableau (label + children) devient
 * un élément avec sous-menu.
 */
function cosmartis_render_menu_items( $pages ) {
	echo '<ul>';
	foreach ( $pages as $path => $item ) {
		if ( is_array( $item ) ) {
			printf( '<li class="menu-item-has-children"><a href="%s">%s</a><ul class="sub-menu">', esc_url( home_url( $path ) ), esc_html( $item['label'] ) );
			foreach ( $item['children'] as $child_path => $child_label ) {
				printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( $child_path ) ), esc_html( $child_label ) );
			}
			echo '</ul></li>';
		} else {
			printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( $path ) ), esc_html( $item ) );
		}
	}
	echo '</ul>';
}

/**
 * Fallback menu when no "primary" menu is assigned yet in wp-admin,
 * so the sitemap from the cahier des charges is visible out of the box.
 */
function cosmartis_fallback_primary_menu() {
	cosmartis_render_menu_items(
		array(
			'/services/'        => __( 'Services', 'cosmartis' ),
			'/services/#tarifs' => array(
				'label'    => __( 'Tarifs', 'cosmartis' ),
				'children' => cosmartis_tarifs_links(),
			),
			'/cas-usage/'       => __( "Cas d'usage", 'cosmartis' ),
			'/etudes-de-cas/'   => __( 'Études de cas', 'cosmartis' ),
			'/blog/'            => __( 'Blog', 'cosmartis' ),
			'/contact/'         => __( 'Contact', 'cosmartis' ),
		)
	);
}

/**
 * Fallback menu du pied de page quand aucun menu "footer" n'est assigné :
 * reprend la navigation principale et y ajoute FAQ et À propos, qui vivent
 * dans le footer plutôt que dans le header.
 */
function cosmartis_fallback_footer_menu() {
	cosmartis_render_menu_items(
		array(
			'/services/'        => __( 'Services', 'cosmartis' ),
			'/services/#tarifs' => array(
				'label'    => __( 'Tarifs', 'cosmartis' ),
				'children' => cosmartis_tarifs_links(),
			),
			'/cas-usage/'       => __( "Cas d'usage", 'cosmartis' ),
			'/etudes-de-cas/'   => __( 'Études de cas', 'cosmartis' ),
			'/blog/'            => __( 'Blog', 'cosmartis' ),
			'/contact/'         => __( 'Contact', 'cosmartis' ),
			'/a-propos/'        => __( 'À propos', 'cosmartis' ),
			'/faq/'             => __( 'FAQ', 'cosmartis' ),
		)
	);
}
