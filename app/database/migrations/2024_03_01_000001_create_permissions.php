<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissions extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('permissions')) :
            static::$capsule::schema()->create('permissions', function (Blueprint $table) {
                $table->id();
                $table->string('name', 191);
                $table->string('description', 191)->nullable();
                $table->integer('module_id')->unsigned();
                $table->boolean('is_primary')->default(0);
                $table->json('scopes')->nullable();
                $table->timestamp('created_at')->default(static::$capsule::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(static::$capsule::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
                $table->unique(['name', 'module_id']);
            });
        endif;
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('permissions');
    }
}
