<?php
/**
* @deprecated : Typerocket Custom Code
*/

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

tr_resource_pages('Company', 'شرکت ها');
tr_resource_pages('Job', 'آگهی ها');
tr_resource_pages('Resume', 'رزومه ها');
tr_resource_pages('ToJob', 'درخواست ها');


register_theme_directory( dirname( __FILE__ ) . '/resources/themes/' );