<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// WP Ajax: ajax-handle - نمونه هندل

function sample_ajax_handle_function() {

    check_ajax_referer( 'sample_name_form_nonce', 'submitted_nonce' );  // This function will die if submitted_nonce is not correct.

    $model = new App\Models\Models();
    $model->column = sanitize_text_field($_POST['element']);
    $model->save(); 

    $response = array(
        'success'   => 'درخواست با موفقیت ارسال شد',
    );

    wp_send_json_success( $response, 200 );
    wp_send_json_error();
    wp_die();

}
// add_action( 'wp_ajax_nopriv_sample_ajax_handle', 'sample_ajax_handle_function' );
add_action( 'wp_ajax_sample_ajax_handle', 'sample_ajax_handle_function' );  // For logged in users.