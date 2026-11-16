<?php
/**
 * Page dédiée « Artisans » — Bot Paperasse (slug artisans).
 * Contenu codé en dur, comme le reste du thème.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/cx-styles' );
?>

<section class="hero">
	<div class="container">
		<span class="eyebrow">Pour les artisans du bâtiment</span>
		<h1>Vos devis et vos factures préparés depuis votre téléphone, entre deux chantiers</h1>
		<p class="lede">Le Bot Paperasse prépare vos devis et vos factures à partir d’un simple message. Vous gardez vos soirées et vos week-ends.</p>
		<div class="hero-ctas">
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
			<a class="btn btn-secondary" href="#offre">Voir l’offre</a>
		</div>
		<span class="price-badge">Diagnostic gratuit — 30 minutes, sans engagement</span>
		<a class="cx-bridge" href="#constat">Vous reconnaissez cette soirée ? <span>↓</span></a>
	</div>
</section>

<section id="constat">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Le constat</span>
			<h2>Après le chantier, il reste la paperasse</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Les devis le soir</h3>
				<p class="text-muted">La journée est finie, mais les devis, les factures et les relances attendent encore sur la table de la cuisine.</p>
			</div>
			<div class="card">
				<h3>Des clients qui attendent</h3>
				<p class="text-muted">Un devis qui part trop tard, c’est souvent un chantier qui part chez un autre.</p>
			</div>
			<div class="card">
				<h3>Des prix à retrouver</h3>
				<p class="text-muted">Chercher ses tarifs, refaire ses calculs : du temps pris sur vos soirées, à chaque fois.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#methode">Comment ça marche <span>↓</span></a>
	</div>
</section>

<section id="methode">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Le Bot Paperasse</span>
			<h2>Un message, un devis prêt à envoyer</h2>
			<p class="text-muted">Chauffage et climatisation, plomberie, électricité, peinture, toiture, rénovation… si vous faites des devis, il est fait pour vous.</p>
		</div>
		<div class="steps">
			<div class="step">
				<h3>Vos prix, une seule fois</h3>
				<p class="text-muted">Nous enregistrons avec vous vos tarifs et vos prestations.</p>
			</div>
			<div class="step">
				<h3>Un message suffit</h3>
				<p class="text-muted">Depuis votre téléphone, vous décrivez le travail à chiffrer, comme vous le diriez à un collègue.</p>
			</div>
			<div class="step">
				<h3>Le devis est préparé</h3>
				<p class="text-muted">Il est calculé avec vos propres prix, prêt à être relu.</p>
			</div>
			<div class="step">
				<h3>Vous envoyez</h3>
				<p class="text-muted">Vous vérifiez, vous ajustez si besoin, et vous l’envoyez à votre client.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#offre">Pour quel prix ? <span>↓</span></a>
	</div>
</section>

<section id="offre">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">L’offre artisans</span>
			<h2>Une seule offre, simple</h2>
		</div>
		<div class="cx-single">
			<div class="pricing-card pricing-card--featured">
				<span class="pricing-badge">Offre unique</span>
				<div class="pricing-card-head">
					<h3>Bot Paperasse</h3>
					<p class="pricing-amount">997 €</p>
					<p class="pricing-unit text-muted">mise en place, payable en deux fois</p>
				</div>
				<p class="text-muted pricing-desc">Votre assistant de devis et de factures, configuré avec vos prix et prêt à l’emploi.</p>
				<ul class="pricing-features">
					<li>Configuration avec vos tarifs et vos prestations</li>
					<li>Devis et factures préparés depuis votre téléphone</li>
					<li>Accompagnement à la prise en main</li>
					<li>Support par e-mail</li>
				</ul>
				<div class="pricing-addon">
					<span class="pricing-addon-plus">+</span>
					<div class="pricing-addon-body">
						<div class="pricing-addon-head">
							<span class="pricing-addon-label">Abonnement</span>
							<span class="pricing-addon-price">87 € <span class="text-muted">/ mois, sans engagement</span></span>
						</div>
						<p class="text-muted">Utilisation du bot, mises à jour et support. Possible aussi par trimestre : 261 €. Vous arrêtez quand vous voulez.</p>
					</div>
				</div>
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
			</div>
		</div>
		<p class="cx-note text-muted">TVA non applicable, article 293 B du CGI.</p>
		<a class="cx-bridge" href="#faq">Vos questions <span>↓</span></a>
	</div>
</section>

<section id="faq">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Questions fréquentes</span>
			<h2>Avant de vous décider</h2>
		</div>
		<div class="cx-faq">
			<details class="faq-item">
				<summary>Faut-il être à l’aise avec l’informatique ?</summary>
				<div class="faq-answer"><p>Si vous savez envoyer un message, vous savez l’utiliser. Nous configurons tout avec vous.</p></div>
			</details>
			<details class="faq-item">
				<summary>Et si je veux arrêter ?</summary>
				<div class="faq-answer"><p>L’abonnement est sans engagement : vous arrêtez quand vous voulez.</p></div>
			</details>
			<details class="faq-item">
				<summary>Mon métier est-il concerné ?</summary>
				<div class="faq-answer"><p>Tous les artisans qui font des devis et des factures : chauffage, climatisation, plomberie, électricité, peinture, toiture, rénovation…</p></div>
			</details>
			<details class="faq-item">
				<summary>Pourquoi payer en deux fois ?</summary>
				<div class="faq-answer"><p>Pour étaler la mise en place : une première moitié au démarrage, la seconde à la mise en service.</p></div>
			</details>
		</div>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2>On regarde ensemble comment ça marcherait pour vous ?</h2>
		<p class="lede">30 minutes, sans engagement.</p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
