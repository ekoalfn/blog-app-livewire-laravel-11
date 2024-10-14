<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public Post $post;
    public $post_title;
    public $content;
    
    public function mount($post_data){
        $this->post = $post_data;
        $this->post_title = $post_data->post_title;
        $this->content = $post_data->content;
    }

    public function update(){
        $this->validate([
            'post_title' => 'required',
            'content' => 'required'
        ]);

        Post::where('id', $this->post->id)->update([
            'post_title' => $this->post_title,
            'content' => $this->content,
        ]);

        return $this->redirect('/my/posts', navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
