<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_content extends Model
{
    use HasFactory;
    protected $fillable = [
        'news_id',
        'title',
        'description',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }


}
