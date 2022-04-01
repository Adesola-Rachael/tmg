<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $table='services';

    public function fonts()
    {
    	return $this->belongsTo(fonts::class, 'font_id');
    }
}
