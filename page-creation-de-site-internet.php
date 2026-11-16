<?php
/**
 * Page dédiée « Création de site internet » (slug creation-de-site-internet).
 * Reprend les grilles tarifaires existantes (template-parts/pricing-grid-sites
 * et pricing-grid-packs).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/cx-styles' );
?>

<section class="hero">
	<div class="container">
		<span class="eyebrow">Création de site internet</span>
		<h1>Un site rapide, clair et pensé pour générer des demandes</h1>
		<p class="lede">Un site qui vous appartient, conçu pour être trouvé, rassurer vos visiteurs et déclencher des prises de contact.</p>
		<div class="hero-ctas">
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
			<a class="btn btn-secondary" href="#sites">Voir les offres</a>
		</div>
		<span class="price-badge">Diagnostic gratuit — 30 minutes, sans engagement</span>
		<a class="cx-bridge" href="#sites">Nos formules <span>↓</span></a>
	</div>
</section>

<section id="sites">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Sites internet</span>
			<h2>Choisissez le site qui vous correspond</h2>
		</div>
		<?php get_template_part( 'template-parts/pricing-grid-sites' ); ?>
		<a class="cx-bridge" href="#tout-en-un">Un site et des automatisations ensemble ? <span>↓</span></a>
	</div>
</section>

<section id="tout-en-un">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Offres tout-en-un</span>
			<h2>Site internet + automatisations + suivi client, en un seul projet</h2>
		</div>
		<?php get_template_part( 'template-parts/pricing-grid-packs' ); ?>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2>On regarde ensemble le site qu’il vous faut ?</h2>
		<p class="lede">30 minutes, sans engagement.</p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
