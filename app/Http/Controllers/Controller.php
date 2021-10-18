<?php

namespace App\Http\Controllers;

use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $news = [
        [
            'id' => 0,
            //'category_id' => 0,
            'title' => 'News #1',
            'author' => '',
            'image' => null,
            'descrirtion' => '',

        ]
    ];

    public function getNews() : array//используем стороннюю библиотеку
    {
        $faker = FakerFactory::create();
        $data = [];
        for ($i=0; $i < 9; $i++) { 
            $data[] = [
                'id' => $i,
                'title' => $faker->realText(50),
                'author' => $faker->userName(),
                'image' => null,
                'description' => $faker->sentence(10),
            ];
        }
        return $data;
    }
}
