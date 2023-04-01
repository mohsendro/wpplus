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
require_once plugin_dir_path(__FILE__) . 'functions/posttype/advertising.php';
require_once plugin_dir_path(__FILE__) . 'functions/posttype/project.php';
require_once plugin_dir_path(__FILE__) . 'functions/posttype/consultant.php';

// Taxonomies
require_once plugin_dir_path(__FILE__) . 'functions/taxonomy/category.php';
require_once plugin_dir_path(__FILE__) . 'functions/taxonomy/tag.php';
require_once plugin_dir_path(__FILE__) . 'functions/taxonomy/advertising_cat.php';

// Meta Boxes
require_once plugin_dir_path(__FILE__) . 'functions/metabox/user.php';
require_once plugin_dir_path(__FILE__) . 'functions/metabox/page.php';
require_once plugin_dir_path(__FILE__) . 'functions/metabox/post.php';
require_once plugin_dir_path(__FILE__) . 'functions/metabox/advertising.php';
require_once plugin_dir_path(__FILE__) . 'functions/metabox/project.php';
require_once plugin_dir_path(__FILE__) . 'functions/metabox/consultant.php';

// Resource
// require_once plugin_dir_path(__FILE__) . 'functions/metabox/user.php';

// Menu
require_once plugin_dir_path(__FILE__) . 'functions/menu/forms.php';
require_once plugin_dir_path(__FILE__) . 'functions/menu/expert.php';
require_once plugin_dir_path(__FILE__) . 'functions/menu/request.php';
require_once plugin_dir_path(__FILE__) . 'functions/menu/counseling.php';

// Table
// require_once plugin_dir_path(__FILE__) . 'functions/table/forms.php';
// require_once plugin_dir_path(__FILE__) . 'functions/table/expert.php';
// require_once plugin_dir_path(__FILE__) . 'functions/table/request.php';
// require_once plugin_dir_path(__FILE__) . 'functions/table/counseling.php';

// Columns
require_once plugin_dir_path(__FILE__) . 'functions/column/product.php';
require_once plugin_dir_path(__FILE__) . 'functions/column/order.php';
require_once plugin_dir_path(__FILE__) . 'functions/column/line-item.php';

// Roles
require_once plugin_dir_path(__FILE__) . 'functions/role/graphicer.php';
require_once plugin_dir_path(__FILE__) . 'functions/role/photographer.php';