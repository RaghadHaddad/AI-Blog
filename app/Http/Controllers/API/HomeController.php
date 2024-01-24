<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $informations = Resource::with(['resourceDetail', 'category','author'])
        ->whereHas('category', function ($query) {
            $query->where('section', 'Whitepaper')
                ->orWhere('section', 'Ebooks')
                ->orWhere('section', 'Reports');
        })
        ->get();
        $results = $informations->map(function ($result) {
            $image = $result->resourceDetail ? $result->resourceDetail->image : null;
            return [
                "section" => $result->category->section,
                "description" => $result->description,
                "image" => $image,
                "download_formate"=>$result->resourceDetail->download_formate,
                "total_number"=>$result->resourceDetail->total_number,
                "average_author_expertise"=>$result->resourceDetail->average_author_expertise,
                "download-by"=>$result->author->count(),
            ];
        });
        return $this->customResponse($results, 'Results found', 200);
    }
}
