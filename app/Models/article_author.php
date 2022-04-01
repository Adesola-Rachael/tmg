<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article_author extends Model
{
    use HasFactory;
    protected $table ='article_authors';

      public function articles()
    {
    	return 	$this->hasMany(article::class);
    }
}
