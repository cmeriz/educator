<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensum extends Model
{

    protected $guarded = ['id'];

    use HasFactory;

    public function getCoursesCountAttribute(){
        return Course::where('pensum_id', $this->id)->count();
    }

    public function getLessonsCountAttribute(){
        return Lesson::where('pensum_id', $this->id)->count();
    }

    // Reverse User Relationship 1:n
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Lessons Relationship 1:n
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }

    // Courses Relationship 1:n
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }


}
