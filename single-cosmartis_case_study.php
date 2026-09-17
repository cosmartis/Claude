<?php
/**
 * Étude de cas individuelle.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	$is_placeholder = get_post_meta( get_the_ID(), '_cosmartis_is_placeholder', true );
	?>
	<section class="hero" style="padding-top:56px;padding-bottom:32px;">
		<div class="container">
			<span class="eyebrow"><?php esc_html_e( 'Étude de cas', 'cosmartis' ); ?></span>
			<h1><?php the_title(); ?></h1>
			<?php if ( $is_placeholder ) : ?>
				<p class="case-study-disclaimer"><?php esc_html_e( 'Cas illustratif à titre d\'exemple — pas encore un client réel.', 'cosmartis' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section>
		<div class="container" style="max-width:760px;">
			<div class="grid" style="gap:20px;">
				<div class="card">
					<span class="eyebrow"><?php esc_html_e( 'Client', 'cosmartis' ); ?></span>
					<p><?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_client', true ) ); ?></p>
				</div>
				<div class="card">
					<span class="eyebrow"><?php esc_html_e( 'Problème', 'cosmartis' ); ?></span>
					<p><?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_probleme', true ) ); ?></p>
				</div>
				<div class="card">
					<span class="eyebrow"><?php esc_html_e( 'Solution', 'cosmartis' ); ?></span>
					<p><?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_solution', true ) ); ?></p>
				</div>
				<div class="card">
					<span class="eyebrow"><?php esc_html_e( 'Résultat', 'cosmartis' ); ?></span>
					<p><?php echo esc_html( get_post_meta( get_the_ID(), '_cosmartis_resultat', true ) ); ?></p>
				</div>
			</div>
			<?php if ( get_the_content() ) : ?>
				<div class="entry-content" style="margin-top:32px;">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="cta-final">
		<div class="container" style="text-align:center;">
			<h2><?php esc_html_e( 'Un besoin similaire ?', 'cosmartis' ); ?></h2>
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ), 'style' => 'primary' ) ); ?>
		</div>
	</section>
	<?php
endwhile;

get_footer();
