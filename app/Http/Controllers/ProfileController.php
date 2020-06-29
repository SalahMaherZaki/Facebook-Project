<?php

namespace VoiceBook\Http\Controllers;
use VoiceBook\User;
use VoiceBook\Post;
use Auth;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
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

    /**
     * Show the user profile.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $posts = Post::where('user_id', Post::user());
        $posts = Auth::user()->posts()->latest()->get();

        return view('profile')->with(['user' => $user ,'posts' => $posts]);
        
    }

    public function profile()
    {
        $user = auth()->user()->username;
        return redirect('/'.$user);
    }

/*
    public function edit($id)
    {
      return view('profile.edit')
    }
*/

    /**
     * Update profile avatar.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    // public function updateAvatar(Request $request)
    // {
    //     if ($request->hasFile('avatar')) {
    //         $avatar = $request->avatar;
    //         $filename = time() . '.' . $avatar->extension();
    //         Image::make($avatar)->resize(250, 250)->save(public_path('/uploads/avatars/' . $filename));

    //         $user = Auth::user();
    //         $user->avatar = $filename;
    //         $user->save();
    //     }

    //     return view('profile')->with('user', Auth::user());
    // }
}
