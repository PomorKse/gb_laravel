<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedbacks')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create();

        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'login'       => $faker->firstName() . "-" . $faker->lastName(),
                'feedback' => $faker->text(mt_rand(10, 200))
            ];
        }

        return $data;
    }
}
