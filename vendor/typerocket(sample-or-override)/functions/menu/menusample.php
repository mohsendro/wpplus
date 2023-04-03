<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Menu: menu-sample - نمونه منو

function register_menu_sample_page() {

	$menu = add_menu_page( 'عنوان برگه', 'عنوان منو', 'manage_options', 'menu_slug', 'register_menu_sample_page_callback', 'dashicons-format-chat' ); 
    $submenu = add_submenu_page( 'menu_slug', 'عنوان برگه', 'عنوان زیرمنو', 'manage_options', 'submenu_slug', 'register_menu_sample_page_callback', 'dashicons-format-chat' ); 
    add_action("load-$menu", 'menu_sample_table_add_options');
    
}
add_action( 'admin_menu', 'register_menu_sample_page' );


// screen option
function menu_sample_table_add_options() {

    $args_page = array(
        'label' => 'تعداد موردها در هر برگه:',
        'default' => 20,
        'option' => 'menu_sample_per_page'
    );

    add_screen_option('per_page', $args_page);

}

// get saved screen meta value
function menu_sample_table_set_option($status, $option, $value) {

    return $value;

}
add_filter('set-screen-option', 'menu_sample_table_set_option', 10, 3);


function register_menu_sample_page_callback() {

    require_once plugin_dir_path(__FILE__) . "../table/forms.php";

}


// $settings = ['capability' => 'administrator'];
// $handler = function() {  

    // return 'hi';  

// };

// $menu_sample = tr_page('menu_sample', 'name', 'درخواست‌ها', $settings, $handler);
// $menu_sample->setHandler(\App\Controllers\SampleController::class);
// $menu_sample->mapAction('GET', 'menu_sample');
// $menu_sample->mapAction('POST', 'create_menu_sample');
// $menu_sample->setView($handler);
// $menu_sample->adminBar('menu_sample_index');
// $menu_sample->setSlug('menu_sample_index');

// $menu_sample->setIcon('dashicons-format-chat');
// $menu_sample->setTitle('عنوان برگه');
// $menu_sample->setMenuTitle('عنوان منو');
// $menu_sample->setSubMenuTitle('عنوان زیرمنو'); // If is sub page