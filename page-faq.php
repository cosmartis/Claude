<?php
/**
 * Template auto-appliqué à la page de slug "faq" (hiérarchie de gabarits
 * WordPress : page-{slug}.php).
 *
 * Modifiable depuis wp-admin : si du contenu est ajouté dans l'éditeur de
 * cette page, il remplace la liste de questions codées en dur ci-dessous.
 * Le bloc natif "Détails" (core/details) reproduit le même rendu accordéon
 * — voir le modèle prêt à insérer dans inc/block-patterns.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( have_posts() ) {
	the_post();
}
$cosmartis_page_content = trim( (string) get_the_content() );
?>

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'FAQ', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Questions fréquentes', 'cosmartis' ); ?></h1>
	</div>
</section>

<section>
	<div class="container" style="max-width:760px;">
		<?php if ( '' !== $cosmartis_page_content ) : ?>
			<div class="entry-content cosmartis-editable"><?php the_content(); ?></div>
		<?php else : ?>
			<?php get_template_part( 'template-parts/faq-list' ); ?>
		<?php endif; ?>
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
