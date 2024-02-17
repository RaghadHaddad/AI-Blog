<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastDetailes extends Model
{
    use HasFactory;
    protected $table = 'podcast_detailes';
    public $timestamps = false;
    protected $fillable = [
        'podcast_id',
        'job_description',
        'total_episodes',
        'average_length',
        'release_frequency'
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id');
    }
}
