<?php
namespace App\Controllers;

use App\Models\Option;
use TypeRocket\Controllers\WPOptionController;
use TypeRocket\Http\Request;

class OptionController extends WPOptionController
{
    protected $modelClass = Option::class;
}