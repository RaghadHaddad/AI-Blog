<?php

namespace App\Http\Controllers;

use App\Http\Requests\RDetailsRequest;
use App\Http\Resources\RDetailsResource;
use App\Models\ResourceDetail;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadPhotoTrait;

class ResourceDetailController extends Controller
{
    use ApiResponseTrait;
    use UploadPhotoTrait;
    public function index()
    {
        $RDetails = RDetailsResource::collection(ResourceDetail::get());
        return $this->customResponse($RDetails,' ',200);
    }
    public function store(RDetailsRequest $request)
    {
        $RDetail = $request->validated();
        $destination = 'images/resources';
        $imagePath = $this->UploadPhoto($request, $destination,'image');
        $RDetail = ResourceDetail::create([
            'resource_id' =>$RDetail['resource_id'],
            'job' => $RDetail['job'],
            'publication_date'  => $RDetail['publication_date'],
            'total_download' => $RDetail['total_download'],
            'download_formate' => $RDetail['download_formate'],
            'total_number' => $RDetail['total_number'],
            'average_author_expertise' => $RDetail['average_author_expertise'],
            'image' => $imagePath
        ]);
        $RDetail->save();
        return $this->customResponse(new RDetailsResource($RDetail),'ok',200);
    }
    public function show($id)
    {
        $RDetail =ResourceDetail::find($id);
        if($RDetail) {
            return $this->customResponse(new RDetailsResource($RDetail),'ok',200);
        }
        return $this->customResponse(null,'the resource not found',404);
    }
    public function update(RDetailsRequest $request, $id)
    {
        $RDetail = $request->validated();
        $RDetail = ResourceDetail::findOrFail($id);
        // Update fields not related to file uploads
        $RDetail->update($request->except('image'));
        // Upload and update the image field
        $destination = 'images/resources';
        $imagePath = $this->UploadPhoto($request, $destination, 'image');
        $RDetail->image = $imagePath;
        $RDetail->save();
        return $this->customResponse(new RDetailsResource($RDetail), 'The resource Details was updated successfully', 201);
    }
    public function destroy($id)
    {
        $RDetail = ResourceDetail::find($id);
        if($RDetail)
        {
            $RDetail->delete($id);
            return $this->customResponse(null,'the resource Details deleted',200);
        }
        return $this->customResponse(null,'the resource Details not found',404);
    }
}
