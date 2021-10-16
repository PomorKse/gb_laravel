<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    public function index()//вывод представления приветствие
    {
        return view('greet');
    }
}
