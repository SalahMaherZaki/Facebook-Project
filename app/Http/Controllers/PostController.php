<?php

namespace VoiceBook\Http\Controllers;

use VoiceBook\Post;
use VoiceBook\Comment;
use VoiceBook\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Input as Input;
use Image;
class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('home',['posts'=> Auth::user()->posts()->latest()->get()]);
        $posts = Post::all();
        $comments = Comment::all();
        return view('home', ['posts' => $posts, 'comments' => $comments ]);
    }

    /**
     * Store a new post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
            'url'  => 'image',
        ]);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'body' => $request->body,

        ]);


        // if ($request->hasFile('url')) {
        //         $url = $request->url;
        //         $filename = time() . '.' . $url->getClientOriginalExtension();
        //         Image::make($url)->save(public_path('/images/uploads/' . $filename));
        //         $post->url = $filename;                
        //     }
        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $post->save();
        }
        
        return back();
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
