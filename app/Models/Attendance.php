<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Reverse Classday Relationship 1:n
    public function classday(){
        return $this->belongsTo('App\Models\Classday');
    }

    // Reverse Student Relationship 1:n
    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

}
