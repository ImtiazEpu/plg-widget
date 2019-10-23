<?php
	/*
	Plugin Name: SourceCypher Demo Widget
	Plugin URL:
	Description:
	Version: 1.0.0
	Author: SourceCypher
	Author URI: https://sourcecypher.net
	License: GPLv2 or later
	Text Domain: sourcecypher
	Domain Path: /languages/
	*/
	require_once dirname( __FILE__ ) . '/widgets/class.demowidget.php';
	
	// Adds widget: SourceCypher Social
	class Sourcecypher_Demo_Widget {
		/**
		 * Sourcecypher_Demo_Widget constructor.
		 */
		public function __construct() {
			add_action( "admin_enqueue_scripts", [ $this, 'widgets_asset' ] );
			add_action( 'widgets_init', [ $this, 'register_Sourcecyphervisual_Widget' ] );
		}
		
		
		/**
		 * @param $hook
		 */
		public function widgets_asset( $hook ) {
			if ( 'widgets.php' == $hook || is_active_widget( '', '', 'Demo_Widget' ) ) {
				wp_enqueue_script( 'sc-widgets-js', plugins_url( '/asset/js/widgets.js', __FILE__ ),
					array( 'jquery', 'wp-tinymce' ),
					time(), true );
			}
		}
		
		/**
		 *
		 */
		public function register_Sourcecyphervisual_Widget() {
			register_widget( 'DemoWidget' );
		}
		
		
	}
	
	new Sourcecypher_Demo_Widget();
	
	
	