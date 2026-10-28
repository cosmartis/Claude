<?php
/**
 * Page introuvable (sans ce gabarit, WordPress se rabat sur index.php et
 * affiche la liste vide du blog à la place d'une erreur 404).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'Erreur 404', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Cette page est introuvable', 'cosmartis' ); ?></h1>
		<p class="lede"><?php esc_html_e( 'Le lien que vous avez suivi est peut-être erroné ou la page a été déplacée.', 'cosmartis' ); ?></p>
		<div class="hero-ctas">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Retour à l\'accueil', 'cosmartis' ); ?></a>
			<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Nous contacter', 'cosmartis' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
