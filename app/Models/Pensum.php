<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensum extends Model
{

    protected $guarded = ['id'];

    use HasFactory;

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
