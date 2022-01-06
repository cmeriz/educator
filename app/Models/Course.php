<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $guarded = ['id'];

    use HasFactory;

    const COLORS = [
        'primary', 'secondary', 'red', 'orange', 'blue', 'purple', 'pink'
    ];

    // Students Amount Computed Property
    public function getStudentsAmountAttribute(){

        $students_amount = Student::where('course_id', $this->id)->count();
        return $students_amount;

    }

    // Pensum Progress Computed Property
    public function getProgressAttribute(){
        $lessons_amount = count($this->pensum->lessons);
        $lessons_completed = count($this->lessons);

        $percentage = round(($lessons_completed * 100) / $lessons_amount, 0);

        return $percentage;

    }

    // Reverse User Relationship 1:n
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    // Reverse Pensum Relationship 1:n
    public function pensum(){
        return $this->belongsTo('App\Models\Pensum');
    }

    // Events Relationship 1:n
    public function events(){
        return $this->hasMany('App\Models\Event');
    }

    // Activities Relationship 1:n
    public function activities(){
        return $this->hasMany('App\Models\Activity');
    }

    // Students Relationship 1:n
    public function students(){
        return $this->hasMany('App\Models\Student');
    }

    // Classdays Relationship 1:n
    public function classdays(){
        return $this->hasMany('App\Models\Classday');
    }

    // Lessons Relationship n:n
    public function lessons(){
        return $this->belongsToMany('App\Models\Lesson');
    }

}
