<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateFileStorages extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('file_storages')) :
            static::$capsule::schema()->create('file_storages', function (Blueprint $table) {
                
                $table->id();
                $table->string('name');
                $table->text('path');
                $table->string('type');
                $table->integer('size')->default(0);
                $table->string('extension');
                $table->string('mime')->nullable();
                $table->integer('user_id');
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
        static::$capsule::schema()->dropIfExists('file_storages');
    }
}
