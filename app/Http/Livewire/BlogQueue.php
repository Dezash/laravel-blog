<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogQueue extends Component
{
    public $messageContent, $blog_id;
    public $isOpen = 0;
    public $isApproved = false;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('viewQueue', Blog::class))
            abort(401);

        return view('livewire.queue.index', [
            'blogs' => Blog::where('state', 'SUBMITTED')->get()
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
