<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class Podcast extends Model
{
    use HasFactory;
    protected $hidden = ['author_id'];
    protected $table = 'podcasts';
    protected $fillable = [
        'author_id',
        'title',
        'rate',
    ];
    public $timestamps = false;

    public function podcast_details()
    {
        return $this->hasOne(PodcastDetailes::class);
    }

    public function author()
    {
        return $this->belongsTo(Authors::class);
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['author_name'] = $this->author->author_name;
        return $array;
    }
}
