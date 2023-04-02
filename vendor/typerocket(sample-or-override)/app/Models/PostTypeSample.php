<?php
namespace App\Models;

use TypeRocket\Models\WPPost;

class PostTypeSample extends WPPost
{
    public const POST_TYPE = 'posttypesample';

    public function posttypesample_taxonomy()
    {
        return $this->belongsToTaxonomy(TaxonomySample::class, TaxonomySample::TAXONOMY);
    }
}