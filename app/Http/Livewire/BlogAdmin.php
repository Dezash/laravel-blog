<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class BlogAdmin extends Component
{
    public $blogs, $title, $body, $blog_id;
    public $isOpen = 0;

    public function render()
    {
        $this->blogs = Blog::all();
        return view('livewire.blogadmin.index');
    }

    public function create()
    {
        // $this->resetInputFields();
        // $this->openModal();
        return redirect()->route('postblog');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
        $this->blog_id = '';
    }

    public function store()
    {
        // $this->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        // Blog::updateOrCreate(['id' => $this->blog_id], [
        //     'title' => $this->title,
        //     'body' => $this->body
        // ]);

        // session()->flash(
        //     'message',
        //     $this->blog_id ? 'Straipsnis sėkmingai atnaujintas.' : 'Staipsnis sėkmingai sukurtas.'
        // );

        // $this->closeModal();
        // $this->resetInputFields();
    }

    public function edit($id)
    {
        // $blog = Blog::findOrFail($id);
        // $this->blog_id = $id;
        // $this->title = $blog->title;
        // $this->body = $blog->body;

        // $this->openModal();

        return redirect()->route('editblog', ['id' => $id]);
    }

    public function delete($id)
    {
        Blog::find($id)->delete();
        session()->flash('message', 'Staipsnis sėkmingai ištrintas.');
    }
}
