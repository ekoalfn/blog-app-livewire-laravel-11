<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    use WithFileUploads;

    public $post_title = '';
    public $content = '';
    public $photo = '';

    public function store(){
        $this->validate([
            'post_title' => 'required',
            'content' => 'required',
            'photo' => 'required'
        ]);

        $photo_name = md5($this->photo . microtime()).'.'.$this->photo->extension();
        $this->photo->storeAs('images', $photo_name);

        Post::create([
            'post_title' => $this->post_title,
            'content' => $this->content,
            'photo' => $photo_name,
            'user_id' => Auth::user()->id,
        ]);

        $this->photo->storeAs('photos', $photo_name);
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
