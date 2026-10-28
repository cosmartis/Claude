<?php
/**
 * Template auto-appliqué à la page de slug "a-propos" (hiérarchie de
 * gabarits WordPress : page-{slug}.php).
 *
 * Récit du fondateur, codé en dur et volontairement non modifiable depuis
 * wp-admin — toute évolution passe par une demande directe à Claude Code.
 * Toute modification de ce texte doit être signalée dans cosmartis-sync.md
 * pour que la base de connaissance de l'assistant du site soit mise à jour.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$cta_label = __( 'Réserver mon diagnostic gratuit', 'cosmartis' );
?>

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'À propos', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Rendre aux entrepreneurs le temps que l\'administratif leur prend', 'cosmartis' ); ?></h1>
		<p class="lede">
			<?php esc_html_e( 'Cosmartis est né d\'un constat simple : les indépendants et les petites entreprises ne manquent ni de compétences ni de clients potentiels. Ils manquent de temps.', 'cosmartis' ); ?>
		</p>
	</div>
</section>

<section class="about-founder">
	<div class="container">
		<div class="about-founder__grid">
			<figure class="about-founder__photo">
				<picture>
					<source srcset="<?php echo esc_url( COSMARTIS_URI . '/assets/img/hamid-dibarh.webp' ); ?>" type="image/webp" />
					<img
						src="<?php echo esc_url( COSMARTIS_URI . '/assets/img/hamid-dibarh.jpg' ); ?>"
						alt="<?php esc_attr_e( 'Hamid DIBARH, fondateur de Cosmartis', 'cosmartis' ); ?>"
						width="800"
						height="922"
						fetchpriority="high"
					/>
				</picture>
				<figcaption>
					<strong>Hamid DIBARH</strong>
					<span class="text-muted"><?php esc_html_e( 'Fondateur de Cosmartis', 'cosmartis' ); ?></span>
				</figcaption>
			</figure>

			<div class="about-founder__story">
				<span class="eyebrow"><?php esc_html_e( 'Le fondateur', 'cosmartis' ); ?></span>
				<h2><?php esc_html_e( 'Une conviction avant une entreprise', 'cosmartis' ); ?></h2>
				<p>
					<?php esc_html_e( 'Au fil de ses missions auprès d\'entrepreneurs, Hamid DIBARH a fait le même constat, encore et encore : une énergie absorbée par des tâches qui ne créaient aucune valeur : relancer un devis resté sans réponse, recopier une fiche client d\'un outil à l\'autre, préparer à la main la même facture chaque mois, chercher dans une boîte mail le message d\'un prospect oublié.', 'cosmartis' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Ces professionnels étaient compétents, engagés, souvent excellents dans leur métier. Mais une partie de leur chiffre d\'affaires leur échappait, non par manque de talent, mais par manque d\'organisation outillée. Un prospect qui n\'est pas relancé au bon moment ne revient presque jamais.', 'cosmartis' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Les grandes entreprises disposent d\'équipes entières pour construire et maintenir ces systèmes. Les indépendants et les TPE/PME, eux, doivent choisir entre des logiciels qu\'ils n\'ont pas le temps de configurer et des prestataires dont les tarifs ne sont pas faits pour eux. C\'est cet écart que Hamid a décidé de combler.', 'cosmartis' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container" style="max-width:760px;">
		<span class="eyebrow"><?php esc_html_e( 'La naissance de Cosmartis', 'cosmartis' ); ?></span>
		<h2><?php esc_html_e( 'Des systèmes, pas des gadgets', 'cosmartis' ); ?></h2>
		<p>
			<?php esc_html_e( 'Cosmartis a été fondé avec une ambition précise : mettre à la portée des indépendants et des petites structures le niveau d\'automatisation que seules les organisations importantes pouvaient jusqu\'ici s\'offrir.', 'cosmartis' ); ?>
		</p>
		<p>
			<?php esc_html_e( 'Plutôt que d\'empiler des outils isolés, Cosmartis conçoit des systèmes complets et cohérents : un site qui capte les demandes, un fichier client centralisé, des relances qui partent d\'elles-mêmes, des tâches administratives qui s\'exécutent sans intervention. Chaque brique est pensée pour s\'articuler avec les autres et pour servir un objectif unique : que l\'entrepreneur consacre son temps à ses clients plutôt qu\'à ses outils.', 'cosmartis' ); ?>
		</p>
		<p>
			<?php esc_html_e( 'Basé dans les Hauts-de-France, Cosmartis accompagne aujourd\'hui des indépendants et des TPE/PME en France, en Belgique francophone, en Suisse romande et au Luxembourg.', 'cosmartis' ); ?>
		</p>
	</div>
</section>

<section>
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Nos engagements', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Ce qui guide chaque projet', 'cosmartis' ); ?></h2>
		</div>
		<div class="grid grid-2">
			<div class="card">
				<h3><?php esc_html_e( 'Comprendre avant de construire', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Chaque mission commence par un diagnostic de votre activité. Aucune automatisation n\'est proposée sans avoir identifié précisément ce qu\'elle vous fera gagner.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'Des tarifs clairs', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Les formules et leurs prix sont publiés sur le site. Vous savez ce que vous payez et ce que vous obtenez, avant de vous engager.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'La protection de vos données', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Les systèmes livrés respectent le RGPD et les règles européennes. Vos données et celles de vos clients restent sous votre contrôle.', 'cosmartis' ); ?></p>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'Un accompagnement dans la durée', 'cosmartis' ); ?></h3>
				<p class="text-muted"><?php esc_html_e( 'Un système utile évolue avec votre entreprise. Cosmartis reste à vos côtés après la mise en service pour l\'ajuster, le faire grandir et en garantir la fiabilité.', 'cosmartis' ); ?></p>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container" style="max-width:760px;">
		<blockquote class="about-quote">
			<p><?php esc_html_e( '« Mon objectif n\'est pas de vendre de la technologie. C\'est que chaque entrepreneur que j\'accompagne retrouve du temps, de la sérénité et la maîtrise de son développement commercial. »', 'cosmartis' ); ?></p>
			<cite>Hamid DIBARH, <?php esc_html_e( 'fondateur de Cosmartis', 'cosmartis' ); ?></cite>
		</blockquote>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2><?php esc_html_e( 'Parlons de votre activité', 'cosmartis' ); ?></h2>
		<p class="text-muted"><?php esc_html_e( '30 minutes pour identifier ce qui peut être automatisé chez vous, gratuitement et sans engagement.', 'cosmartis' ); ?></p>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => $cta_label, 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
