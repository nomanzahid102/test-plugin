<?php

if ( ! class_exists( 'TP_Ajax' ) ) {

	class TP_Ajax {

		function __construct() {
			add_action( 'wp_ajax_tp_post_ajax_action', array( $this, 'tp_post_action' ) );
			add_action( 'wp_ajax_nopriv_tp_post_ajax_action', array( $this, 'tp_post_action' ) );
		}

		function tp_post_action() {
			if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'tp-ajax-nonce' ) ) {
				parse_str( $_POST['data'], $postarray );
				$args = array(
					'post_title' => $postarray['user-name'],
					'post_status' => 'publish',
					'post_type' => 'websites'
				);
				if ( post_exists( $postarray['user-name'], '', '', 'websites' ) ) {
					$response_array = array( 'success' => true, 'message' => 'Name Already Exist' );
				} else {
					$post = wp_insert_post( $args, true );
					if ( $post ) {
						$url_source = file_get_contents( $postarray['website-url'] );
						update_post_meta( $post, 'source-data', $url_source );
						$response_array = array( 'success' => true, 'message' => 'Data Added Successfully' );

					} else {
						$response_array = array(
							'success' => true,
							'message' => 'Some Thing Went Wrong please Try again'
						);
					}
				}

				echo json_encode( $response_array );
				die();
			}
		}

	}

	new TP_Ajax();
}
