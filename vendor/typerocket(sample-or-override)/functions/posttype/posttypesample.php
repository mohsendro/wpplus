<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Post Type: post-type-sample - نمونه پست تایپ

// general
$post_type_sample = tr_post_type('post-type-sample', 'post-type-samples');
$post_type_sample->setIcon('dashicons-archive');
$post_type_sample->setPosition(5);
$post_type_sample->setModelClass(\App\Models\PsotTypeSample::class);
$post_type_sample->setHandler(\App\Controllers\PsotTypeSampleController::class);

// labels
$upperPlural = 'پست‌تایپ‌ها';
$upperSingular = 'پست‌تایپ';
$lowerSingular = 'پست‌تایپ';
$pluralLower = 'پست‌تایپ‌ها';
$labels = [
    'add_new'               => _x('افزودن پست‌تایپ', 'post_type:posttype', 'wpplus'),
    'all_items'             => sprintf( _x('همهٔ %s', 'post_type:posttype', 'wpplus'), $upperPlural),
    'archives'              => sprintf( _x('%s پست‌تایپ‌ها', 'post_type:posttype', 'wpplus'), $upperSingular),
    'add_new_item'          => sprintf( _x('%s تازه', 'post_type:posttype', 'wpplus'), $upperSingular),
    'attributes'            => sprintf( _x('ویژگی %s', 'post_type:posttype', 'wpplus'), $upperSingular),
    'edit_item'             => sprintf( _x('ویرایش %s', 'post_type:posttype', 'wpplus'), $upperSingular),
    'filter_items_list'     => sprintf( _x('فیلتر %s list %s', 'post_type:posttype', 'wpplus'), $pluralLower, $upperSingular),
    'insert_into_item'      => sprintf( _x('درج در %s', 'post_type:posttype', 'wpplus'), $lowerSingular),
    'item_published'        => sprintf( _x('%s انتشار.', 'post_type:posttype', 'wpplus'), $upperSingular),
    'item_published_privately' => sprintf( _x('%s انتشار خصوصی.', 'wpplus'), $upperSingular),
    'item_updated'          => sprintf( _x('%s بروزرسانی.', 'post_type:posttype', 'wpplus'), $upperSingular),
    'item_reverted_to_draft'=> sprintf( _x('%s انتقال به پیشنویس.', 'post_type:posttype', 'wpplus'), $upperSingular),
    'item_scheduled'        => sprintf( _x('%s برنامه ریزی.', 'post_type:posttype', 'wpplus'), $upperSingular),
    'items_list'            => sprintf( _x('%s لیست', 'post_type:posttype', 'wpplus'), $upperPlural),
    'menu_name'             => sprintf( _x('%s',  'post_type:posttype:admin menu', 'wpplus'), $upperPlural),
    'name'                  => sprintf( _x('%s', 'post_type:posttype:post type general name', 'wpplus'), $upperPlural),
    'name_admin_bar'        => sprintf( _x('%s', 'post_type:posttype:add new from admin bar', 'wpplus'), $upperSingular),
    'items_list_navigation' => sprintf( _x('%s list navigation', 'post_type:posttype', 'wpplus'), $upperPlural),
    'new_item'              => sprintf( _x('جدید %s', 'post_type:posttype', 'wpplus'), $upperSingular),
    'not_found'             => sprintf( _x('هیچ پست‌تایپ یافت نشد', 'post_type:posttype', 'wpplus'), $pluralLower),
    'not_found_in_trash'    => sprintf( _x('یافت نشد %s در سطل زباله', 'post_type:posttype', 'wpplus'), $pluralLower),
    'parent_item_colon'     => sprintf( _x("مادر %s:", 'post_type:posttype', 'wpplus'), $upperPlural),
    'search_items'          => sprintf( _x('جستجو %s', 'post_type:posttype', 'wpplus'), $upperPlural),
    'singular_name'         => sprintf( _x('%s',  'post_type:posttype:post type singular name', 'wpplus'), $upperSingular),
    'uploaded_to_this_item' => sprintf( _x('بارگذاری در %s', 'post_type:posttype', 'wpplus'), $lowerSingular),
    'view_item'             => sprintf( _x('نمایش %s', 'post_type:posttype', 'wpplus'), $upperSingular),
    'view_items'            => sprintf( _x('نمایش %s', 'post_type:posttype', 'wpplus'), $upperPlural),
];
$post_type_sample->setLabels($labels);

// slug
$withFront = false;
$post_type_sample->setSlug('post-type-sample', $withFront);
$post_type_sample->setHierarchical(true);
$post_type_sample->setRest('post-type-sample');
// $post_type_sample->setRootOnly('/{post-type}/{post-name}');

// single
$post_type_sample->forceDisableGutenberg();
$post_type_sample->setSupports(['title', 'thumbnail', 'editor', 'excerpt', 'author', 'comments', 'page-attributes', 'post-formats']);
// $post_type_sample->featureless();

// archive
// $post_type_sample->addColumn('Photo', true, 'Photo3', function($value) {
//     return 'asdsad';
// });

// meta data
// $post_type_sample->setModelClass(\App\Models\PsotTypeSample::class)
//             ->saveTitleAs(function (\App\Models\PsotTypeSample $post_type_sample, \TypeRocket\Http\Request $request) {
//                 return $post_type_sample->data->$request->getDataPost('post_title');
//             });