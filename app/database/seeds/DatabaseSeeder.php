<?php

namespace App\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Lang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed your application's database.
     * @return void
     */
    public function run(): array
    {
        // get all classes in the seeder directory
        $classes = array_diff(scandir(__DIR__), ['.', '..', basename(__FILE__)]);

        $seederClasses = array_map(function ($class) {
            return __NAMESPACE__ . '\\' . pathinfo($class, PATHINFO_FILENAME);
        }, $classes);

        $ignoredSeeders = [
            # ExampleSeed::class,
        ];

        return array_diff($seederClasses, $ignoredSeeders);
    }
}
