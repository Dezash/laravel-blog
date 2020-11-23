<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blog.index', [
            'blogs' => Blog::where('state', 'APPROVED')->paginate(5),
            'categories' => Category::all()
        ]);
    }
}
