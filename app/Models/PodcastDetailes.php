<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastDetailes extends Model
{

    //public $timestamps = false;

    use HasFactory;
    protected $table = 'podcast_details';
    public $timestamps = false;
    protected $fillable = [
        'podcast_id',
        'podcast_description',
        'total_episodes',
        'average_length',
        'release_frequency'
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id');
    }
}
