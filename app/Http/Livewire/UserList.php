<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserList extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('view', User::class))
            abort(401);

        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.user-list', [
            'users' => User::where('name','like', $searchTerm)->paginate(10)
        ]);
    }

    public function delete(User $userToDelete)
    {
        $user = Auth::user();
        if (!$user->can('delete', $userToDelete))
            abort(401);

        $userToDelete->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Vartotojas pašalintas']);
    }
}
