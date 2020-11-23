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
        if ($this->isApproved)
        {
            Blog::find($this->blog_id)->update([
                'reviewer_id' => Auth::id(),
                'state' => 'APPROVED'
            ]);
            session()->flash('message', 'Staipsnis patvirtintas.');
        }
        else
        {
            Blog::find($this->blog_id)->update([
                'reviewer_id' => Auth::id(),
                'state' => 'REJECTED'
            ]);
            session()->flash('message', 'Staipsnis atmestas.');
        }

        $this->closeModal();
    }
}
