<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyPosts extends Component
{
    public $my_posts;

    public $my_posts_count;

    public function mount(){
        $user_id = Auth::user()->id;
        $this->my_posts = Post::where('user_id', $user_id)->get();
        $this->my_posts_count = Post::where('user_id', $user_id)->count();
    }

    public function render()
    {
        return view('livewire.my-posts', [
            'posts' => $this->my_posts,
            'post_count' => $this->my_posts_count
        ]);
    }
}
