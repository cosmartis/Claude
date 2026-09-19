<?php
/**
 * Template auto-appliqué à la page de slug "services" (hiérarchie de gabarits
 * WordPress : page-{slug}.php). Créer la page dans wp-admin avec ce slug.
 *
 * Contenu codé en dur (les 4 familles d'automatisation + tarifs),
 * volontairement non modifiable depuis wp-admin — toute évolution passe par
 * une demande directe à Claude Code.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$families = array(
	array(
		'title'    => __( 'Automatisation commerciale', 'cosmartis' ),
		'benefit'  => __( 'Plus aucun prospect ne tombe dans les oubliettes.', 'cosmartis' ),
		'includes' => array(
			__( 'Relances automatiques après devis ou premier contact', 'cosmartis' ),
			__( 'Qualification automatique des prospects entrants', 'cosmartis' ),
			__( 'Mise à jour en temps réel de votre CRM', 'cosmartis' ),
		),
	),
	array(
		'title'    => __( 'Automatisation marketing', 'cosmartis' ),
		'benefit'  => __( 'Votre présence en ligne travaille même quand vous êtes sur le terrain.', 'cosmartis' ),
		'includes' => array(
			__( 'Campagnes e-mail automatisées', 'cosmartis' ),
			__( 'Contenu blog structuré pour le référencement', 'cosmartis' ),
			__( 'Suivi des performances centralisé', 'cosmartis' ),
		),
	),
	array(
		'title'    => __( 'Automatisation administrative', 'cosmartis' ),
		'benefit'  => __( 'La ressaisie manuelle disparaît de votre quotidien.', 'cosmartis' ),
		'includes' => array(
			__( 'Synchronisation entre vos outils existants', 'cosmartis' ),
			__( 'Génération automatique de documents récurrents', 'cosmartis' ),
			__( 'Rappels et confirmations de rendez-vous automatiques', 'cosmartis' ),
		),
	),
	array(
		'title'    => __( 'Automatisation opérationnelle', 'cosmartis' ),
		'benefit'  => __( 'Vos process internes tournent sans erreurs, sans vous.', 'cosmartis' ),
		'includes' => array(
			__( 'Plannings et affectations automatisés', 'cosmartis' ),
			__( 'Alertes en cas d\'anomalie ou de retard', 'cosmartis' ),
			__( 'Tableaux de bord de suivi d\'activité', 'cosmartis' ),
		),
	),
);
?>

<section class="hero" style="padding-top:56px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'Services', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Quatre familles d\'automatisation, un seul objectif : vous faire gagner du temps', 'cosmartis' ); ?></h1>
	</div>
</section>

<section>
	<div class="container">
		<div class="grid grid-2">
			<?php foreach ( $families as $family ) : ?>
				<div class="card">
					<h2><?php echo esc_html( $family['title'] ); ?></h2>
					<p class="text-muted"><?php echo esc_html( $family['benefit'] ); ?></p>
					<ul>
						<?php foreach ( $family['includes'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="tarifs">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow"><?php esc_html_e( 'Tarifs', 'cosmartis' ); ?></span>
			<h2><?php esc_html_e( 'Une offre simple, sans surprise', 'cosmartis' ); ?></h2>
		</div>
		<?php get_template_part( 'template-parts/pricing-grid' ); ?>
	</div>
</section>

<section class="cta-final">
	<div class="container" style="text-align:center;">
		<h2><?php esc_html_e( 'Quel process aimeriez-vous automatiser en premier ?', 'cosmartis' ); ?></h2>
		<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ), 'style' => 'primary' ) ); ?>
	</div>
</section>

<?php
get_footer();
