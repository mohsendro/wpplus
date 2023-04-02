<?php
namespace App\Controllers;

use App\Models\TaxonomySample;
use App\Models\Option;
use TypeRocket\Controllers\WPTermController;
use TypeRocket\Http\Request;

class TaxonomySampleController extends WPTermController
{
    protected $modelClass = TaxonomySample::class;

    public function home(TaxonomySample $taxonomy, Option $option, $param) {

    }

    public function category(TaxonomySample $taxonomy, Option $option, $taxonomy_name, $number = 1)
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

        $where_taxonomy = [
            [
                'column'   => 'slug',
                'operator' => '=',
                'value'    => $taxonomy_name
            ]
        ];
        $taxonomy = $taxonomy->first()->where($where_taxonomy)->get();

        if( $taxonomy != null || $taxonomy > 0 )  {

            $posts = $taxonomy->posts();
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
                        // tr_redirect()->toURL(home_url('/TaxonomySample/' . $uncategorized->slug))->now();
                    // }
                } else {
                    // $posts = $posts->take($option, $number);
                    // tr_redirect()->toURL(home_url('/TaxonomySample/'))->now();
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
        
        return tr_view('TaxonomySample', compact('taxonomy', 'posts', 'count', 'total_page', 'current_page') );
    }

    public function archive(TaxonomySample $taxonomy, Option $option, $taxonomy_name, $number)
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

        $where_taxonomy = [
            [
                'column'   => 'slug',
                'operator' => '=',
                'value'    => $taxonomy_name
            ]
        ];
        $taxonomy = $taxonomy->first()->where($where_taxonomy)->get();

        if( $taxonomy != null || $taxonomy > 0 )  {

            $posts = $taxonomy->posts();
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
                        tr_redirect()->toURL(home_url('/TaxonomySample/' . $taxonomy->slug))->now();
                    }
                } else {
                    // $posts = $posts->take($option, $number);
                    // tr_redirect()->toURL(home_url('/TaxonomySample/'))->now();
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

        return tr_view('TaxonomySample', compact('taxonomy', 'posts', 'count', 'total_page', 'current_page') );
    }
}