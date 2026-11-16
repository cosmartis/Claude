<?php
/**
 * Page dédiée « Courtiers en assurance » (slug courtiers).
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
		<span class="eyebrow">Pour les cabinets de courtage en assurance</span>
		<h1>De nouveaux clients professionnels pour votre cabinet, sans prospecter vous-même</h1>
		<p class="lede">Cosmartis contacte pour vous des dirigeants d’entreprise par e-mail et par téléphone, relance au bon moment et vous prévient dès que l’un d’eux veut vous parler. Vous gardez votre temps pour le conseil et les rendez-vous.</p>
		<div class="hero-ctas">
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
			<a class="btn btn-secondary" href="#offre">Voir les offres</a>
		</div>
		<span class="price-badge">Diagnostic gratuit — 30 minutes, sans engagement</span>
		<a class="cx-bridge" href="#comment-ca-marche">▶ Voir comment ça marche (1 min) <span>↓</span></a>
	</div>
</section>

<section id="comment-ca-marche">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Comment ça marche ?</span>
			<h2>Trouver de nouveaux clients professionnels, en moins d’une minute</h2>
		</div>
		<div style="max-width:960px;margin:0 auto;">
			<video controls preload="none" playsinline poster="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-courtiers.jpg" style="width:100%;height:auto;display:block;border-radius:var(--c-radius);border:1px solid var(--c-border);background:#0d1117;">
				<source src="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-courtiers.mp4" type="video/mp4">
			</video>
		</div>
		<a class="cx-bridge" href="#constat">Le développement d’un cabinet de courtage <span>↓</span></a>
	</div>
</section>

<section id="constat">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Le constat</span>
			<h2>Trouver de nouveaux clients entreprises passe souvent après le reste</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Tout repose sur les recommandations</h3>
				<p class="text-muted">Elles font vivre le cabinet. Mais quand elles ralentissent un trimestre, rien ne prend le relais.</p>
			</div>
			<div class="card">
				<h3>La prospection passe après le reste</h3>
				<p class="text-muted">Entre les contrats à suivre, les renouvellements et les demandes clients, il ne reste plus de temps pour aller chercher de nouvelles entreprises.</p>
			</div>
			<div class="card">
				<h3>Un commercial coûte cher</h3>
				<p class="text-muted">Recruter, former, encadrer : des mois d’investissement avant le premier rendez-vous.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#solution">Ce que nous prenons en charge <span>↓</span></a>
	</div>
</section>

<section id="solution">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">La solution</span>
			<h2>Une prospection qui tourne chaque jour, à votre place</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Une cible définie avec vous</h3>
				<p class="text-muted">Secteur, taille, zone : nous construisons la liste des entreprises que votre cabinet veut rencontrer.</p>
			</div>
			<div class="card">
				<h3>E-mails, appels et relances</h3>
				<p class="text-muted">Les messages et les appels partent chaque jour vers ces entreprises, et les relances se font automatiquement.</p>
			</div>
			<div class="card">
				<h3>Vous êtes prévenu des intéressés</h3>
				<p class="text-muted">Les réponses sont lues et triées : dès qu’un dirigeant veut vous parler, vous le savez.</p>
			</div>
		</div>
		<div class="cx-proof" style="margin-top:32px;">
			<h3>Vous gardez la main</h3>
			<p>Vous validez chaque message avant tout envoi. Chaque refus est enregistré et respecté. Chaque mois, vous voyez les chiffres réels : envois ou appels, réponses, rendez-vous. Aucun nombre de rendez-vous n’est garanti : cela dépend de votre cible et de votre marché.</p>
		</div>
		<a class="cx-bridge" href="#offre">Trois façons de s’y prendre <span>↓</span></a>
	</div>
</section>

<section id="offre">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Offres</span>
			<h2>Un canal, une offre, un prix</h2>
		</div>
		<div class="cx-grid3">
			<div class="pricing-card">
				<div class="pricing-card-head">
					<h3>Prospection par e-mail</h3>
					<p class="pricing-amount">1 490 €</p>
					<p class="pricing-unit text-muted">mise en place, paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">Environ 3 000 e-mails par mois, envoyés automatiquement à des entreprises ciblées.</p>
				<ul class="pricing-features">
					<li>Liste de prospects construite pour votre cabinet</li>
					<li>Messages rédigés avec vous, relances automatiques</li>
					<li>Réponses lues et triées : vous êtes prévenu des intéressés</li>
					<li>Suivi chiffré chaque mois : envois, réponses, rendez-vous</li>
					<li>Engagement de 3 mois</li>
				</ul>
				<div class="pricing-addon">
					<span class="pricing-addon-plus">+</span>
					<div class="pricing-addon-body">
						<div class="pricing-addon-head">
							<span class="pricing-addon-label">Abonnement mensuel</span>
							<span class="pricing-addon-price">490 € <span class="text-muted">/ mois</span></span>
						</div>
					</div>
				</div>
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'secondary' ) ); ?>
			</div>
			<div class="pricing-card">
				<div class="pricing-card-head">
					<h3>Agent vocal IA</h3>
					<p class="pricing-amount">1 490 €</p>
					<p class="pricing-unit text-muted">mise en place, paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">300 appels par mois vers des entreprises ciblées, menés par un assistant vocal IA.</p>
				<ul class="pricing-features">
					<li>Appels aux professionnels uniquement</li>
					<li>Arrêt immédiat dès que la personne refuse, opposition enregistrée</li>
					<li>Transfert possible vers vous si le prospect souhaite parler à un humain</li>
					<li>Suivi chiffré : appels, décrochés, rendez-vous</li>
					<li>0,80 € par appel au-delà de 300</li>
					<li>Sans engagement</li>
				</ul>
				<div class="pricing-addon">
					<span class="pricing-addon-plus">+</span>
					<div class="pricing-addon-body">
						<div class="pricing-addon-head">
							<span class="pricing-addon-label">Abonnement mensuel</span>
							<span class="pricing-addon-price">590 € <span class="text-muted">/ mois, sans engagement</span></span>
						</div>
						<p class="text-muted">Pour tester : pilote de 30 jours et 100 appels à 490 €, déduits de la mise en place si vous continuez.</p>
					</div>
				</div>
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'secondary' ) ); ?>
			</div>
			<div class="pricing-card pricing-card--featured">
				<span class="pricing-badge">Recommandé</span>
				<div class="pricing-card-head">
					<h3>Duo e-mail + voix</h3>
					<p class="pricing-amount">1 990 €</p>
					<p class="pricing-unit text-muted">mise en place, paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">Les deux canaux travaillent ensemble : l’e-mail ouvre la porte, l’appel relance.</p>
				<ul class="pricing-features">
					<li>Tout ce qui est inclus dans les offres e-mail et voix</li>
					<li>Un seul interlocuteur, un seul suivi chiffré</li>
					<li>Engagement de 3 mois</li>
				</ul>
				<div class="pricing-addon">
					<span class="pricing-addon-plus">+</span>
					<div class="pricing-addon-body">
						<div class="pricing-addon-head">
							<span class="pricing-addon-label">Abonnement mensuel</span>
							<span class="pricing-addon-price">790 € <span class="text-muted">/ mois</span></span>
						</div>
					</div>
				</div>
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
			</div>
		</div>
		<p class="cx-note text-muted">Entreprises uniquement (B2B) : nous prospectons des entreprises, jamais des particuliers. Aucun nombre de rendez-vous n’est garanti : nous mesurons chaque étape et vous montrons les chiffres réels. TVA non applicable, article 293 B du CGI.</p>
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
				<summary>Prospectez-vous aussi des particuliers ?</summary>
				<div class="faq-answer"><p>Non. Nous contactons uniquement des entreprises et des professionnels, pour vous aider à développer votre clientèle professionnelle.</p></div>
			</details>
			<details class="faq-item">
				<summary>Combien de rendez-vous vais-je obtenir ?</summary>
				<div class="faq-answer"><p>Nous ne garantissons aucun nombre : cela dépend de votre cible et de votre marché. Ce que nous garantissons, c’est la transparence : chaque mois, vous voyez les chiffres réels, de l’envoi jusqu’au rendez-vous.</p></div>
			</details>
			<details class="faq-item">
				<summary>Cela ne risque-t-il pas d’abîmer l’image du cabinet ?</summary>
				<div class="faq-answer"><p>Vous validez chaque message avant l’envoi, l’expéditeur est toujours clairement identifié et chaque refus est enregistré et respecté.</p></div>
			</details>
			<details class="faq-item">
				<summary>Est-ce légal de prospecter ainsi ?</summary>
				<div class="faq-answer"><p>Nous ne contactons que des professionnels, nous nous identifions toujours et chaque personne peut refuser simplement : son refus est enregistré et respecté.</p></div>
			</details>
			<details class="faq-item">
				<summary>Quand verrai-je les premiers résultats ?</summary>
				<div class="faq-answer"><p>Pour l’e-mail, la boîte d’envoi doit d’abord « chauffer » progressivement pendant trois à quatre semaines : un premier bilan sérieux se fait au bout d’environ deux mois. Pour l’appel, comptez deux à trois semaines de réglages et de mesures.</p></div>
			</details>
			<details class="faq-item">
				<summary>Puis-je arrêter quand je veux ?</summary>
				<div class="faq-answer"><p>L’agent vocal est sans engagement. Les offres e-mail et duo ont un engagement de 3 mois, le temps de mesurer de vrais résultats.</p></div>
			</details>
		</div>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2>On regarde ensemble quelles entreprises votre cabinet veut rencontrer ?</h2>
		<p class="lede">30 minutes, sans engagement.</p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => 'Réserver mon diagnostic gratuit', 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
