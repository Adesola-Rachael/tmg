<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $table='courses';

    public function fonts()
    {
    	return $this->belongsTo(fonts::class, 'font_id');
    }

    public function register_course()
    {
    	return $this->hasMany(register_course::class);
    }
}
