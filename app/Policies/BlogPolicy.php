<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use App\Models\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public $staffTeam;

    public function __construct()
    {
        $this->staffTeam = Team::find(1);
    }

    public function before($user, $ability)
    {
        if ($user->belongsToTeam($this->staffTeam) && $user->hasTeamRole($this->staffTeam, 'admin')) 
        {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function viewList(User $user)
    {
        return $user->belongsToTeam($this->staffTeam) && $user->hasTeamRole($this->staffTeam, 'editor');
    }

    public function viewQueue(User $user)
    {
        return $user->belongsToTeam($this->staffTeam) && $user->hasTeamRole($this->staffTeam, 'editor');
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Blog $blog)
    {
        return $user->belongsToTeam($this->staffTeam) && $user->hasTeamRole($this->staffTeam, 'editor');
    }

    public function delete(User $user, Blog $blog)
    {
        return false;
    }

    public function confirm(User $user, Blog $blog)
    {
        return $user->belongsToTeam($this->staffTeam) && $user->hasTeamRole($this->staffTeam, 'editor');
    }
}
