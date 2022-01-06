<?php

namespace App\Policies;

use App\Models\Pensum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PensumPolicy
{
    use HandlesAuthorization;

    public function pensumOwner(User $user, Pensum $pensum){
        return $user->id === $pensum->user_id;
    }
}
