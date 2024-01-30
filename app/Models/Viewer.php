<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;
    protected $table = 'viewers';
    protected $fillable = [
        'author_id',
        'title',
        'details',
        'video'
    ];
    public $timestamps = false;
    public function auther()
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }
}
