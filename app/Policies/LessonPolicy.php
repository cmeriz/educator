<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    public function owner(User $user, Lesson $lesson){
        return $user->id === $lesson->pensum->user_id;
    }

}
