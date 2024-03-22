<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateApiActivities extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('api_activities')) :
            static::$capsule::schema()->create('api_activities', function (Blueprint $table) {
                $table->id();
                $table->string('handler', 300);
                $table->string('origin', 100);
                $table->json('payload')->nullable();
                $table->string('apiID', 100);
                $table->string('status', 100);
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
        static::$capsule::schema()->dropIfExists('api_activities');
    }
}
