<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Message;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class BlogQueue extends Component
{
    use WithPagination;

    public $messageContent, $blog_id;
    public $isOpen = 0;
    public $isApproved = false;
    public $searchTerm;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('viewQueue', Blog::class))
            abort(401);

        $blogs = null;
        if ($this->searchTerm)
        {
            $searchText = '%' . $this->searchTerm . '%';
            $blogs = Blog::join('users', 'users.id', '=', 'blogs.author_id')->select('blogs.*')->where('state', 'SUBMITTED')
                ->where('title','like', $searchText)->orWhere('state', 'SUBMITTED')->where('name','like', $searchText)->paginate(10);
        }
        else
            $blogs = Blog::where('state', 'SUBMITTED')->paginate(10);
        
        return view('livewire.queue.index', [
            'blogs' => $blogs
        ]);
    }

    public function approve($id, $title)
    {
        $this->isApproved = true;
        $this->blog_id = $id;
        $this->messageContent = 'Sveiki, jūsų straipsnis "' . $title . '" buvo patvirtintas.';
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function edit($id)
    {
        return redirect()->route('editblog', ['id' => $id]);
    }

    public function reject($id, $title)
    {
        $this->isApproved = false;
        $this->blog_id = $id;
        $this->messageContent = 'Sveiki, jūsų straipsnis "' . $title . '" buvo atmestas.';
        $this->openModal();
    }

    public function confirm()
    {
        $blog = Blog::find($this->blog_id);

        $user = Auth::user();
        if (!$user->can('confirm', $blog))
            abort(401);

        $message = Message::create([
            'user_id' => $blog->author->id,
            'sender_id' => $user->id,
            'message' => $this->messageContent
        ]);

        if ($this->isApproved)
        {
            $blog->update([
                'reviewer_id' => Auth::id(),
                'state' => 'APPROVED'
            ]);
            session()->flash('message', 'Staipsnis patvirtintas.');
        }
        else
        {
            $blog->update([
                'reviewer_id' => Auth::id(),
                'state' => 'REJECTED'
            ]);
            session()->flash('message', 'Staipsnis atmestas.');
        }

        $this->closeModal();
    }
}
