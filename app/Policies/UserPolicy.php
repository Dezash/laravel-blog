<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function view($user)
    {
        return false;
    }

    public function delete($user)
    {
        return false;
    }
}
