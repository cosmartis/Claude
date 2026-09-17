<?php
/**
 * Gabarit générique pour les pages de contenu statique
 * (à propos, mentions légales, politique de confidentialité, cas d'usage/secteurs...).
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
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<section>
		<div class="container" style="max-width:760px;">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
