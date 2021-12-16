<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    // Reverse Student Relationship 1:n
    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    // Reverse Activity Relationship 1:n
    public function activity(){
        return $this->belongsTo('App\Models\Activity');
    }

}
