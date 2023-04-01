<?php
namespace App\Controllers;

use App\Models\Page;
use App\Models\Option;
use TypeRocket\Controllers\WPPostController;
use TypeRocket\Http\Request;

class PageController extends WPPostController
{
    protected $modelClass = Page::class;
}
