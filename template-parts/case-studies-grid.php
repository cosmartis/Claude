<?php
/**
 * Grid of études de cas. Reads from the cosmartis_case_study CPT; falls back
 * to generic illustrative examples (clearly labelled) until real clients
 * are entered in wp-admin — jamais présentés comme réels (cf. cahier des charges).
 *
 * Usage: get_template_part( 'template-parts/case-studies-grid', null, array( 'limit' => 3 ) );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$limit = isset( $args['limit'] ) ? absint( $args['limit'] ) : -1;

$query = new WP_Query(
	array(
		'post_type'      => 'cosmartis_case_study',
		'post_status'    => 'publish',
		'posts_per_page' => $limit,
	)
);

$generic_fallback = array(
	array(
		'client'   => __( 'TPE artisanale, 5 salariés', 'cosmartis' ),
		'probleme' => __( 'Devis envoyés par e-mail, relances oubliées faute de temps.', 'cosmartis' ),
		'solution' => __( 'Relances automatiques après envoi de devis + tableau de suivi en temps réel.', 'cosmartis' ),
		'resultat' => __( '+40 % de devis relancés dans la semaine.', 'cosmartis' ),
	),
	array(
		'client'   => __( 'Cabinet de conseil, indépendant', 'cosmartis' ),
		'probleme' => __( 'Prise de rendez-vous par échanges d\'e-mails multiples.', 'cosmartis' ),
		'solution' => __( 'Réservation en ligne avec qualification automatique du prospect.', 'cosmartis' ),
		'resultat' => __( 'Temps de prise de RDV divisé par 3.', 'cosmartis' ),
	),
	array(
		'client'   => __( 'Institut de bien-être, commerce local', 'cosmartis' ),
		'probleme' => __( 'Rappels de rendez-vous faits à la main, oublis fréquents.', 'cosmartis' ),
		'solution' => __( 'Confirmation et rappel automatiques par SMS/e-mail.', 'cosmartis' ),
		'resultat' => __( '-25 % de rendez-vous manqués.', 'cosmartis' ),
	),
);

if ( $query->have_posts() ) : ?>
	<div class="grid grid-2">
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			$is_placeholder = get_post_meta( get_the_ID(), '_cosmartis_is_placeholder', true );
			?>
			<article class="case-study-card">
				<?php if ( $is_placeholder ) : ?>
					<span class="label"><?php esc_html_e( 'Cas illustratif — pas un client réel', 'cosmartis' ); ?></span>
				<?php endif; ?>
				<h3><?php the_title(); ?></h3>
				<p><strong><?php esc_html_e( 'Client :', 'cosmartis' ); ?></strong> <?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_client', true ) ); ?></p>
				<p><strong><?php esc_html_e( 'Problème :', 'cosmartis' ); ?></strong> <?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_probleme', true ) ); ?></p>
				<p><strong><?php esc_html_e( 'Solution :', 'cosmartis' ); ?></strong> <?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_solution', true ) ); ?></p>
				<p><strong><?php esc_html_e( 'Résultat :', 'cosmartis' ); ?></strong> <?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_resultat', true ) ); ?></p>
			</article>
		<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<div class="grid grid-2">
		<?php foreach ( array_slice( $generic_fallback, 0, $limit > 0 ? $limit : count( $generic_fallback ) ) as $case ) : ?>
			<article class="case-study-card">
				<span class="label"><?php esc_html_e( 'Cas illustratif — pas un client réel', 'cosmartis' ); ?></span>
				<p><strong><?php esc_html_e( 'Client :', 'cosmartis' ); ?></strong> <?php echo esc_html( $case['client'] ); ?></p>
				<p><strong><?php esc_html_e( 'Problème :', 'cosmartis' ); ?></strong> <?php echo esc_html( $case['probleme'] ); ?></p>
				<p><strong><?php esc_html_e( 'Solution :', 'cosmartis' ); ?></strong> <?php echo esc_html( $case['solution'] ); ?></p>
				<p><strong><?php esc_html_e( 'Résultat :', 'cosmartis' ); ?></strong> <?php echo esc_html( $case['resultat'] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
	<p class="case-study-disclaimer"><?php esc_html_e( 'Exemples illustratifs en attendant nos premiers clients réels — aucun de ces cas n\'est une entreprise existante.', 'cosmartis' ); ?></p>
<?php endif; ?>
