<?php
namespace App\Controllers;

use App\Models\Comment;
use App\Models\Option;
use TypeRocket\Controllers\WPCommentController;
use TypeRocket\Http\Request;

class CommentController extends WPCommentController
{
    protected $modelClass = Comment::class;
}