<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

function wpplus_enqueue_scripts() {

	wp_register_style( 'sample-style', TYPEROCKET_DIR_URL . 'resources/assets/css/sample.css', false, '1.0.0' );
	wp_register_script( 'sample-script', TYPEROCKET_DIR_URL . 'resources/assets/js/sample.js', false, '1.0.0' );
	wp_register_script( 'ajax-sample-script', TYPEROCKET_DIR_URL . 'resources/assets/js/ajax.js', false, '1.0.0' );
	// wp_enqueue_style( 'sample-style' );
	// wp_enqueue_script( 'sample-script' );
    // wp_enqueue_script( 'ajax-sample-script' );


    // Ajax Handler
    // wp_localize_script(
    //     'ajax-sample-script', 'sample_ajax_localize_obj', array(
    //         'ajax_url' => admin_url( 'admin-ajax.php' ),
    //         'the_nonce' => wp_create_nonce('sample_name_form_nonce') 
    //     )
    // );

}
add_action( 'wp_enqueue_scripts', 'wpplus_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'wpplus_enqueue_scripts' );
add_action( 'enqueue_embed_scripts', 'wpplus_enqueue_scripts' );