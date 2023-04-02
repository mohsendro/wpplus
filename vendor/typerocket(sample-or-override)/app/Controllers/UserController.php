<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Option;
use TypeRocket\Controllers\WPUserController;
use TypeRocket\Http\Request;

class UserController extends WPUserController
{
    protected $modelClass = User::class;

    public function home(User $user, Option $option)
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

        $where_user = [
            // [
            //     'column'   => 'post_status',
            //     'operator' => '=',
            //     'value'    => 'publish'
            // ]
        ];
        $whereMeta_user = [
            // [
            //     'column'   => 'gallery_in_site',
            //     'operator' => '=',
            //     'value'    => 1
            // ]
        ];
        $users = $user->findAll()->with('meta')->whereMeta($whereMeta_user)->where($where_user)->orderBy('id', 'DESC');
        $users_data = $users; 
        $users = $users->get();

        if( $users != null || $users > 0 ) {

            $count = $users->count();
            $total_page = ceil($count / $option);
            $current_page = 1;
            $users = $users_data->take($option, 0)->get();

        } else {

            $users = [];
            $count = 0;
            $total_page = 0;
            $current_page = 0;
            
        }  

        return tr_view('author', compact('users', 'count', 'total_page', 'current_page') );
    }

    public function page(User $user, Option $option)
    {
        // tr_redirect()->toURL(home_url('/author/'))->now();
        return include( get_query_template( '404' ) );
    }

    public function archive(User $user, Option $option, $number)
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

        $where_user = [
            // [
            //     'column'   => 'post_status',
            //     'operator' => '=',
            //     'value'    => 'publish'
            // ]
        ];
        $whereMeta_user = [
            // [
            //     'column'   => 'gallery_in_site',
            //     'operator' => '=',
            //     'value'    => 1
            // ]
        ];
        $users = $user->findAll()->with('meta')->whereMeta($whereMeta_user)->where($where_user)->orderBy('id', 'DESC');
        $users_data = $users; 
        $users = $users->get();

        if( $users != null || $users > 0 ) {

            $count = $users->count();
            $total_page = ceil($count / $option);
            $current_page = intval($number);

            if( (intval($number) <= $total_page) && (intval($number) >= 1) ) {
                $users = $users_data->take($option, ($number-1)*$option)->get();
                if( $number == 1 ) {
                    // $users = $users->take($option, 1);
                    tr_redirect()->toURL(home_url('/author/'))->now();
                }
            } else {
                // $users = $users->take($option, $number);
                // tr_redirect()->toURL(home_url('/author/'))->now();
                return include( get_query_template( '404' ) );
            }

        } else {

            $users = [];
            $count = 0;
            $total_page = 0;
            $current_page = 0;
            
        } 

        return tr_view('author', compact('users', 'count', 'total_page', 'current_page') );
    }

    public function single(User $user, $slug)
    {
        $where_user = [
            [
                'column'   => 'user_login',
                'operator' => '=',
                'value'    => $slug
            ],
            // 'AND',
            // [
            //     'column'   => 'post_name',
            //     'operator' => '=',
            //     'value'    => $slug
            // ]
        ];
        $user = $user->first()->with('meta')->where($where_user)->get();

        if( $user ) {

            return tr_view('single-author', compact('user', 'slug') );

        } else {

            return include( get_query_template( '404' ) );

        }
    }
}