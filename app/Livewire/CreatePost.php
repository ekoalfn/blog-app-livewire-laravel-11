<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $post_title = '';
    public $content = '';

    public function store(){
        $this->validate([
            'post_title' => 'required',
            'content' => 'required'
        ]);

        Post::create([
            'post_title' => $this->post_title,
            'content' => $this->content,
            'user_id' => Auth::user()->id,
        ]);

        $this->post_title = '';
        $this->content = '';

        session()->flash('message', 'The post was successfully created!');
        $this->redirect('/my/posts', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
