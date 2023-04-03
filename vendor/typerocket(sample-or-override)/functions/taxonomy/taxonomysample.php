<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Taxonomy: taxonomy-sample - نمونه تاکسونومی

// general
$taxonomy_sample = tr_taxonomy('taxonomy-sample', 'taxonomy-samples');
$taxonomy_sample->addPostType('post-type-sample');
// $post_type_sample = tr_post_type('post-type-sample');
// $taxonomy_sample->apply($post_type_sample);
$post_type_sample->setModelClass(\App\Models\TaxonomySample::class);
$post_type_sample->setHandler(\App\Controllers\TaxonomySampleController::class);

// labels
$upperPlural = 'تاکسونومی‌ها';
$upperSingular = 'تاکسونومی';
$lowerSingular = 'تاکسونومی';
$lowerPlural = 'تاکسونومی‌ها';
$labels = [
    'add_new_item'               => sprintf( _x( 'افزودن %s', 'taxonomy:taxonomy', 'wpplus' ), $upperSingular),
    'add_or_remove_items'        => sprintf( _x( 'افزودن یا حذف %s', 'taxonomy:taxonomy', 'wpplus' ), $lowerPlural),
    'all_items'                  => sprintf( _x( 'همهٔ %s', 'taxonomy:taxonomy', 'wpplus' ), $upperPlural),
    'back_to_items'              => sprintf( _x( '← برگشت به %s', 'taxonomy:taxonomy', 'wpplus' ), $lowerPlural),
    'choose_from_most_used'      => sprintf( _x( 'انتخاب از بیشترین موارد %s', 'taxonomy:taxonomy', 'wpplus' ), $lowerPlural),
    'edit_item'                  => sprintf( _x( 'ویرایش %s', 'taxonomy:taxonomy', 'wpplus' ), $upperSingular),
    'name'                       => sprintf( _x( '%s', 'taxonomy:taxonomy:taxonomy general name', 'wpplus' ), $upperPlural),
    'menu_name'                  => sprintf( _x( '%s', 'taxonomy:taxonomy:admin menu', 'wpplus' ), $upperPlural),
    'new_item_name'              => sprintf( _x( 'نام %s جدید', 'taxonomy:taxonomy', 'wpplus' ), $upperSingular),
    'no_terms'                   => sprintf( _x( 'بدون %s', 'taxonomy:taxonomy', 'wpplus' ), $lowerPlural),
    'not_found'                  => sprintf( _x( 'هیچ %s یافت نشد.', 'taxonomy:taxonomy', 'wpplus' ), $lowerPlural),
    'parent_item'                => sprintf( _x( '%s مادر', 'taxonomy:taxonomy', 'wpplus' ), $upperSingular),
    'parent_item_colon'          => sprintf( _x( 'مادر %s:', 'taxonomy:taxonomy', 'wpplus' ), $upperSingular),
    'popular_items'              => sprintf( _x( 'محبوب %s', 'taxonomy:taxonomy', 'wpplus' ), $upperPlural),
    'search_items'               => sprintf( _x( 'جستجو %s', 'taxonomy:taxonomy', 'wpplus' ), $upperPlural),
    'separate_items_with_commas' => sprintf( _x( 'جداسازی %s با کاما', 'taxonomy:taxonomy', 'wpplus' ), $lowerPlural),
    'singular_name'              => sprintf( _x( '%s', 'taxonomy:taxonomy:taxonomy singular name', 'wpplus' ), $upperSingular),
    'update_item'                => sprintf( _x( 'بروزرسانی %s', 'taxonomy:taxonomy', 'wpplus' ), $upperSingular),
    'view_item'                  => sprintf( _x( 'نمایش %s', 'taxonomy:taxonomy', 'wpplus' ), $upperSingular),
];
$taxonomy_sample->setLabels($labels);

// slug
$withFront = false;
$taxonomy_sample->setSlug('taxonomy-sample', $withFront);
$taxonomy_sample->setHierarchical();
$taxonomy_sample->setRest('taxonomy-sample');

// single


// archive
$taxonomy_sample->showQuickEdit(true);
$taxonomy_sample->showPostTypeAdminColumn(true);


// meta data