<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $route_parameters = array();
        if(Auth::check()) {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $my_posts = $user->posts;
            $mypost_min_len = 9999999;
            $my_post_count = count($my_posts);

            if(count($my_posts) > 0) {
                for( $i=0; $i< count($my_posts); $i++) {
                    if($mypost_min_len > strlen($my_posts[$i]->body)) {
                        $mypost_min_len = strlen($my_posts[$i]->body);
                    }
                }

                if($mypost_min_len > 200) {
                    $mypost_min_len = 200;
                }

                if($my_post_count > 9) {
                    // $my_posts = array_slice($my_posts, 9);
                    // for( $i=0; $i< count($my_posts); $i++) {
                        $my_posts = $my_posts->take(9);
                    //}
                }
            }

            $route_parameters['my_posts'] = $my_posts;
            $route_parameters['mypost_min_len'] = $mypost_min_len;
            $route_parameters['my_post_count'] = $my_post_count;

            //return view('pages/index')->with(['my_posts' => $my_posts, 'mypost_min_len'=> $mypost_min_len, 'my_post_count' => $my_post_count]);
        }

        $all_posts = Post::all();
        $all_post_min_len = 9999999;
        $all_post_count = count($all_posts);

        if(count($all_posts) > 0) {
            for( $i=0; $i< count($all_posts); $i++) {
                if($all_post_min_len > strlen($all_posts[$i]->body)) {
                    $all_post_min_len = strlen($all_posts[$i]->body);
                }

            }

            if($all_post_min_len > 200) {
                $all_post_min_len = 200;
            }

            if($all_post_count > 9) {
                $all_posts = $all_posts->take(9);
            }
        }

        $route_parameters['all_posts'] = $all_posts;
        $route_parameters['all_post_min_len'] = $all_post_min_len;
        $route_parameters['all_post_count'] = $all_post_count;

        //$title = 'Index Page';
        // return view('pages/index', compact('title'));
        return view('pages/index')->with($route_parameters);
    }
}
