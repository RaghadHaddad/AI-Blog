<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourcesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id'=> $this->id,
            'category_id,' => $this->category_id,
            'author_id,' => $this->author_id,
            'title'=> $this->title,
            'description' => $this->description,
        ];
    }
}
