<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use App\Http\Resources\ResourcesResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\{ResourceDetail,Resource,Category,Authors,contacts};
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $resources = ResourcesResource::collection(Resource::get());
        return $this->customResponse($resources,' ',200);
    }
    public function store(ResourceRequest $request)
    {
        $resource = $request->validated();
        $resource = Resource::create([
            'category_id' =>$resource['category_id'],
            'author_id' => $resource['author_id'],
            'title'  => $resource['title'],
            'description' => $resource['description'],
        ]);
        $resource->save();
        return $this->customResponse(new ResourcesResource($resource),'ok',200);
    }
    public function show($id)
    {
        $resource =Resource::find($id);
        if($resource) {
            return $this->customResponse(new ResourcesResource($resource),'ok',200);
        }
        return $this->customResponse(null,'the resource not found',404);
    }
    public function update(ResourceRequest $request, $id)
    {
        $resource = $request->validated();
        $resource = Resource::findOrFail($id);
        if($resource)
        {
            $resource->update($request->all());
            return $this->customResponse(new ResourcesResource($resource), 'The resource was updated successfully', 201);
        }
        return $this->customResponse(null, 'The resourcey not found', 400);


    }
    public function destroy($id)
    {
        $resource = Resource::find($id);
        if($resource)
        {
            $resource->delete($id);
            return $this->customResponse(null,'the resource deleted',200);
        }
        return $this->customResponse(null,'the resource not found',404);
    }
    public function counting()
    {
        $resource=Resource::count();
        $total_downloads = ResourceDetail::sum('total_download');
        $sum=Authors::count()+contacts::count();
        $countries = Authors::distinct('country')->count();
        return $this->customResponse([$resource,$total_downloads,$sum,$countries],'ok',200);
    }
    public function filter($section)
    {
        $query = Resource::with('resourceDetail', 'category', 'author')
        ->whereHas('category', function ($query) use ($section) {
            $query->where('section', $section);
        })
        ->get();
        //  return $this->customResponse($query, 'Results found', 200);
    if ($query->isEmpty()) {
        return $this->customResponse(null, 'No results found', 404);
    }
    $results = $query->map(function ($result) {
        return [
            "name" => $result->category->name,
            "section" => $result->category->section,
            "description" => $result->description,
            "title" => $result->title,
            "job" => $result->resourceDetail->job,
            "image" => $result->resourceDetail->image,
            "publication_date" => $result->resourceDetail->publication_date,
            "author_name" => $result->author->author_name,
        ];
    });
    return $this->customResponse($results, 'Results found', 200);
    }
    public function CardData()
    {
        $query = Resource::with('resourceDetail', 'category')->get();
        $results = $query->map(function ($result) {
            $image = $result->resourceDetail ? $result->resourceDetail->image : null;

            return [
                "name" => $result->category->name,
                "section" => $result->category->section,
                "title" => $result->title,
                "description" => $result->description,
                "image" => $image,
            ];
        });
        return $this->customResponse($results, 'Results found', 200);
    }

}
