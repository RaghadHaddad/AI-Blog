<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Authors,ResourceDetail,Category};

class Resource extends Model
{
    use HasFactory;
    protected $table = 'resources';
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'description',
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class,'author_id');
    }

    public function resourceDetail()
    {
        return $this->hasOne(ResourceDetail::class,'resource_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
