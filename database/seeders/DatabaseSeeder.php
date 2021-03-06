<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            SourceSeeder::class,
            NewsSeeder::class,
            FeedbackSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
