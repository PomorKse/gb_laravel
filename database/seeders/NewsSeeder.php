<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    protected function getData() : array
    {
        $faker = Factory::create();

        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'source_id' => 3,
                'category_id' => 1,
                'title'       => $faker->sentence(mt_rand(3, 10)),
                'author'      => $faker->firstName() . "-" . $faker->lastName(),
                'description' => $faker->text(mt_rand(100, 200)),
            ];
        }

        return $data;
    }

}
