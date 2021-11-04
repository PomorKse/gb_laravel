<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()//вывод всех новостей
    {
        $news = new News();

        return view('news.index', [
            'newsList' => $news->getNews()
        ]);

    }

    public function show(int $id)//вывод конкретной новости
    {
        $news = new News();

        $news = $news->getNewsById($id) ?? null;
        if (!$news) {
            abort(404);
        }

        return view('news.show', [
            'news' => $news,
            'id'   => $id
        ]);
    }

}
