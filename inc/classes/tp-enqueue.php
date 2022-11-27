<?php

function dd( $value ) {
	echo "<pre>";
	print_r( $value );
	echo "</pre>";
	die;
}

//dd(TP_CSS_DIR);
if ( ! class_exists( 'TP_Enqueue' ) ) {

	class TP_Enqueue {

		/**
		 * Includes all  JS and CSS enqueues
		 *
		 * @since 0.1
		 */
		function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) );
		}

		function register_frontend_assets() {

			wp_enqueue_style( 'tp-frontend', TP_CSS_DIR . '/tp-frontend.css', array(), TP_VERSION );
			wp_enqueue_script( 'tp-frontend', TP_JS_DIR . '/tp-frondend.js', array( 'jquery' ), TP_VERSION );
			$ajax_nonce = wp_create_nonce( 'tp-ajax-nonce' );
			$js_object  = array( 'admin_ajax_url' => admin_url( 'admin-ajax.php' ), 'admin_ajax_nonce' => $ajax_nonce );
			wp_localize_script( 'tp-frontend', 'tp_js_object', $js_object );
		}


	}

	new TP_Enqueue();
}