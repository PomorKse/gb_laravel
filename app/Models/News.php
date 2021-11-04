<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews()
    {
        //select указывается только, если не все данные, иначе можно опустить
        return \DB::table($this->table)->select(['id', 'title', 'author', 'description'])->get();
    }

    public function getNewsById($id)
    {
        return \DB::table($this->table)->find($id);        
    }


}
