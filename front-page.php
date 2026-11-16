<?php
/**
 * Page d'accueil — page de conversion principale.
 *
 * Contenu codé en dur dans ce fichier, volontairement non modifiable depuis
 * wp-admin — toute évolution de contenu ou de structure passe par une
 * demande directe à Claude Code, pas par l'éditeur WordPress.
 *
 * Refonte du 13/11/2026 : une seule promesse (rendez-vous qualifiés), les
 * 3 offres de prospection (e-mail, voix, duo), des pages dédiées par métier.
 * Sauvegarde de l'ancienne version : front-page.php.bak-20261113.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/cx-styles' );

$prix_indicatif = get_theme_mod( 'cosmartis_prix_indicatif', 'Diagnostic gratuit — 30 minutes, sans engagement' );
$cta_label      = 'Réserver mon diagnostic gratuit';
?>

<!-- 1. Hero : la promesse -->
<section id="votre-metier" style="padding:18px 0;background:var(--c-bg-alt);border-bottom:1px solid var(--c-border);">
	<div class="container" style="display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:10px 12px;">
		<span style="font-weight:600;color:var(--c-text);margin-right:6px;">Vous êtes :</span>
		<a class="btn btn-secondary" style="padding:10px 18px;font-size:0.95rem;" href="<?php echo esc_url( home_url( '/experts-comptables/' ) ); ?>">Expert-comptable</a>
		<a class="btn btn-secondary" style="padding:10px 18px;font-size:0.95rem;" href="<?php echo esc_url( home_url( '/courtiers/' ) ); ?>">Courtier en assurance</a>
		<a class="btn btn-secondary" style="padding:10px 18px;font-size:0.95rem;" href="<?php echo esc_url( home_url( '/solopreneurs/' ) ); ?>">Solopreneur</a>
		<a class="btn btn-secondary" style="padding:10px 18px;font-size:0.95rem;" href="<?php echo esc_url( home_url( '/tpe-pme/' ) ); ?>">TPE / PME</a>
		<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" style="color:var(--c-accent);font-size:0.95rem;margin-left:6px;">Autre activité →</a>
	</div>
</section>

<section class="hero">
	<div class="container">
		<span class="eyebrow">Prospection automatisée pour entreprises B2B</span>
		<h1>Des rendez-vous qualifiés dans votre agenda, sans prospecter vous-même</h1>
		<p class="lede">Cosmartis contacte vos futurs clients par e-mail et par téléphone, relance au bon moment et vous prévient dès que quelqu’un veut vous parler. Il ne vous reste que le plus agréable : les rendez-vous.</p>
		<div class="hero-ctas">
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
			<a class="btn btn-secondary" href="#tarifs">Voir les 3 offres</a>
		</div>
		<span class="price-badge"><?php echo esc_html( $prix_indicatif ); ?></span>
		<a class="cx-bridge" href="#comment-ca-marche">▶ Voir comment ça marche (1 min) <span>↓</span></a>
	</div>
</section>

<!-- 2. Engagements de transparence -->
<section class="trust-bar">
	<div class="container">
		<div class="trust-bar-inner">
			<span class="trust-item">Entreprises uniquement (B2B)</span>
			<span class="trust-item">Passage à un humain si le prospect le demande</span>
			<span class="trust-item">Refus enregistrés et respectés</span>
			<span class="trust-item">Aucune promesse de volume : des chiffres réels</span>
			<span class="trust-item">Mise en place par nos soins</span>
		</div>
	</div>
</section>

<!-- 3. Le constat -->


<section id="comment-ca-marche">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Comment ça marche ?</span>
			<h2>La prospection Cosmartis, en moins d’une minute</h2>
		</div>
		<div style="max-width:960px;margin:0 auto;">
			<video controls preload="none" playsinline poster="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-accueil.jpg" style="width:100%;height:auto;display:block;border-radius:var(--c-radius);border:1px solid var(--c-border);background:#0d1117;">
				<source src="https://cosmartis.com/wp-content/uploads/2026/11/cosmartis-comment-ca-marche-accueil.mp4" type="video/mp4">
			</video>
		</div>
		<a class="cx-bridge" href="#constat">Pourquoi prospecter seul est si difficile <span>↓</span></a>
	</div>
</section>

<section id="constat">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Le constat</span>
			<h2>Prospecter est un deuxième métier, et vous n’avez pas le temps de l’exercer</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>On prospecte par à-coups</h3>
				<p class="text-muted">Quand l’activité est là, on ne prospecte plus. Quand le carnet se vide, il est déjà tard.</p>
			</div>
			<div class="card">
				<h3>Les relances s’oublient</h3>
				<p class="text-muted">Un prospect qu’on ne relance pas est un prospect perdu. Pourtant, personne n’a le temps de tout suivre.</p>
			</div>
			<div class="card">
				<h3>Un commercial coûte cher</h3>
				<p class="text-muted">Recruter, former, encadrer : des mois d’investissement avant le premier rendez-vous.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#demonstration">Alors nous avons construit un système qui s’en charge <span>↓</span></a>
	</div>
</section>

<!-- 4. Cosmartis, sa propre démonstration -->
<section id="demonstration">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">La preuve par l’exemple</span>
			<h2>Cosmartis utilise ce système pour trouver ses propres clients</h2>
		</div>
		<div class="cx-proof">
			<p>Nous ne vous vendons rien que nous n’utilisons pas nous-mêmes. Chaque jour, notre système contacte des professionnels, relance, trie les réponses et nous prévient quand quelqu’un est intéressé.</p>
			<p>Si vous êtes arrivé ici après un message ou un appel de notre part, vous avez déjà vu le système à l’œuvre.</p>
			<p class="text-muted">Nous sommes en phase de démarrage : nous mesurons chaque étape. Dès que nos chiffres seront significatifs (messages envoyés, réponses, rendez-vous obtenus), nous les publierons ici, tels quels.</p>
		</div>
		<a class="cx-bridge" href="#methode">Concrètement, comment ça se passe ? <span>↓</span></a>
	</div>
</section>

<!-- 5. Méthode -->
<section id="methode">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Méthode</span>
			<h2>De la première conversation au rendez-vous</h2>
		</div>
		<div class="steps">
			<div class="step">
				<h3>Diagnostic gratuit</h3>
				<p class="text-muted">30 minutes pour définir qui vous voulez rencontrer et ce que vous proposez.</p>
			</div>
			<div class="step">
				<h3>Mise en place</h3>
				<p class="text-muted">Nous construisons la liste de prospects, rédigeons les messages et réglons le système. Vous validez avant tout envoi.</p>
			</div>
			<div class="step">
				<h3>Prospection continue</h3>
				<p class="text-muted">E-mails et/ou appels partent chaque jour, les relances sont automatiques, les refus sont respectés.</p>
			</div>
			<div class="step">
				<h3>Rendez-vous</h3>
				<p class="text-muted">Vous êtes prévenu dès qu’un prospect est intéressé, et vous suivez chaque mois les chiffres réels.</p>
			</div>
		</div>
		<a class="cx-bridge" href="#tarifs">Trois façons de s’y prendre <span>↓</span></a>
	</div>
</section>

<!-- 6. Les 3 offres -->
<section id="tarifs">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Offres</span>
			<h2>Un canal, une offre, un prix</h2>
		</div>
		<p class="pricing-diagnostic"><strong>Diagnostic gratuit</strong> — 30 minutes, sans engagement, avant toute proposition.</p>

		<div class="pricing-grid">
			<div class="pricing-card">
				<div class="pricing-card-head">
					<h3>Prospection par e-mail</h3>
					<p class="pricing-amount">1 490 €</p>
					<p class="pricing-unit text-muted">mise en place, paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">Environ 3 000 e-mails par mois, envoyés automatiquement à des professionnels ciblés.</p>
				<ul class="pricing-features">
					<li>Liste de prospects B2B construite pour vous</li>
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
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
			</div>

			<div class="pricing-card">
				<div class="pricing-card-head">
					<h3>Agent vocal IA</h3>
					<p class="pricing-amount">1 490 €</p>
					<p class="pricing-unit text-muted">mise en place, paiement unique</p>
				</div>
				<p class="text-muted pricing-desc">300 appels par mois, menés par un assistant vocal IA.</p>
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
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
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
				<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
			</div>
		</div>

		<p class="pricing-footnote">
			Entreprises uniquement (B2B). Aucun nombre de rendez-vous n’est garanti : nous mesurons chaque étape et vous montrons les chiffres réels.<br />
			Pas sûr du bon choix ? Le diagnostic gratuit sert à ça. TVA non applicable, article 293 B du CGI.
		</p>
		<a class="cx-bridge" href="#metiers">Vous êtes dans l’un de ces métiers ? <span>↓</span></a>
	</div>
</section>

<!-- 7. Offres par métier -->
<section id="metiers">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Pour votre métier</span>
			<h2>Des offres déjà pensées pour votre secteur</h2>
		</div>
		<div class="cx-grid3">
			<div class="card">
				<h3>Experts-comptables</h3>
				<p class="text-muted">Collecte des pièces, relances clients, accueil des nouveaux dossiers : l’administratif du cabinet tourne sans courir après les documents.</p>
				<a class="btn btn-secondary" href="/experts-comptables/">Voir l’offre cabinets</a>
			</div>
			<div class="card">
				<h3>Artisans du bâtiment</h3>
				<p class="text-muted">Vos devis et vos factures préparés depuis votre téléphone, entre deux chantiers, avec le Bot Paperasse.</p>
				<a class="btn btn-secondary" href="/artisans/">Voir l’offre artisans</a>
			</div>
			<div class="card">
				<h3>Indépendants et solopreneurs</h3>
				<p class="text-muted">Relances, rendez-vous et suivi de vos contacts automatisés, pour que votre activité tourne même quand vous êtes en rendez-vous.</p>
				<a class="btn btn-secondary" href="/solopreneurs/">Voir l’offre solopreneurs</a>
			</div>
			<div class="card">
				<h3>TPE et PME</h3>
				<p class="text-muted">Vos outils reliés et le suivi commercial et administratif de toute l’équipe automatisé, avec un tableau de bord.</p>
				<a class="btn btn-secondary" href="/tpe-pme/">Voir l’offre TPE / PME</a>
			</div>
			<div class="card">
				<h3>Création de site internet</h3>
				<p class="text-muted">Un site rapide, clair et pensé pour générer des demandes, seul ou avec des automatisations.</p>
				<a class="btn btn-secondary" href="/creation-de-site-internet/">Voir les sites et packs</a>
			</div>
			<div class="card">
				<h3>Automatisation sur mesure</h3>
				<p class="text-muted">Quatre familles d’automatisation (commerciale, marketing, administrative, opérationnelle) pour tout autre besoin.</p>
				<a class="btn btn-secondary" href="/services/">Voir tous les services</a>
			</div>
		</div>
		<span id="sites"></span>
		<a class="cx-bridge" href="#faq">Vos questions <span>↓</span></a>
	</div>
</section>

<!-- 8. FAQ -->
<section id="faq">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Questions fréquentes</span>
			<h2>Avant de vous décider</h2>
		</div>
		<div class="cx-faq">
			<details class="faq-item">
				<summary>Combien de rendez-vous vais-je obtenir ?</summary>
				<div class="faq-answer"><p>Nous ne garantissons aucun nombre : cela dépend de votre offre, de votre cible et de votre marché. Ce que nous garantissons, c’est la transparence : chaque mois, vous voyez les chiffres réels, de l’envoi jusqu’au rendez-vous.</p></div>
			</details>
			<details class="faq-item">
				<summary>Quand verrai-je les premiers résultats ?</summary>
				<div class="faq-answer"><p>Pour l’e-mail, la boîte d’envoi doit d’abord « chauffer » progressivement pendant trois à quatre semaines avant de monter en volume : un premier bilan sérieux se fait au bout d’environ deux mois. Pour l’appel, comptez deux à trois semaines de réglages et de mesures. Nous préférons vous le dire dès le départ.</p></div>
			</details>
			<details class="faq-item">
				<summary>Est-ce légal de prospecter ainsi ?</summary>
				<div class="faq-answer"><p>Nous ne contactons que des professionnels, l’expéditeur est toujours clairement identifié et chaque personne peut refuser simplement : son refus est enregistré et respecté. Les règles varient d’un pays à l’autre : nous adaptons les canaux à chaque marché.</p></div>
			</details>
			<details class="faq-item">
				<summary>Un agent vocal IA, ça ne fait pas fuir les prospects ?</summary>
				<div class="faq-answer"><p>Il va droit au but, s’arrête dès qu’on lui dit non et passe la main à un humain si la personne le demande. L’objectif n’est pas d’appeler beaucoup, mais d’appeler bien.</p></div>
			</details>
			<details class="faq-item">
				<summary>Puis-je arrêter quand je veux ?</summary>
				<div class="faq-answer"><p>L’agent vocal est sans engagement. Les offres e-mail et duo ont un engagement de 3 mois, le temps de mesurer de vrais résultats.</p></div>
			</details>
		</div>
	</div>
</section>

<!-- 9. CTA final -->
<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2>On regarde ensemble qui vous voulez rencontrer ?</h2>
		<p class="lede">30 minutes, sans engagement.</p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
