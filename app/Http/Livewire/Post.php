<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class Post extends Component
{
    public $post;
    public $previous;
    public $next;

    public function mount($id)
    {
        $this->post = Blog::findOrFail($id);
        $this->previous = Blog::where('id', '<', $this->post->id)->orderByDesc('id')->first();
        $this->next = Blog::where('id', '>', $this->post->id)->orderBy('id')->first();
    }

    public function render()
    {
        return view('livewire.blog.post', [
            'post' => $this->post,
            'previous' => $this->previous,
            'next' => $this->next
        ]);
    }
}
