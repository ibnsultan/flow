<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncements extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('announcements')) :
            static::$capsule::schema()->create('announcements', function (Blueprint $table) {
                $table->id();
                $table->string('title', 100);
                $table->string('description', 300);
                $table->text('cover')->nullable();
                $table->text('link')->nullable();
                $table->json('receipients');            
                $table->timestamp('created_at')->default(static::$capsule::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(static::$capsule::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            });
        endif;

    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('announcements');
    }
}
