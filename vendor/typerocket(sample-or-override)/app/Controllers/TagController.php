<?php
namespace App\Controllers;

use App\Models\Tag;
use App\Models\Option;
use TypeRocket\Controllers\WPTermController;
use TypeRocket\Http\Request;

class TagController extends WPTermController
{
    protected $modelClass = Tag::class;

    public function home(Tag $tag, Option $option, $param) {

    }

    public function tag(Tag $tag, Option $option, $tag_name, $number = 1)
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

        $where_tag = [
            [
                'column'   => 'slug',
                'operator' => '=',
                'value'    => $tag_name
            ]
        ];
        $tag = $tag->first()->where($where_tag)->get();

        if( $tag != null || $tag > 0 )  {

            $posts = $tag->posts();
            $posts_data = $posts;
            $posts = $posts->get();

            if( $posts != null || $posts > 0 ) {

                $count = $posts->count();        
                $total_page = ceil($count / $option);
                $current_page = intval($number);
                // $posts = $posts_data->take($option, 0)->get();

                if( (intval($number) <= $total_page) && (intval($number) >= 1) ) {
                    $posts = $posts_data->take($option, ($number-1)*$option)->get();
                    // if( $number == 1 ) {
                        // tr_redirect()->toURL(home_url('/tag/' . $tag->slug))->now();
                    // }
                } else {
                    // $posts = $posts->take($option, $number);
                    // tr_redirect()->toURL(home_url('/blog/'))->now();
                    return include( get_query_template( '404' ) );
                }

            } else {

                $posts = [];
                $count = 0;
                $total_page = 0;
                $current_page = 0;

            }                   

        } else {

            return include( get_query_template( '404' ) );

        }

        return tr_view('tag', compact('tag', 'posts', 'count', 'total_page', 'current_page') );
    }

    public function archive(Tag $tag, Option $option, $tag_name, $number)
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

        $where_tag = [
            [
                'column'   => 'slug',
                'operator' => '=',
                'value'    => $tag_name
            ]
        ];
        $tag = $tag->first()->where($where_tag)->get();

        if( $tag != null || $tag > 0 )  {

            $posts = $tag->posts();
            $posts_data = $posts;
            $posts = $posts->get();

            if( $posts != null || $posts > 0 ) {

                $count = $posts->count();        
                $total_page = ceil($count / $option);
                $current_page = intval($number);
                // $posts = $posts_data->take($option, 0)->get();

                if( (intval($number) <= $total_page) && (intval($number) >= 1) ) {
                    $posts = $posts_data->take($option, ($number-1)*$option)->get();
                    if( $number == 1 ) {
                        tr_redirect()->toURL(home_url('/tag/' . $tag->slug))->now();
                    }
                } else {
                    // $posts = $posts->take($option, $number);
                    // tr_redirect()->toURL(home_url('/blog/'))->now();
                    return include( get_query_template( '404' ) );
                }
                
            } else {

                $posts = [];
                $count = 0;
                $total_page = 0;
                $current_page = 0;

            }

        } else {

            return include( get_query_template( '404' ) );

        } 

        return tr_view('tag', compact('tag', 'posts', 'count', 'total_page', 'current_page') );
    }
}