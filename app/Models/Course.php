<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const COLORS = [
        'primary', 'secondary', 'red', 'orange', 'blue', 'purple', 'pink'
    ];

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

    // Weightings Relationship 1:n
    public function weightings(){
        return $this->hasMany('App\Models\Weighting');
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

}
