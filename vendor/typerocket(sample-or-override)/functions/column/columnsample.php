<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Column: column-sample - نمونه ستون

// Add Column
function columns_post_type($columns) {

    $columns['name'] = 'نام ستون';
    return $columns;

}
add_filter('manage_{$post->post_type}_posts_columns', 'columns_post_type');

// Add Data To Column
function columns_post_type_data($column, $post_id) {

    if ($column == 'name') {
        
        return ;

	}

}
add_action('manage_{$post->post_type}_posts_custom_column' , 'columns_post_type_data', 10, 2);
