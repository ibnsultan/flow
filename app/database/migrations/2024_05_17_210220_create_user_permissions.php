<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPermissions extends Database
{
    /**
     * Run the migrations.
     * @return void
     * 
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('user_permissions')) :
            static::$capsule::schema()->create('user_permissions', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->integer('permission_id');
                $table->integer('permission_type_id');
                $table->timestamp('created_at')->default(static::$capsule::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(static::$capsule::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
                $table->unique(['user_id', 'permission_id']);
            });
        endif;
        
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('user_permissions');
    }
}
