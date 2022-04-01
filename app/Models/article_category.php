<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article_category extends Model
{
    use HasFactory;
     protected $table ='article_categories';

      public function articles()
    {
    	return 	$this->hasMany(article::class, 'article_category_id');
    }
}
