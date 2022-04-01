<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table='comments';

    public function articles(){ 
    	return $this->belongsTo(article::class); 
    }
    public function reply()
    {
    	return $this->hasMany(reply::class);
    }
}
