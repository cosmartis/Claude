<?php
/**
 * Page dédiée « TPE / PME » (slug tpe-pme).
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
		<span class="eyebrow">Pour les TPE et PME</span>
		<h1>Votre équipe arrête de ressaisir et de relancer à la main</h1>
		<p class="lede">Cosmartis relie vos outils et automatise le suivi commercial et administratif de toute votre équipe, pour que chacun se concentre sur ce qui fait avancer l’entreprise.</p>
		<div class="hero-ctas">
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
			<a class="btn btn-secondary" href="#offre">Voir l’offre</a>
		</div>
		<span class="price-badge">Diagnostic gratuit — 30 minutes, sans engagement</span>
		<a class="cx-bridge" href="#comment-ca-marche">▶ Voir comment ça marche (1 min) <span>↓</span></a>
	</div>
</section>

<section id="comment-ca-marche">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Comment ça marche ?</span>
			<h2>Vos outils reliés, en moins d’une minute</h2>
		</div>
		<div style="max-width:960px;margin:0 auto;">
			<video controls preload="none" playsinline poster="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-tpe-pme.jpg" style="width:100%;height:auto;display:block;border-radius:var(--c-radius);border:1px solid var(--c-border);background:#0d1117;">
				<source src="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-tpe-pme.mp4" type="video/mp4">
			</video>
		</div>
		<a class="cx-bridge" href="#constat">Le quotidien d’une petite structure <span>↓</span></a>
	</div>
</section>

<section id="constat">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Le constat</span>
			<h2>Quand les outils ne se parlent pas, l’équipe compense</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Des outils qui ne se parlent pas</h3>
				<p class="text-muted">Agenda, messagerie, tableurs, facturation : chaque outil vit sa vie et l’information circule à la main.</p>
			</div>
			<div class="card">
				<h3>Du temps perdu en ressaisie</h3>
				<p class="text-muted">La même information est saisie plusieurs fois, avec les oublis et les erreurs qui vont avec.</p>
			</div>
			<div class="card">
				<h3>Un suivi qui dépend de chacun</h3>
				<p class="text-muted">Les relances et les échéances reposent sur la mémoire de chacun, et sur la disponibilité de la bonne personne.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#solution">Ce que nous mettons en place <span>↓</span></a>
	</div>
</section>

<section id="solution">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">La solution</span>
			<h2>Un système connecté, pensé pour votre organisation</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Automatisations connectées</h3>
				<p class="text-muted">Relances, rappels, génération de documents, synchronisation entre vos outils : trois à cinq automatisations qui travaillent ensemble.</p>
			</div>
			<div class="card">
				<h3>Un tableau de bord</h3>
				<p class="text-muted">Vous voyez en un coup d’œil où en sont vos prospects, vos dossiers et vos échéances.</p>
			</div>
			<div class="card">
				<h3>Une équipe formée</h3>
				<p class="text-muted">Nous formons vos collaborateurs et remettons une documentation complète : le système ne dépend pas d’une seule personne.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#offre">Pour quel investissement ? <span>↓</span></a>
	</div>
</section>

<section id="offre">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">L’offre TPE / PME</span>
			<h2>Une seule offre, tout compris</h2>
		</div>
		<div class="cx-single">
			<div class="pricing-card pricing-card--featured">
				<span class="pricing-badge">Offre unique</span>
				<div class="pricing-card-head">
					<h3>Système Complet</h3>
					<p class="pricing-amount">3 900 €</p>
					<p class="pricing-unit text-muted">paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">Trois à cinq automatisations connectées entre elles pour couvrir l’ensemble de votre suivi commercial et administratif.</p>
				<ul class="pricing-features">
					<li>Tableau de bord de suivi</li>
					<li>Formation de l’équipe + documentation complète</li>
					<li>60 jours de support inclus</li>
					<li>Délai indicatif : 1 à 2 semaines</li>
					<li>Paiement : 50 % à l’acceptation du devis, 50 % à la mise en service</li>
				</ul>
				<div class="pricing-addon">
					<span class="pricing-addon-plus">+</span>
					<div class="pricing-addon-body">
						<div class="pricing-addon-head">
							<span class="pricing-addon-label">Abonnement Suivi &amp; Évolution</span>
							<span class="pricing-addon-price">199 € <span class="text-muted">/ mois, sans engagement</span></span>
						</div>
						<p class="text-muted">Maintenance corrective, ajustements et petites évolutions, support prioritaire (réponse sous 48h ouvrées). Résiliable à tout moment.</p>
					</div>
				</div>
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
			</div>
		</div>
		<p class="cx-note text-muted">TVA non applicable, article 293 B du CGI. Structure multi-services ou besoins spécifiques : sur devis, à partir de 6 000 €.</p>
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
				<summary>Est-ce compatible avec les outils de mon équipe ?</summary>
				<div class="faq-answer"><p>Dans la grande majorité des cas, oui : le système se branche sur ce que vous utilisez déjà. Nous le vérifions pendant le diagnostic gratuit.</p></div>
			</details>
			<details class="faq-item">
				<summary>En combien de temps est-ce opérationnel ?</summary>
				<div class="faq-answer"><p>Le délai indicatif est de 1 à 2 semaines après le diagnostic.</p></div>
			</details>
			<details class="faq-item">
				<summary>Mon équipe devra-t-elle changer ses habitudes ?</summary>
				<div class="faq-answer"><p>Le moins possible : les automatisations s’appuient sur vos outils actuels, et nous formons l’équipe à ce qui change.</p></div>
			</details>
			<details class="faq-item">
				<summary>Et si nous voulons arrêter l’abonnement ?</summary>
				<div class="faq-answer"><p>Il est sans engagement : vous pouvez l’arrêter à tout moment.</p></div>
			</details>
		</div>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2>On regarde ensemble ce que votre équipe pourrait déléguer ?</h2>
		<p class="lede">30 minutes, sans engagement.</p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
