<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionTypes extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('permission_types')) :
            static::$capsule::schema()->create('permission_types', function (Blueprint $table) {
                $table->id();
                $table->string('name', 50);
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
        static::$capsule::schema()->dropIfExists('permission_types');
    }
}
