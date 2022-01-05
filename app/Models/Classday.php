<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classday extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Formatted Date Computed Property
    public function getFormattedDateAttribute(){
        $date = date_create($this->date);
        return date_format($date,"d/m/y");
    }

    // Reverse Course Relationship 1:n
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    // Attendances Relationship 1:n
    public function attendances(){
        return $this->hasMany('App\Models\Attendance');
    }


}
