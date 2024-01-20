<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class RDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'resource_id,' => $this->resource_id,
            'job' => $this->job,
            'image'=> URL::asset('public/'.$this->image),
            'publication_date' => $this->publication_date,
            'total_download'=>$this->total_download,
            'download_formate'=>$this->download_formate,
            'total_number'=>$this->total_number,
            'average_author_expertise'=>$this->average_author_expertise,
        ];
    }
}
