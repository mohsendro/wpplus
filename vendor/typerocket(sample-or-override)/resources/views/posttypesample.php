<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

?>

<?php get_header(); ?>

<?php the_content(); ?>

<?php
    require TYPEROCKET_DIR_PATH . '/functions/snippets/pagination.php';
    // pagination_post($count, $total_page, 2, $current_page);
    insertPagination(home_url('posttypesample/page'), $current_page, $total_page, true);
?>

<?php get_footer(); ?>