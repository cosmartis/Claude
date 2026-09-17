<?php
/**
 * Article de blog individuel.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="hero" style="padding-top:56px;padding-bottom:32px;">
		<div class="container">
			<span class="eyebrow"><?php echo esc_html( get_the_date() ); ?></span>
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<section>
		<div class="container" style="max-width:760px;">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large', array( 'style' => 'border-radius:10px;margin-bottom:32px;' ) ); ?>
			<?php endif; ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="cta-final">
		<div class="container" style="text-align:center;">
			<h2><?php esc_html_e( 'Envie d\'automatiser ce qui vous ralentit ?', 'cosmartis' ); ?></h2>
			<?php get_template_part( 'template-parts/calendly-cta', null, array( 'label' => __( 'Réserver mon diagnostic gratuit', 'cosmartis' ), 'style' => 'primary' ) ); ?>
		</div>
	</section>
	<?php
endwhile;

get_footer();
