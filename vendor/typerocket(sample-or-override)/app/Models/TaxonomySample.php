<?php
namespace App\Models;

use TypeRocket\Models\WPTerm;

class TaxonomySample extends WPTerm
{
    public const TAXONOMY = 'taxonomysample';

    // public function posts()
    // {
    //     return $this->belongsToPost(PostTypeSample::class);
    // }

    public function posts()
    {
        // $model = '\App\Models\PostTypeSample';
        return $this->belongsToPost(PostTypeSample::class, function($posts) {
            $where = [
                [
                    'column'   => 'post_status',
                    'operator' => '=',
                    'value'    => 'publish'
                ]
            ];
            $posts->where($where)->orderBy('id', 'DESC');
        });
    }
}