<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register_course extends Model
{
    use HasFactory;
    protected $table="register_courses";

    public function courses(){ 
    	return $this->belongsTo(course::class, 'course_id'); 
    }
}
