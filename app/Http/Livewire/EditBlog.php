<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Support\Facades\Auth;

class EditBlog extends Component
{
    public $blog;
    public $title;
    public $body;
    public $category_id;
    public $nature;
    public $keywords = [];
    public $inputKeyword;

    protected $rules = [
        'title' => 'required|min:3',
        'body' => 'required|min:30',
        'category_id' => 'required|numeric'
    ];

    protected $listeners = ['keywordRemoved', 'refreshed' => '$refresh'];

    public function save()
    {
        $user = Auth::user();
        if (!$user->can('update', $this->blog))
            abort(401);

        $this->validate();

        $this->blog->update([
            'title' => $this->title,
            'body' => $this->body,
            'category_id' => $this->category_id,
            'nature' => $this->nature
        ]);

        foreach ($this->keywords as $keyword) {
            $exists = false;
            foreach ($this->blog->keywords as $blogKeyword) {
                if ($blogKeyword->name == $keyword) {
                    $exists = true;
                    break;
                }
            }

            if ($exists)
                continue;

            Keyword::create([
                'name' => $keyword,
                'blog_id' => $this->blog->id
            ]);
        }

        foreach ($this->blog->keywords as $blogKeyword) {
            $exists = false;
            foreach ($this->keywords as $keyword) {
                if ($blogKeyword->name == $keyword) {
                    $exists = true;
                    break;
                }
            }

            if (!$exists) {
                $blogKeyword->delete();
            }
        }

        return redirect()->route('blog');
    }

    public function mount($id)
    {
        $this->blog = Blog::findOrFail($id);
        $this->title = $this->blog->title;
        $this->body = $this->blog->body;
        $this->category_id = $this->blog->category->id;
        $this->nature = $this->blog->nature;
        foreach ($this->blog->keywords as $keyword) {
            array_push($this->keywords, $keyword->name);
        }
    }

    public function render()
    {
        return view('livewire.blog.edit', [
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
