<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

/*
CREATE TABLE `pages` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`slug` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`content` LONGTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`status` CHAR(50) NOT NULL DEFAULT 'live' COLLATE 'latin1_swedish_ci',
	`meta_keywords` VARCHAR(300) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`meta_description` VARCHAR(300) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `hyperlink` (`slug`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

*/

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
