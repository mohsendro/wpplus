<?php
namespace App\Controllers;

use App\Models\Post;
use App\Models\Option;
use TypeRocket\Controllers\WPPostController;
use TypeRocket\Http\Request;

class FronPageController extends WPPostController
{
    public function index(Post $post, Option $option)
    {
        $where_option = [
            [
                'column'   => 'option_name',
                'operator' => '=',
                'value'    => 'posts_per_page'
            ]
        ];
        $option = $option->find()->where($where_option)->select('option_value')->get()->toArray();
        $option = $option[0]['option_value'];

        $where_post = [
            [
                'column'   => 'post_status',
                'operator' => '=',
                'value'    => 'publish'
            ]
        ];
        $whereMeta_post = [
            // [
            //     'column'   => 'gallery_in_site',
            //     'operator' => '=',
            //     'value'    => 1
            // ]
        ];
        $posts = $post->findAll()->with('meta')->whereMeta($whereMeta_post)->where($where_post)->orderBy('id', 'DESC');
        $posts_data = $posts; 
        $posts = $posts->get();

        if( $posts != null || $posts > 0 ) {

            $count = $posts->count();
            $total_page = ceil($count / $option);
            $current_page = 1;
            $posts = $posts_data->take($option, 0)->get();

        } else {

            $posts = [];
            $count = 0;
            $total_page = 0;
            $current_page = 0;
            
        }

        return tr_view('front-page', compact('posts', 'count', 'total_page', 'current_page') );
    }
}