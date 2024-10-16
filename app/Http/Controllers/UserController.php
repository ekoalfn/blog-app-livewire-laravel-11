<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $logged_user = Auth::user();
        return view('user.home-page', compact('logged_user'));
    }

    public function posts(){
        $logged_user = Auth::user();
        return view('user.my-posts', compact('logged_user'));
    }

    public function create_post(){
        $logged_user = Auth::user();
        return view('user.create-post', compact('logged_user'));
    }

    public function edit_post($post_id){
        $post_data = Post::find($post_id);
        $logged_user = Auth::user();
        return view('user.edit-post', compact('logged_user', 'post_data'));
    }

    public function post_detail($post_id){
        $logged_user = Auth::user();
        $post_data = Post::join('users','users.id','=','posts.user_id')
                        ->where('posts.id',$post_id)
                        ->first(['users.name','posts.*']);

        return view('user.post-detail',compact('logged_user','post_data'));
    }

    public function profile(){
        $logged_user = Auth::user();
        return view('user.user-profile',compact('logged_user'));
    }
}
