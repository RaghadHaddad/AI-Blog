<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'category_id',
        'title',
        'image',
        'section',
        'overview',
        'reading_time',
        'publicate_date',
    ];

    public function contentnews()
    {
        return $this->hasMany(News_content::class);
    }

    public function like_news()
    {
        return $this->hasMany(likes::class);
    }

    public function comment_news()
    {
        return $this->hasMany(comment::class);
    }

    public function share_news()
    {
        return $this->hasMany(share::class);
    }

    public function view_news()
    {
        return $this->hasMany(view::class);
    }



    public function author()
    {
        return $this->belongsTo(Authors::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
