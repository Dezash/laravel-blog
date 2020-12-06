<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class BlogAdmin extends Component
{
    use WithPagination;

    public $title, $body, $blog_id;
    public $isOpen = 0;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('viewList', Blog::class))
            abort(401);
        
        return view('livewire.blogadmin.index')->with('blogs', Blog::paginate(10));
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
