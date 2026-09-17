<?php
/**
 * Gabarit par défaut : blog (liste d'articles) et filet de sécurité.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero" style="padding-top:56px;padding-bottom:32px;">
	<div class="container">
		<span class="eyebrow"><?php esc_html_e( 'Blog', 'cosmartis' ); ?></span>
		<h1><?php esc_html_e( 'Ressources & conseils automatisation', 'cosmartis' ); ?></h1>
	</div>
</section>

<section>
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="grid grid-2">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'cosmartis-case-thumb' ); ?></a>
						<?php endif; ?>
						<h2><a href="<?php the_permalink(); ?>" style="text-decoration:none;color:inherit;"><?php the_title(); ?></a></h2>
						<p class="text-muted"><?php echo esc_html( get_the_excerpt() ); ?></p>
						<a class="btn btn-secondary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Lire l\'article', 'cosmartis' ); ?></a>
					</article>
					<?php
				endwhile;
				?>
			</div>
			<div style="margin-top:32px;">
				<?php the_posts_pagination(); ?>
			</div>
		<?php else : ?>
			<p class="text-muted"><?php esc_html_e( 'Aucun article publié pour le moment.', 'cosmartis' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
