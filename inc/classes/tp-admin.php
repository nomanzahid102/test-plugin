<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'TP_Admin' ) ) {

	class TP_Admin {
		function __construct() {

			/**
			 * Register Custom posts Type
			 */
			add_action( 'init', array( $this, 'Website_post_type' ) );

			/**
			 * Remove Custom posts Publish Meta
			 */
			add_action( 'admin_menu', array( $this, 'remove_publish_meta' ) );

			/**
			 * URl Source Meta Box
			 */
			add_action( 'add_meta_boxes', array( $this, 'render_url_source_metabox' ) );


			add_action( 'rest_api_init', array( $this, 'get_custom_post_meta_data' ) );


		}

		function Website_post_type() {

			$labels   = array(
				'name'               => _x( 'Websites', 'Post type general name' ),
				'singular_name'      => _x( 'Website', 'Post type singular name' ),
				'add_new'            => _x( 'Add New', 'Website' ),
				'add_new_item'       => __( 'Add new Website' ),
				'edit_item'          => __( 'Edit Website' ),
				'new_item'           => __( 'New Website' ),
				'all_item'           => __( 'All Website' ),
				'view_item'          => __( 'View Website' ),
				'search_item'        => __( 'Search Website' ),
				'not_found'          => __( 'no Website Found' ),
				'not_found_in_trash' => __( 'No Website Found in Trash' ),
				'parent_item_colon'  => '',
				'menu_name'          => 'Websites'
			);
			$supports = array();
			$args     = array(
				'labels'                => $labels,
				'description'           => 'Display Websites',
				'public'                => true,
				'show_in_rest'          => true,
				'menu_position'         => 5,
				'supports'              => array( 'title' ),
				'has_archive'           => true,
				'rest_base'             => 'websites',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
				'capabilities'          => array(
					'create_posts' => 'do_not_allow',
					// Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
				),
				'map_meta_cap'          => true,

			);
			register_post_type( 'Websites', $args );

		}


		function remove_publish_meta() {
			remove_meta_box( 'submitdiv', 'websites', 'normal' );
		}


		function render_url_source_metabox() {
			add_meta_box( 'custom-textbox', __( 'Custom Textbox', 'wk-custom-meta-box' ), array(
				$this,
				'wk_custom_meta_box_content'
			), 'websites', 'normal', 'default' );
		}


		function wk_custom_meta_box_content() {
			global $post;
			$meta = get_post_meta( $post->ID, 'source-data', true );
			include( TP_PATH . '/inc/views/boxes/tp-metabox.php' );
		}

		function get_custom_post_meta_data() {
			register_rest_field( 'websites', 'source-data', array(
				'get_callback' => function ( $object ) {
					return get_post_meta( $object['id'], 'source-data', true );
				},
				'schema'       => null,
			) );
		}

	}

	new TP_Admin();
}
