<?php
/**
 * Page d'accueil — page de conversion principale.
 *
 * Modifiable depuis wp-admin : si la page réglée comme page d'accueil
 * (Réglages > Lecture) contient du contenu dans l'éditeur (Gutenberg ou
 * Elementor une fois installé), ce contenu remplace entièrement les
 * sections ci-dessous. Tant que la page reste vide, le thème affiche cette
 * maquette par défaut — rien ne casse avant que Bouchra ne commence à
 * éditer. Voir inc/block-patterns.php pour des blocs de départ prêts à
 * insérer (catégorie "Cosmartis" dans l'inserteur de blocs).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( have_posts() ) {
	the_post();
}
$cosmartis_page_content = trim( (string) get_the_content() );

if ( '' !== $cosmartis_page_content ) :
	?>
	<section class="entry-content cosmartis-editable">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</section>
	<?php
else :

$prix_indicatif = get_theme_mod( 'cosmartis_prix_indicatif', __( 'Diagnostic gratuit — 30 minutes, sans engagement', 'cosmartis' ) );
$cta_label      = __( 'Réserver mon diagnostic gratuit', 'cosmartis' );
?>

<!-- 1. Hero -->
<section class="hero">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'Automatisation pour indépendants & TPE/PME', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'On automatise le suivi de vos prospects pour que votre agenda se remplisse tout seul', 'cosmartis' ); ?></h1>
		<p class="lede">
			<?php esc_html_e( 'Cosmartis construit votre système complet — site, CRM, prospection, SEO — pour que plus aucun prospect ne tombe dans les oubliettes et que vos tâches répétitives tournent sans vous.', 'cosmartis' ); ?>
		</p>
		<div class="hero-ctas">
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
			<a class="btn btn-secondary" href="#services"><?php esc_html_e( 'Voir nos services', 'cosmartis' ); ?></a>
		</div>
		<span class="price-badge"><?php echo esc_html( $prix_indicatif ); ?></span>
	</div>
</section>

<!-- 2. Preuve de sérieux -->
<section class="trust-bar">
	<div class="container">
		<div class="trust-bar-inner">
			<span class="trust-item"><?php esc_html_e( 'Automatisations sur mesure', 'cosmartis' ); ?></span>
			<span class="trust-item"><?php esc_html_e( 'IA appliquée au commercial', 'cosmartis' ); ?></span>
			<span class="trust-item"><?php esc_html_e( 'CRM centralisé', 'cosmartis' ); ?></span>
			<span class="trust-item"><?php esc_html_e( 'Emailing automatisé', 'cosmartis' ); ?></span>
			<span class="trust-item"><?php esc_html_e( 'Conforme RGPD / UE', 'cosmartis' ); ?></span>
			<span class="trust-item"><?php esc_html_e( 'Sécurité & sauvegardes automatisées', 'cosmartis' ); ?></span>
		</div>
	</div>
</section>

<!-- 3. Problèmes quantifiés -->
<section id="problemes">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Le constat', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Ce que ça vous coûte aujourd\'hui', 'cosmartis' ); ?></h2>
		</div>
		<div class="grid grid-4">
			<div class="card">
				<span class="metric">30 %</span>
				<p><?php esc_html_e( 'des prospects ne reçoivent jamais de relance, faute de temps.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<span class="metric">5h/sem.</span>
				<p><?php esc_html_e( 'perdues chaque semaine sur des tâches répétitives (saisie, relances, plannings).', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<span class="metric">3 à 5</span>
				<p><?php esc_html_e( "outils déconnectés entre eux, avec ressaisie manuelle à chaque étape.", 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<span class="metric">1 sur 4</span>
				<p><?php esc_html_e( 'rendez-vous mal géré (oubli, double réservation, pas de rappel).', 'cosmartis' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 4. Cas d'usage avant/après -->
<section id="cas-usage">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( "Cas d'usage", 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Avant / après', 'cosmartis' ); ?></h2>
		</div>
		<div class="grid grid-2">
			<div class="card">
				<strong><?php esc_html_e( 'Relance des prospects', 'cosmartis' ); ?></strong>
				<p class="text-muted"><?php esc_html_e( 'Avant : relances manuelles, oubliées une fois sur trois. Après : séquence automatique, taux de réponse multiplié par 2.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<strong><?php esc_html_e( 'Prise de rendez-vous', 'cosmartis' ); ?></strong>
				<p class="text-muted"><?php esc_html_e( 'Avant : allers-retours par e-mail. Après : réservation en ligne avec rappel automatique, 0 double booking.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<strong><?php esc_html_e( 'Tâches administratives', 'cosmartis' ); ?></strong>
				<p class="text-muted"><?php esc_html_e( 'Avant : saisie manuelle répétée dans 3 outils. Après : synchronisation automatique, zéro double saisie.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<strong><?php esc_html_e( 'Suivi commercial', 'cosmartis' ); ?></strong>
				<p class="text-muted"><?php esc_html_e( 'Avant : tableur à jour une fois par mois. Après : CRM mis à jour en temps réel, en continu.', 'cosmartis' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 5. Services en résultats -->
<section id="services">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Ce qu\'on fait', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Quatre familles d\'automatisation', 'cosmartis' ); ?></h2>
		</div>
		<div class="grid grid-4">
			<div class="card">
				<h3><?php esc_html_e( 'Commerciale', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Vos prospects sont relancés au bon moment, sans que vous ayez à y penser.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'Marketing', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Votre présence en ligne travaille pour vous, même quand vous êtes sur le terrain.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'Administrative', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'La paperasse et la ressaisie disparaissent de votre emploi du temps.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'Opérationnelle', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Vos plannings et process internes tournent tout seuls, sans erreurs.', 'cosmartis' ); ?></p>
			</div>
		</div>
		<p style="text-align:center;margin-top:32px;">
			<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Voir le détail des services', 'cosmartis' ); ?></a>
		</p>
	</div>
</section>

<!-- 5bis. Tarifs -->
<section id="tarifs">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Tarifs', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Une offre simple, sans surprise', 'cosmartis' ); ?></h2>
		</div>
		<?php get_template_part( 'template-parts/pricing-grid' ); ?>
	</div>
</section>

<!-- CTA milieu de page (formulation identique au hero) -->
<section class="cta-mid">
	<div class="container" style="text-align:center;">
		<h2><?php esc_html_e( 'Prêt à voir ce qu\'on peut automatiser chez vous ?', 'cosmartis' ); ?></h2>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
	</div>
</section>

<!-- 6. Méthodologie -->
<section id="methodologie">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Méthode', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Comment ça se passe', 'cosmartis' ); ?></h2>
		</div>
		<div class="steps">
			<div class="step">
				<h3><?php esc_html_e( 'Diagnostic gratuit', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( '30 minutes pour comprendre vos process actuels et vos points de friction.', 'cosmartis' ); ?></p>
			</div>
			<div class="step">
				<h3><?php esc_html_e( 'Cartographie', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'On identifie ce qui peut être automatisé en priorité, avec un impact mesurable.', 'cosmartis' ); ?></p>
			</div>
			<div class="step">
				<h3><?php esc_html_e( 'Construction & test', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'On construit vos automatisations et on les teste avec vos vrais cas d\'usage.', 'cosmartis' ); ?></p>
			</div>
			<div class="step">
				<h3><?php esc_html_e( 'Livraison, formation & suivi', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'On vous forme, on livre, et on reste disponible pour ajuster dans la durée.', 'cosmartis' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 7. FAQ -->
<section id="faq">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Questions fréquentes', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'FAQ', 'cosmartis' ); ?></h2>
		</div>
		<?php get_template_part( 'template-parts/faq-list' ); ?>
		<p style="text-align:center;margin-top:24px;">
			<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"><?php esc_html_e( 'Voir toutes les questions', 'cosmartis' ); ?></a>
		</p>
	</div>
</section>

<!-- 8. Études de cas -->
<section id="etudes-de-cas">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Preuves concrètes', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Études de cas', 'cosmartis' ); ?></h2>
		</div>
		<?php get_template_part( 'template-parts/case-studies-grid', null, array( 'limit' => 3 ) ); ?>
	</div>
</section>

<!-- 9. Couverture géographique -->
<section id="couverture">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Où on intervient', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'France, Belgique, Suisse romande, Luxembourg', 'cosmartis' ); ?></h2>
		</div>
		<ul class="coverage-list">
			<li><?php esc_html_e( 'France', 'cosmartis' ); ?></li>
			<li><?php esc_html_e( 'Belgique francophone', 'cosmartis' ); ?></li>
			<li><?php esc_html_e( 'Suisse romande', 'cosmartis' ); ?></li>
			<li><?php esc_html_e( 'Luxembourg', 'cosmartis' ); ?></li>
		</ul>
	</div>
</section>

<!-- 10. CTA final (formulation identique au hero) -->
<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2><?php esc_html_e( 'On regarde ensemble ce qui vous ferait gagner du temps ?', 'cosmartis' ); ?></h2>
		<p class="lede"><?php esc_html_e( '30 minutes, sans engagement.', 'cosmartis' ); ?></p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
endif; // cosmartis_page_content

get_footer();
