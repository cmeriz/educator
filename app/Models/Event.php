<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const DAYS = [
        'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
    ];

    // Reverse User Relationship 1:n
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Reverse Course Relationship 1:n
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

}
