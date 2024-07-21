<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateModules extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('modules')) :
            static::$capsule::schema()->create('modules', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('description')->nullable();
                $table->string('status')->default('active');
                $table->integer('is_core')->default(0);
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
        static::$capsule::schema()->dropIfExists('modules');
    }
}
