<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogArticles extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('blog_articles')) :
            static::$capsule::schema()->create('blog_articles', function (Blueprint $table) {
                $table->id();
                $table->string('title', 300);
                $table->longText('content');
                $table->text('cover')->nullable();
                $table->integer('author');
                $table->integer('category');
                $table->json('tags')->nullable();
                $table->integer('views')->default(0);
                $table->integer('likes')->default(0);
                $table->timestamps();
            });
        endif;
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('blog_articles');
    }
}
