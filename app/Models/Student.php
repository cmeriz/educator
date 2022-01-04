<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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

    // Averages Relationship 1:n
    public function averages(){
        return $this->hasMany('App\Models\Average');
    }

    public function getActivityGrade($activity_id){
        $grade = Grade::where('student_id', $this->id)
                      ->where('activity_id', $activity_id)
                      ->first();
        return $grade;
    }

    public function getAverageGrade(){
        $average = Average::where('student_id' , $this->id)
                          ->where('type', Average::TYPES[0])
                          ->first();
        return $average;
    }

}
