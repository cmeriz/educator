<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    const TYPES = ['grade', 'attendance'];

    use HasFactory;

    protected $guarded = ['id'];

    // Reverse Student Relationship 1:n
    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

}
