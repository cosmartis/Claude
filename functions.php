<?php
/**
 * Cosmartis theme bootstrap.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'COSMARTIS_VERSION', '0.1.0' );
define( 'COSMARTIS_DIR', get_template_directory() );
define( 'COSMARTIS_URI', get_template_directory_uri() );
define( 'COSMARTIS_CALENDLY_URL', 'https://calendly.com/cosmartisnewplan/30min' );

require COSMARTIS_DIR . '/inc/setup.php';
require COSMARTIS_DIR . '/inc/enqueue.php';
require COSMARTIS_DIR . '/inc/case-studies-cpt.php';
require COSMARTIS_DIR . '/inc/n8n-integration.php';
require COSMARTIS_DIR . '/inc/customizer.php';
require COSMARTIS_DIR . '/inc/shortcodes.php';
require COSMARTIS_DIR . '/inc/block-patterns.php';
