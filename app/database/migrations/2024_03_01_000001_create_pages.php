<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreatePages extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('pages')) :
            static::$capsule::schema()->create('pages', function (Blueprint $table) {
                
                $table->id();
                $table->string('title', 300);
                $table->string('slug', 300)->unique();
                $table->longText('content');
                $table->string('status', 50)->default('live');
                $table->string('meta_keywords', 300)->nullable();
                $table->string('meta_description', 300)->nullable();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            });
        endif;
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('pages');
    }
}
