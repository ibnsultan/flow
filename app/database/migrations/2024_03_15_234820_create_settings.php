<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateSettings extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('settings')) :
            static::$capsule::schema()->create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('key', 255);
                $table->text('value')->nullable();
            });
        endif;
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('settings');
    }
}
