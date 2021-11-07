<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(News $news)//вывод всех новостей
    {
        return view('news.index', [
            'newsList' => $news->paginate(9)
        ]);

    }

    public function show(News $news)//вывод конкретной новости
    {
        return view('news.show', [
            'news' => $news,
            ]);
    }

}
