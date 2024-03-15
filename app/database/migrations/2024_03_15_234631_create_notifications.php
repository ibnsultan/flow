<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifications extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('notifications')) :
            static::$capsule::schema()->create('notifications', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title', 50);
                $table->string('message', 150);
                $table->integer('status', 11)->default(0);
                $table->integer('user_id', 11);
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
        static::$capsule::schema()->dropIfExists('notifications');
    }
}
