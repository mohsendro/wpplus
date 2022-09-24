<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

if( ! class_exists( 'Gutenberg' ) ) {

	class Gutenberg {

		public function __construct() {

			// $this->wpplus_disable_gutenberg_for_post_type();
			$this->wpplus_version_compare();

		}

		public function wpplus_disable_gutenberg_for_post_type( $is_enabled, $post_type ) {

            if ( 'post' == $post_type || 'page' == $post_type ) { 
                return false;
            }
            return $is_enabled;

        }

        public function wpplus_version_compare() {

            if ( version_compare($GLOBALS['wp_version'], '5.0-beta', '>') ) {
                // WP > 5 beta
                add_filter( 'use_block_editor_for_post_type', array($this, 'wpplus_disable_gutenberg_for_post_type'), 10, 2 );
            } else {
                // WP < 5 beta
                add_filter( 'gutenberg_can_edit_post_type', array($this,'wpplus_disable_gutenberg_for_post_type'), 10, 2 );
            }

        }

	}

}
$gutenberg = new Gutenberg;