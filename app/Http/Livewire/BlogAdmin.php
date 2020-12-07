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
    public $searchTerm;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('viewList', Blog::class))
            abort(401);


        $blogs = null;
        if ($this->searchTerm) {
            $searchText = '%' . $this->searchTerm . '%';
            $blogs = Blog::join('users', 'users.id', '=', 'blogs.author_id')->select('blogs.*')
                ->where('title', 'like', $searchText)->orWhere('name', 'like', $searchText)->paginate(10);
        } else
            $blogs = Blog::paginate(10);

        return view('livewire.blogadmin.index')->with('blogs', $blogs);
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
        $this->emit('alert', ['type' => 'success', 'message' => 'Staipsnis sėkmingai ištrintas.']);
    }
}
