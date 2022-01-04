<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;

    const HOMEWORK = 1;
    const LESSON = 2;
    const EXAM = 3;

    // Weightings Relationship 1:n
    public function weightings(){
        return $this->hasMany('App\Models\Weighting');
    }

    // Activities Relationship 1:n
    public function activities(){
        return $this->hasMany('App\Models\Activity');
    }

}
