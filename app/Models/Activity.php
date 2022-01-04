<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Reverse Activity Type Relationship 1:n
    public function activityType(){
        return $this->belongsTo('App\Models\ActivityType');
    }

    // Reverse Course Relationship 1:n
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    // Grades Relationship 1:n
    public function grades(){
        return $this->hasMany('App\Models\Grade');
    }

}
