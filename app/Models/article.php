<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $table="articles";

    public function comments()
    {
    	return $this->hasMany(comment::class);
    }
    public function cat()
    {
    	return $this->belongsTo(article_category::class, 'article_category_id')->withDefault();
    }
    public function author()
    {
    	return $this->belongsTo(article_author::class);
    }
    // public function category()
    // {
    //     return $this->belongsTo(article_author::class);
    // }
    // public function author()
    // {
    //     return $this->belongsTo(articleCategory::class);
    // }
}
