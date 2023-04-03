<?php
/**
* @deprecated : Typerocket Custom Code
*/

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Register New Directory Active Theme
if ( ! defined( 'TYPEROCKET_DIR_PATH' ) ) define( 'TYPEROCKET_DIR_PATH' , plugin_dir_path( __FILE__ ) ) ;
if ( ! defined( 'TYPEROCKET_DIR_URL' ) ) define( 'TYPEROCKET_DIR_URL' , plugin_dir_url( __FILE__ ) ) ;


// Register New Directory WPPlus Theme
register_theme_directory( dirname( __FILE__ ) . '/resources/themes/' );


// Snippets
require_once plugin_dir_path(__FILE__) . 'functions/snippets/theme.php';
require_once plugin_dir_path(__FILE__) . 'functions/snippets/wp-rewrite-rules.php';
require_once plugin_dir_path(__FILE__) . 'functions/snippets/optimize.php';
require_once plugin_dir_path(__FILE__) . 'functions/snippets/enqueue.php';

// Post Types
require_once plugin_dir_path(__FILE__) . 'functions/posttype/page.php';
require_once plugin_dir_path(__FILE__) . 'functions/posttype/post.php';
// require_once plugin_dir_path(__FILE__) . 'functions/posttype/posttypesample.php';

// Taxonomies
// require_once plugin_dir_path(__FILE__) . 'functions/taxonomy/category.php';
// require_once plugin_dir_path(__FILE__) . 'functions/taxonomy/tag.php';
// require_once plugin_dir_path(__FILE__) . 'functions/taxonomy/taxonomysample.php';

// Meta Boxes
// require_once plugin_dir_path(__FILE__) . 'functions/metabox/metaboxsample.php';

// Resource
// require_once plugin_dir_path(__FILE__) . 'functions/resource/resourcesample.php';

// Menu
// require_once plugin_dir_path(__FILE__) . 'functions/menu/menusample.php';

// Table
// require_once plugin_dir_path(__FILE__) . 'functions/table/tablesample.php';

// Columns
// require_once plugin_dir_path(__FILE__) . 'functions/column/columnsample.php';

// Roles
// require_once plugin_dir_path(__FILE__) . 'functions/role/rolesample.php';

// Ajax Handlers
// require_once plugin_dir_path(__FILE__) . 'functions/ajax/handlesample.php';