<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weighting extends Model
{
    use HasFactory;

    // Reverse Activity Type Relationship 1:n
    public function activityType(){
        return $this->belongsTo('App\Models\ActivityType');
    }

    // Reverse Course Relationship 1:n
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

}
