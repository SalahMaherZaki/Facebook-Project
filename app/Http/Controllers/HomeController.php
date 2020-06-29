<?php

namespace VoiceBook\Http\Controllers;
use VoiceBook\User;
use VoiceBook\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->get();
        
        return view('home', ['user' => Auth::user(), 'posts' => $posts ]);


    }
}
