<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'TP_Activation' ) ) {
	class TP_Activation {
		/**
		 * Includes all the activation tasks
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			// get the template
			add_filter( 'page_template', array( $this, 'form_template' ) );
			// add the template select
			add_filter( 'theme_page_templates', array( $this, 'form_select' ), 10, 4 );

		}

		function form_template( $page_template ) {
			if ( get_page_template_slug() == 'templates/form-template.php' ) {
				$page_template = TP_PATH . 'templates/form-template.php';
			}

			return $page_template;
		}

		function form_select( $post_templates, $wp_theme, $post, $post_type ) {
			$post_templates['templates/form-template.php'] = __( 'Form Template', 'form-template' );

			return $post_templates;
		}

	}

	new TP_Activation();
}

