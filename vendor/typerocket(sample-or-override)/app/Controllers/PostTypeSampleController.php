<?php
namespace App\Controllers;

use App\Models\PostTypeSample;
use App\Models\Option;
use TypeRocket\Controllers\WPPostController;
use TypeRocket\Http\Request;

class PostTypeSampleController extends WPPostController
{
    protected $modelClass = PostTypeSample::class;   

    public function home(PostTypeSample $post, Option $option)
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

        return tr_view('PostTypeSample', compact('posts', 'count', 'total_page', 'current_page') );
    }

    public function page(PostTypeSample $post, Option $option)
    {
        // tr_redirect()->toURL(home_url('/PostTypeSample/'))->now();
        return include( get_query_template( '404' ) );
    }

    public function archive(PostTypeSample $post, Option $option, $number)
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
            $current_page = intval($number);

            if( (intval($number) <= $total_page) && (intval($number) >= 1) ) {
                $posts = $posts_data->take($option, ($number-1)*$option)->get();
                if( $number == 1 ) {
                    // $posts = $posts->take($option, 1);
                    tr_redirect()->toURL(home_url('/PostTypeSample/'))->now();
                }
            } else {
                // $posts = $posts->take($option, $number);
                // tr_redirect()->toURL(home_url('/PostTypeSample/'))->now();
                return include( get_query_template( '404' ) );
            }

        } else {

            $posts = [];
            $count = 0;
            $total_page = 0;
            $current_page = 0;
            
        } 

        return tr_view('PostTypeSample', compact('posts', 'count', 'total_page', 'current_page') );
    }

    public function single(PostTypeSample $post, $slug)
    {
        $where_post = [
            [
                'column'   => 'post_status',
                'operator' => '=',
                'value'    => 'publish'
            ],
            'AND',
            [
                'column'   => 'post_name',
                'operator' => '=',
                'value'    => $slug
            ]
        ];
        $post = $post->first()->with('meta')->where($where_post)->get();

        if( $post ) {

            return tr_view('single-PostTypeSample', compact('post', 'slug') );

        } else {

            return include( get_query_template( '404' ) );

        }
    }
}