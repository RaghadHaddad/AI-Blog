<?php

namespace App\Http\Controllers;

use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PodcastVideoController extends Controller
{
    public function index()
    {
        $podcastVideos = Viewer::all();
        return response()->json($podcastVideos);
    }

    public function store(Request $request, $id)
    {
        $podcastVideo = new Viewer;
        $podcastVideo->author_id = $id;
        $podcastVideo->title = $request->input('title');
        $podcastVideo->details = $request->input('details');

        // Handle file upload
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public\videos', $fileName);
            $podcastVideo->video = Storage::url('app/public/videos/' . $fileName);
        }

        $podcastVideo->save();
        return response()->json($podcastVideo);
    }

    public function show($id)
    {
        $podcastVideo = Viewer::findOrFail($id);
        return response()->json($podcastVideo);
    }

    public function update(Request $request, $id)
    {
        $podcastVideo = Viewer::findOrFail($id);
        $podcastVideo->author_id = $request->input('author_id');
        $podcastVideo->title = $request->input('title');
        $podcastVideo->details = $request->input('details');

        if ($request->hasFile('video')) {
            // Delete the old video file
            unlink(storage_path('app/public/videos/') . basename($podcastVideo->video));

            $file = $request->file('video');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public\videos', $fileName);
            $podcastVideo->video = Storage::url('app/public/videos/' . $fileName);
        }

        $podcastVideo->save();
        return response()->json($podcastVideo);
    }

    public function destroy($id)
    {
        $podcastVideo = Viewer::findOrFail($id);
        $podcastVideo->delete();
        return response()->json(['message' => 'Podcast video deleted successfully']);
    }
}
