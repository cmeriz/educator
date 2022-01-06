<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Fullname Computed Property
    public function getFullnameAttribute(){
        return $this->lastname . ' ' . $this->firstname;
    }

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

    public function getAverageAttendance(){
        $average = Average::where('student_id' , $this->id)
                          ->where('type', Average::TYPES[1])
                          ->first();
        return $average;
    }

    public function getOrderedStudentAttendances($student_id){
        $attendances = Attendance::where('attendances.student_id', $student_id)
                                 ->join('classdays', 'classdays.id', '=', 'attendances.classday_id')
                                 ->select('attendances.id', 'attendances.attended', 'attendances.classday_id', 'attendances.student_id', 'classdays.date')
                                 ->orderBy('classdays.date')
                                 ->get();
        return $attendances;
    }

}
