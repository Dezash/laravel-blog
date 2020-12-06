<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Blogs extends Component
{
    use WithPagination;

    public $cat;
    public $categoryName;

    protected $queryString = ['cat'];

    public function mount()
    {
        if ($this->cat)
        {
            $category = Category::where('name', $this->cat)->first();
            if ($category)
            {
                $this->categoryName = $category->name;
            }
        }
    }

    public function render()
    {
        $blogs = null;
        if ($this->categoryName)
            $blogs = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')->where('state', 'APPROVED')->where('categories.name', $this->categoryName)->orderByDesc('blogs.id')->paginate(5);
        else
            $blogs = Blog::where('state', 'APPROVED')->orderByDesc('id')->paginate(5);

        foreach($blogs as $blog)
        {
            $blog->body = strlen($blog->body) > 500 ? substr($blog->body, 0, 500)."..." : $blog->body;
        }

        return view('livewire.blog.index', [
            'blogs' => $blogs,
            'categories' => Category::all()
        ]);
    }
}
