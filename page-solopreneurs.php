<?php
/**
 * Page dédiée « Solopreneurs » (slug solopreneurs).
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
		<span class="eyebrow">Pour les indépendants et solopreneurs</span>
		<h1>Votre activité continue de tourner, même quand vous êtes en rendez-vous</h1>
		<p class="lede">Cosmartis automatise ce qui vous prend du temps : relances, prise de rendez-vous, suivi de vos contacts. Vous restez concentré sur votre métier.</p>
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
			<h2>Votre première automatisation, en moins d’une minute</h2>
		</div>
		<div style="max-width:960px;margin:0 auto;">
			<video controls preload="none" playsinline poster="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-solopreneurs.jpg" style="width:100%;height:auto;display:block;border-radius:var(--c-radius);border:1px solid var(--c-border);background:#0d1117;">
				<source src="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-solopreneurs.mp4" type="video/mp4">
			</video>
		</div>
		<a class="cx-bridge" href="#constat">Le quotidien d’un indépendant <span>↓</span></a>
	</div>
</section>

<section id="constat">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Le constat</span>
			<h2>Quand on est seul, tout repose sur vous</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Vous faites tout vous-même</h3>
				<p class="text-muted">Prospection, devis, relances, administratif : chaque heure passée sur ces tâches est une heure de moins pour vos clients.</p>
			</div>
			<div class="card">
				<h3>Les relances s’oublient</h3>
				<p class="text-muted">Un devis envoyé puis jamais relancé, un contact qu’on devait rappeler : ce sont des clients qui s’éloignent sans bruit.</p>
			</div>
			<div class="card">
				<h3>Les rendez-vous se négocient</h3>
				<p class="text-muted">Des allers-retours de messages pour trouver un créneau, des oublis, des rendez-vous manqués.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#solution">Ce que nous automatisons <span>↓</span></a>
	</div>
</section>

<section id="solution">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">La solution</span>
			<h2>Un assistant discret qui s’occupe du répétitif</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Relances automatiques</h3>
				<p class="text-muted">Après un devis ou un premier contact, la relance part au bon moment, sans que vous ayez à y penser.</p>
			</div>
			<div class="card">
				<h3>Rendez-vous en ligne</h3>
				<p class="text-muted">Vos clients réservent un créneau eux-mêmes et reçoivent un rappel automatique.</p>
			</div>
			<div class="card">
				<h3>Suivi de vos contacts</h3>
				<p class="text-muted">Un seul endroit à jour, sans ressaisie, pour savoir qui relancer et quand.</p>
			</div>
		</div>
		<div class="cx-proof" style="margin-top:32px;">
			<h3>On commence petit, on étend si besoin</h3>
			<p>Vous démarrez avec une automatisation ciblée, reliée aux outils que vous utilisez déjà. Si elle vous convainc, on en ajoute d’autres. Vous gardez la main sur chaque message envoyé en votre nom.</p>
		</div>
		<a class="cx-bridge" href="#offre">Pour quel investissement ? <span>↓</span></a>
	</div>
</section>

<section id="offre">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">L’offre solopreneurs</span>
			<h2>Une seule offre, simple</h2>
		</div>
		<div class="cx-single">
			<div class="pricing-card pricing-card--featured">
				<span class="pricing-badge">Offre unique</span>
				<div class="pricing-card-head">
					<h3>Première Automatisation</h3>
					<p class="pricing-amount">1 490 €</p>
					<p class="pricing-unit text-muted">paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">Une automatisation ciblée reliée à vos outils existants (par exemple prise de rendez-vous, relance clients, facturation ou qualification de contacts).</p>
				<ul class="pricing-features">
					<li>Formation à l’usage + documentation</li>
					<li>30 jours de support inclus après mise en service</li>
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
		<p class="cx-note text-muted">TVA non applicable, article 293 B du CGI. Besoin de plusieurs automatisations connectées ? Voir l’<a href="<?php echo esc_url( home_url( '/tpe-pme/' ) ); ?>">offre TPE / PME</a>.</p>
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
				<summary>Je ne suis pas du tout technique, est-ce un problème ?</summary>
				<div class="faq-answer"><p>Non. On construit, on teste, on forme : vous n’avez rien à configurer vous-même.</p></div>
			</details>
			<details class="faq-item">
				<summary>Est-ce compatible avec mes outils actuels ?</summary>
				<div class="faq-answer"><p>Dans la grande majorité des cas, oui. Nous le vérifions pendant le diagnostic gratuit.</p></div>
			</details>
			<details class="faq-item">
				<summary>Et si je veux arrêter l’abonnement ?</summary>
				<div class="faq-answer"><p>Il est sans engagement : vous pouvez l’arrêter à tout moment.</p></div>
			</details>
		</div>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2>On regarde ensemble ce qui vous ferait gagner du temps ?</h2>
		<p class="lede">30 minutes, sans engagement.</p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
