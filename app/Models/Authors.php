<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Authors extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = [
        'author_name',
        'author_image',
        'country',
        'permission'
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class);
    }

    public function viewers()
    {
        return $this->hasMany(Viewer::class);
    }
}
