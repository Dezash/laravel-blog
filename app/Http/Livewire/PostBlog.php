<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Support\Facades\Auth;

class PostBlog extends Component
{
    public $title;
    public $body;
    public $category_id;
    public $nature;
    public $keywords = [];
    public $inputKeyword;

    protected $listeners = ['keywordRemoved', 'refreshed' => '$refresh'];

    protected $rules = [
        'title' => 'required|min:3',
        'body' => 'required|min:30',
        'category_id' => 'required|numeric'
    ];

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        if (!$user->can('create', Blog::class))
            abort(401);

        $article = Blog::create([
            'title' => $this->title,
            'body' => $this->body,
            'category_id' => $this->category_id,
            'nature' => $this->nature,
            'author_id' => Auth::id()
        ]);

        foreach($this->keywords as $keyword)
        {
            Keyword::create([
                'name' => $keyword,
                'blog_id' => $article->id
            ]);
        }

        return redirect()->route('blog');
    }

    public function render()
    {
        return view('livewire.blog.create', [
            'categories' => Category::all()
        ]);
    }

    public function addKeyword()
    {
        if ($this->inputKeyword && !empty($this->inputKeyword))
        {
            if(!in_array($this->inputKeyword, $this->keywords))
                array_push($this->keywords, $this->inputKeyword);
            
            $this->inputKeyword = "";   
        }
    }

    public function keywordRemoved($keywordTitle)
    {
        $index = array_search($keywordTitle, $this->keywords);
        if ($index !== false)
        {
            unset($this->keywords[$index]);
            $this->emitSelf('refreshed');
        }
    }
}
