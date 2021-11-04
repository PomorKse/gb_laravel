<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    protected function getData()
    {
        $faker = Factory::create();

        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'domain' => 'https://' . $faker->domainName() . '/'
            ];
        }

        return $data;
    }
}
