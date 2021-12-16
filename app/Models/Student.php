<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Reverse Course Relationship 1:n
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    // Grades Relationship 1:n
    public function grades(){
        return $this->hasMany('App\Models\Grade');
    }

    // Attendances Relationship 1:n
    public function attendances(){
        return $this->hasMany('App\Models\Attendance');
    }

}
