<?php
/**
 * Reusable Calendly CTA.
 *
 * Usage:
 *   get_template_part( 'template-parts/calendly-cta', null, array(
 *       'label' => 'Réserver mon diagnostic gratuit',
 *       'style' => 'primary', // 'primary' | 'secondary'
 *   ) );
 *
 * Toujours un widget Calendly (popup), jamais un simple lien de sortie —
 * cf. cahier des charges / cosmartis-sync.md.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cta_label = isset( $args['label'] ) ? $args['label'] : __( 'Réserver mon diagnostic gratuit', 'cosmartis' );
$cta_style = isset( $args['style'] ) && 'secondary' === $args['style'] ? 'btn-secondary' : 'btn-primary';
?>
<button
	type="button"
	class="btn <?php echo esc_attr( $cta_style ); ?> js-calendly-popup"
	data-calendly-url="<?php echo esc_url( COSMARTIS_CALENDLY_URL ); ?>"
>
	<?php echo esc_html( $cta_label ); ?>
</button>
