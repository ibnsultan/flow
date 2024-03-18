<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogCategories extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('blog_categories')) :
            static::$capsule::schema()->create('blog_categories', function (Blueprint $table) {
                
                $table->id();
                $table->string('name', 50);
                $table->string('description', 160)->nullable();
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
        static::$capsule::schema()->dropIfExists('blog_categories');
    }
}
