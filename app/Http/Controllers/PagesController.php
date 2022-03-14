<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;



class PagesController extends Controller
{
    public function index() {
        $posts = Post::all();
        $min = 9999999;
        $postCount = count($posts);

        if(count($posts) > 0) {
            for( $i=0; $i< count($posts); $i++) {
                if($min > strlen($posts[$i]->body)) {
                    $min = strlen($posts[$i]->body);
                }

            }

            if($min > 200) {
                $min = 200;
            }

            if($postCount > 9) {
                $posts = array_slice($posts, 9);
            }
        }

        $title = 'Index Page';
        // return view('pages/index', compact('title'));
        return view('pages/index')->with(['posts' => $posts, 'min'=>$min, 'postCount' => $postCount]);
    }

    public function about() {
        $title = 'About Page';
        return view('pages/about')->with('title', $title);
    }

    public function services() {
        $data = array(
            'title' => 'Service Page',
            'services' => ['html', 'css', 'js']
        );

        return view('pages/services')->with($data);
    }
}
