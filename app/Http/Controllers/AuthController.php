<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()//вывод представления auth
    {
        return view('auth');
    }
}
