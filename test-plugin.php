<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
  Plugin Name: Test Plugin
  Description: A simple plugin for Assessment purpose
  Version:     0.1
  Author:      Noman Zahid
  Author URI:  https://github.com/nomanzahid102
 */

if ( ! class_exists( 'TP_Form' ) ) {
	class TP_Form {
		public function __construct() {
			$this->define_constants();
			$this->includes();
		}

		/**
		 * Include all the necessary files
		 *
		 * @since 1.0.0
		 */
		public function includes() {
			require_once TP_PATH . '/inc/classes/tp-activation.php';
			require_once TP_PATH . 'inc/classes/tp-enqueue.php';
			require_once TP_PATH . 'inc/classes/tp-admin.php';
			require_once TP_PATH . 'inc/classes/tp-ajax.php';

		}

		/**
		 * Define necessary constants
		 *
		 * @since 1.0.0
		 */
		public function define_constants() {
			defined( 'TP_PATH' ) or define( 'TP_PATH', plugin_dir_path( __FILE__ ) );
			defined( 'TP_CSS_DIR' ) or define( 'TP_CSS_DIR', plugin_dir_url( __FILE__ ) . 'inc/css' );
			defined( 'TP_JS_DIR' ) or define( 'TP_JS_DIR', plugin_dir_url( __FILE__ ) . 'inc/js' );
			defined( 'TP_VERSION' ) or define( 'TP_VERSION', '0.1' );
			defined( 'TP_TD' ) or define( 'TP_TD', 'posts-like-dislike' );
			defined( 'TP_BASENAME' ) or define( 'TP_BASENAME', plugin_basename( __FILE__ ) );

		}
	}

	new TP_Form();
}



