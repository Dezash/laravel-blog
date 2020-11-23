<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chip extends Component
{
    public $title;

    public function mount($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.chip');
    }
}
