<?php
/**
 * REST endpoint for the qualification form.
 *
 * Le webhook n8n n'est pas encore fourni par Bouchra (voir cosmartis-sync.md).
 * L'URL est stockée dans l'option "cosmartis_n8n_webhook_url" (réglable dans
 * Personnaliser > Intégrations). Tant qu'elle est vide, les soumissions sont
 * conservées comme brouillon de prospect (post type interne) pour ne rien
 * perdre, et un e-mail de secours est envoyé à l'admin.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cosmartis_register_qualification_route() {
	register_rest_route(
		'cosmartis/v1',
		'/qualification',
		array(
			'methods'             => 'POST',
			'callback'            => 'cosmartis_handle_qualification_submission',
			'permission_callback' => '__return_true',
			'args'                => array(
				'answers' => array(
					'required' => true,
				),
			),
		)
	);
}
add_action( 'rest_api_init', 'cosmartis_register_qualification_route' );

function cosmartis_handle_qualification_submission( WP_REST_Request $request ) {
	$params = $request->get_json_params();

	if ( empty( $params ) || empty( $params['answers'] ) || ! is_array( $params['answers'] ) ) {
		return new WP_REST_Response( array( 'success' => false, 'message' => __( 'Réponses manquantes.', 'cosmartis' ) ), 400 );
	}

	$answers = array();
	foreach ( $params['answers'] as $key => $value ) {
		$key = sanitize_key( $key );
		if ( ! is_scalar( $value ) ) {
			$answers[ $key ] = '';
		} elseif ( 'message' === $key ) {
			$answers[ $key ] = sanitize_textarea_field( $value );
		} else {
			$answers[ $key ] = sanitize_text_field( $value );
		}
	}

	$score = isset( $params['score'] ) ? absint( $params['score'] ) : 0;

	$lead = array(
		'first_name' => isset( $answers['prenom'] ) ? $answers['prenom'] : '',
		'email'      => isset( $answers['email'] ) && is_email( $answers['email'] ) ? $answers['email'] : '',
		'phone'      => isset( $answers['telephone'] ) ? $answers['telephone'] : '',
		'company'    => isset( $answers['entreprise'] ) ? $answers['entreprise'] : '',
		'message'    => isset( $answers['message'] ) ? $answers['message'] : '',
		'answers'    => $answers,
		'score'      => $score,
		'source'     => 'site-cosmartis-diagnostic',
		'submitted'  => current_time( 'mysql' ),
	);

	if ( empty( $lead['email'] ) ) {
		return new WP_REST_Response( array( 'success' => false, 'message' => __( 'E-mail invalide.', 'cosmartis' ) ), 400 );
	}

	$webhook_url = trim( (string) get_option( 'cosmartis_n8n_webhook_url', '' ) );
	$forwarded   = false;

	if ( $webhook_url ) {
		$response  = wp_remote_post(
			$webhook_url,
			array(
				'timeout' => 8,
				'headers' => array( 'Content-Type' => 'application/json' ),
				'body'    => wp_json_encode( $lead ),
			)
		);
		$forwarded = ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) < 400;
	}

	// Filet de sécurité : rien n'est perdu tant que le webhook n8n -> Notion n'est pas branché.
	if ( ! $forwarded ) {
		cosmartis_store_lead_fallback( $lead );
		wp_mail(
			'contact@cosmartis.com',
			__( '[Cosmartis] Nouveau prospect (diagnostic) — à relayer manuellement vers Notion', 'cosmartis' ),
			"Le webhook n8n n'est pas encore configuré (ou a échoué). Détails du prospect :\n\n" . wp_json_encode( $lead, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE )
		);
	}

	return new WP_REST_Response(
		array(
			'success'   => true,
			'forwarded' => $forwarded,
		),
		200
	);
}

function cosmartis_store_lead_fallback( $lead ) {
	$post_id = wp_insert_post(
		array(
			'post_type'   => 'cosmartis_lead_fallback',
			'post_status' => 'private',
			'post_title'  => sprintf( '%s <%s> — score %d', $lead['first_name'], $lead['email'], $lead['score'] ),
		)
	);

	if ( $post_id && ! is_wp_error( $post_id ) ) {
		update_post_meta( $post_id, '_cosmartis_lead_payload', wp_json_encode( $lead ) );
	}
}

function cosmartis_register_lead_fallback_cpt() {
	register_post_type(
		'cosmartis_lead_fallback',
		array(
			'label'        => __( 'Prospects (non relayés)', 'cosmartis' ),
			'public'       => false,
			'show_ui'      => true,
			'show_in_menu' => 'edit.php?post_type=cosmartis_case_study',
			'supports'     => array( 'title' ),
		)
	);
}
add_action( 'init', 'cosmartis_register_lead_fallback_cpt' );
