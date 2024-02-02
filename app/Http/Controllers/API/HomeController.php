<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\{Resource,ResourceDetail,Authors,contacts};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponseTrait;
    public function countingHome()
    {
        $resource=Resource::count();
        $total_downloads = ResourceDetail::sum('total_download');
        $sum=Authors::count()+contacts::count();
        return $this->customResponse([$resource,$total_downloads,$sum],'ok',200);
    }
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
