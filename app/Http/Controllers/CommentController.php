<?php

namespace VoiceBook\Http\Controllers;
use Illuminate\Http\Request;
use VoiceBook\Comment;
use VoiceBook\Post;
use Auth;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function store(Post $post)
    {
        Comment::create([ "user_id" => auth()->user()->id,
                        "post_id" => $post->id,
                        "body" => request("body")
                        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
