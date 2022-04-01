<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('article_id');
            $table->string('article_title');
            $table->text('article_desc');
            $table->string('image')->default('blog_default.jpg');
            $table->bigInteger('article_category_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table->timestamps();
            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('article_authors')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
