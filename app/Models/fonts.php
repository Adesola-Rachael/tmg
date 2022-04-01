<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fonts extends Model
{
    use HasFactory;
    protected $table='fonts';

     public function courses()
    {
    	return 	$this->hasMany(course::class);
    }
    public function service()
    {
    	return 	$this->hasMany(service::class);
    }
     public function benefit()
    {
        return  $this->hasMany(benefit::class);
    }
}
