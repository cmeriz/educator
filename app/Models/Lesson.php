<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $guarded = ['id'];

    use HasFactory;

    // Completed Computed Attribute
    public function getCompletedAttribute($course_id){
        return $this->courses->contains($course_id);
    }

    // Reverse Pensum Relationship 1:n
    public function pensum(){
        return $this->belongsTo('App\Models\Pensum');
    }

    // Courses Relationship n:n
    public function courses(){
        return $this->belongsToMany('App\Models\Course');
    }


}
