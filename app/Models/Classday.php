<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classday extends Model
{
    use HasFactory;

    // Reverse Course Relationship 1:n
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    // Attendances Relationship 1:n
    public function attendances(){
        return $this->hasMany('App\Models\Attendance');
    }


}
