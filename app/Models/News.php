<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'source_id', 'category_id', 'title', 'author', 'status', 'description', 'image'
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function source() : BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

}
