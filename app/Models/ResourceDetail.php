<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceDetail extends Model
{
    use HasFactory;
    protected $table = 'resource_details';
    protected $fillable = [
        'resource_id',
        'job',
        'image',
        'publication_date',
        'total_download',
        'download_formate',
        'total_number',
        'average_author_expertise'
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class,'resource_id');
    }

}
