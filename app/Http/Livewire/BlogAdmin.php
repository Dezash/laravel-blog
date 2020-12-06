<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogAdmin extends Component
{
    public $blogs, $title, $body, $blog_id;
    public $isOpen = 0;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('viewList', Blog::class))
            abort(401);
        
        $this->blogs = Blog::all();
        return view('livewire.blogadmin.index');
    }

    public function create()
    {
        return redirect()->route('postblog');
    }

    public function edit($id)
    {
        return redirect()->route('editblog', ['id' => $id]);
    }

    public function delete($id)
    {
        $blog = Blog::find($id);

        $user = Auth::user();
        if (!$user->can('delete', $blog))
            abort(401);

        $blog->delete();
        session()->flash('message', 'Staipsnis sėkmingai ištrintas.');
    }
}
