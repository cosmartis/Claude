<?php
/**
 * Page dédiée « Experts-comptables » (slug experts-comptables).
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
		<span class="eyebrow">Pour les cabinets d’expertise comptable</span>
		<h1>Vos clients vous envoient leurs pièces à temps, sans que vos collaborateurs aient à relancer</h1>
		<p class="lede">Cosmartis automatise la collecte des justificatifs, les relances et l’accueil des nouveaux clients de votre cabinet. Vous gardez la main sur chaque dossier.</p>
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
			<h2>Collecte des pièces et relances, en moins d’une minute</h2>
		</div>
		<div style="max-width:960px;margin:0 auto;">
			<video controls preload="none" playsinline poster="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-experts-comptables.jpg" style="width:100%;height:auto;display:block;border-radius:var(--c-radius);border:1px solid var(--c-border);background:#0d1117;">
				<source src="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-experts-comptables.mp4" type="video/mp4">
			</video>
		</div>
		<a class="cx-bridge" href="#constat">Le quotidien d’un cabinet <span>↓</span></a>
	</div>
</section>

<section id="constat">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Le constat</span>
			<h2>Courir après les pièces, mois après mois</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Des relances à la main</h3>
				<p class="text-muted">Vos collaborateurs passent des heures à relancer les clients par e-mail et par téléphone pour obtenir les mêmes justificatifs.</p>
			</div>
			<div class="card">
				<h3>Des documents partout</h3>
				<p class="text-muted">Messagerie, courrier, photos envoyées en vrac : retrouver la bonne pièce prend du temps, et certaines se perdent.</p>
			</div>
			<div class="card">
				<h3>Un accueil client qui s’éternise</h3>
				<p class="text-muted">Chaque nouveau client, ce sont des formulaires, des pièces à réclamer et des rappels avant d’avoir un dossier complet.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#solution">Ce que nous automatisons <span>↓</span></a>
	</div>
</section>

<section id="solution">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">La solution</span>
			<h2>Un cabinet qui collecte et relance tout seul</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Collecte et relances</h3>
				<p class="text-muted">Vos clients reçoivent la liste des pièces attendues, puis des rappels courtois à la cadence que vous choisissez, au nom de votre cabinet.</p>
			</div>
			<div class="card">
				<h3>Accueil des nouveaux clients</h3>
				<p class="text-muted">Un parcours guidé : informations à renseigner, pièces à fournir, relances automatiques jusqu’au dossier complet.</p>
			</div>
			<div class="card">
				<h3>Suivi en un coup d’œil</h3>
				<p class="text-muted">Un tableau de bord montre, client par client, ce qui est reçu et ce qui manque encore.</p>
			</div>
		</div>
		<div class="cx-proof" style="margin-top:32px;">
			<h3>Vous gardez le contrôle</h3>
			<p>Aucune décision comptable n’est automatisée : le système collecte, relance et classe l’information. Vos collaborateurs valident et restent les interlocuteurs de vos clients.</p>
			<p class="text-muted">Cabinets au Luxembourg : un parcours d’accueil avec questionnaire de connaissance client (LBC/FT) est disponible, en plusieurs langues.</p>
		</div>
		<a class="cx-bridge" href="#offre">Pour quel investissement ? <span>↓</span></a>
	</div>
</section>

<section id="offre">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">L’offre cabinets</span>
			<h2>Deux formules, selon ce que vous voulez automatiser</h2>
		</div>
		<div class="cx-single" style="max-width:1040px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;align-items:stretch">
			<div class="pricing-card">
				<div class="pricing-card-head">
					<h3>Première automatisation</h3>
					<p class="pricing-amount">1 490 €</p>
					<p class="pricing-unit text-muted">paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">Une ou deux automatisations, choisies là où votre cabinet perd le plus de temps : collecte et relances, accueil des nouveaux clients, suivi des dossiers.</p>
				<ul class="pricing-features">
					<li>Une ou deux automatisations au choix</li>
					<li>Formation de l’équipe + documentation</li>
					<li>Délai indicatif : 1 à 2 semaines</li>
					<li>Paiement : 50 % à l’acceptation du devis, 50 % à la mise en service</li>
				</ul>
			</div>
			<div class="pricing-card pricing-card--featured">
				<span class="pricing-badge">Le plus complet</span>
				<div class="pricing-card-head">
					<h3>Automatisation cabinet</h3>
					<p class="pricing-amount">3 900 €</p>
					<p class="pricing-unit text-muted">paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">Trois automatisations connectées entre elles : collecte et relances, accueil des nouveaux clients, suivi des dossiers. Au-delà de trois, sur devis.</p>
				<ul class="pricing-features">
					<li>Trois automatisations connectées</li>
					<li>Tableau de bord de suivi</li>
					<li>Formation de l’équipe + documentation complète</li>
					<li>60 jours de support inclus</li>
					<li>Délai indicatif : 1 à 2 semaines</li>
					<li>Paiement : 50 % à l’acceptation du devis, 50 % à la mise en service</li>
				</ul>
			</div>
		</div>
		<div class="pricing-addon" style="max-width:1040px;margin:24px auto 0">
			<span class="pricing-addon-plus">+</span>
			<div class="pricing-addon-body">
				<div class="pricing-addon-head">
					<span class="pricing-addon-label">Abonnement Suivi &amp; Évolution (un seul par offre)</span>
					<span class="pricing-addon-price">199 € <span class="text-muted">/ mois, sans engagement</span></span>
				</div>
				<p class="text-muted">Maintenance corrective, ajustements et petites évolutions, support prioritaire (réponse sous 48h ouvrées). Résiliable à tout moment.</p>
			</div>
		</div>
		<div style="text-align:center;margin:24px 0">
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
		</div>
		<p class="cx-note text-muted">TVA non applicable, article 293 B du CGI. Les données de vos clients sont un sujet central pour un cabinet : nous en parlons dès le diagnostic (accès, hébergement, durée de conservation).</p>
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
				<summary>Est-ce compatible avec mon logiciel de comptabilité ?</summary>
				<div class="faq-answer"><p>Dans la grande majorité des cas, oui : le système se branche sur les outils que vous utilisez déjà. Nous le vérifions pendant le diagnostic gratuit.</p></div>
			</details>
			<details class="faq-item">
				<summary>Mes clients vont-ils être dérangés ?</summary>
				<div class="faq-answer"><p>Les messages sont courtois, envoyés au nom de votre cabinet, et leur fréquence est réglée par vos soins.</p></div>
			</details>
			<details class="faq-item">
				<summary>En combien de temps est-ce opérationnel ?</summary>
				<div class="faq-answer"><p>Le délai indicatif est de 1 à 2 semaines après le diagnostic.</p></div>
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
		<h2>On regarde ensemble comment libérer du temps à votre cabinet ?</h2>
		<p class="lede">30 minutes, sans engagement.</p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
