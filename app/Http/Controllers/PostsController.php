<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;

use Illuminate\Http\Request;

use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //$posts = Post::all();
        //$posts = Post::orderBy('title', 'desc')->get();

        $posts = DB::select('SELECT * FROM posts');

        return view('posts.index')->with('posts', $posts);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('success', 'Post Created.');
    }


    public function show($id)
    {
        $post = Post::find($id);
        $user = User::find($post->user_id);
        return view('posts.show')->with(['post' => $post, 'user' => $user]);
    }


    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized User');
        }
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated.');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Deleted.');
    }
}
