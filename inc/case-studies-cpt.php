<?php
/**
 * Custom post type: études de cas (Client -> Problème -> Solution -> Résultat).
 * Native meta boxes on purpose — no ACF dependency (cahier des charges: minimum de plugins).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_register_case_study_cpt() {
	register_post_type(
		'cosmartis_case_study',
		array(
			'labels'       => array(
				'name'          => __( 'Études de cas', 'cosmartis' ),
				'singular_name' => __( 'Étude de cas', 'cosmartis' ),
				'add_new_item'  => __( 'Ajouter une étude de cas', 'cosmartis' ),
				'edit_item'     => __( "Modifier l'étude de cas", 'cosmartis' ),
			),
			'public'       => true,
			'has_archive'  => 'etudes-de-cas',
			'rewrite'      => array( 'slug' => 'etudes-de-cas' ),
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		)
	);
}
add_action( 'init', 'cosmartis_register_case_study_cpt' );

function cosmartis_case_study_meta_box() {
	add_meta_box(
		'cosmartis_case_study_details',
		__( 'Détails (Client / Problème / Solution / Résultat)', 'cosmartis' ),
		'cosmartis_render_case_study_meta_box',
		'cosmartis_case_study',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'cosmartis_case_study_meta_box' );

function cosmartis_case_study_fields() {
	return array(
		'client'   => __( 'Client (type de profil, ex : "TPE artisanale, 5 salariés")', 'cosmartis' ),
		'probleme' => __( 'Problème rencontré', 'cosmartis' ),
		'solution' => __( 'Solution mise en place', 'cosmartis' ),
		'resultat' => __( 'Résultat chiffré', 'cosmartis' ),
	);
}

function cosmartis_render_case_study_meta_box( $post ) {
	wp_nonce_field( 'cosmartis_case_study_save', 'cosmartis_case_study_nonce' );
	$is_placeholder = get_post_meta( $post->ID, '_cosmartis_is_placeholder', true );
	?>
	<p>
		<label>
			<input type="checkbox" name="cosmartis_is_placeholder" value="1" <?php checked( $is_placeholder, '1' ); ?> />
			<?php esc_html_e( "Cas générique / illustratif (pas encore un client réel) — un avertissement sera affiché sur le site.", 'cosmartis' ); ?>
		</label>
	</p>
	<?php
	foreach ( cosmartis_case_study_fields() as $key => $label ) {
		$value = get_post_meta( $post->ID, '_cosmartis_' . $key, true );
		printf( '<p><label for="cosmartis_%1$s"><strong>%2$s</strong></label><br />', esc_attr( $key ), esc_html( $label ) );
		printf(
			'<textarea id="cosmartis_%1$s" name="cosmartis_%1$s" rows="3" style="width:100%%;">%2$s</textarea></p>',
			esc_attr( $key ),
			esc_textarea( $value )
		);
	}
}

function cosmartis_save_case_study_meta( $post_id ) {
	if ( ! isset( $_POST['cosmartis_case_study_nonce'] ) || ! wp_verify_nonce( $_POST['cosmartis_case_study_nonce'], 'cosmartis_case_study_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( array_keys( cosmartis_case_study_fields() ) as $key ) {
		$field_name = 'cosmartis_' . $key;
		if ( isset( $_POST[ $field_name ] ) ) {
			update_post_meta( $post_id, '_cosmartis_' . $key, sanitize_textarea_field( wp_unslash( $_POST[ $field_name ] ) ) );
		}
	}

	update_post_meta( $post_id, '_cosmartis_is_placeholder', isset( $_POST['cosmartis_is_placeholder'] ) ? '1' : '' );
}
add_action( 'save_post_cosmartis_case_study', 'cosmartis_save_case_study_meta' );
