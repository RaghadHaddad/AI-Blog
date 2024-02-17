<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use App\Models\Podcast;
use App\Models\PodcastDetailes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PodcastController extends Controller
{
    public function podcast_index()
    {
        $podcasts = Podcast::all();
        $PodcastsDetailes = PodcastDetailes::all();
        return response()->json([$podcasts, $PodcastsDetailes]);
    }

    public function podcast_podcastDetails($id)
    {
        $podcast = Podcast::where('id', $id)->first();
        $podcastDetailes = $podcast->podcast_details;
        return response()->json($podcastDetailes);
    }

    public function create_podcast(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|gt:0|integer|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        } else {
            try {
                $validatedData = $request->validate([
                    'title' => 'required|string|max:255',
                    'rate' => 'required|in:0,1,2,3,4,5',

                ]);

                $podcast = new Podcast;

                $podcast->author_id = $id;
                $podcast->title = $validatedData['title'];
                $podcast->rate = $validatedData['rate'];

                $podcast->save();

                return response()->json(['message' => 'Record created successfully', 'Podcast' => $podcast], 200);
            } catch (ValidationException $e) {
                return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
            }
        }
    }

    public function create_podcastDetailes(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|gt:0|integer|exists:podcasts,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        } else {
            try {
                $validatedData = $request->validate([
                    'job_description' => 'required|string',
                    'total_episodes' => 'required|integer',
                    'average_length' => 'required|numeric|gt:0|integer',
                    'release_frequency' => 'required|string'

                ]);


                $podcastDetailes = new PodcastDetailes;

                $podcastDetailes->podcast_id = $id;
                $podcastDetailes->job_description = $validatedData['job_description'];
                $podcastDetailes->total_episodes = $validatedData['total_episodes'];
                $podcastDetailes->average_length = $validatedData['average_length'];
                $podcastDetailes->release_frequency = $validatedData['release_frequency'];

                $podcastDetailes->save();

                return response()->json(['message' => 'Record created successfully', 'PodcastDetailes' => $podcastDetailes], 200);
            } catch (ValidationException $e) {
                return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
            }
        }
    }

    public function update_podcast(Request $request, $id)
    {

        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'rate' => 'required|in:0,1,2,3,4,5',
                'author_name' => 'required|exists:authors,author_name',
            ]);


            $podcast = Podcast::findOrFail($id);
            $author = Authors::where('author_name', $validatedData['author_name'])->first();
            $author_id = $author->id;
            $podcast->author_id = $author_id;
            $podcast->title = $validatedData['title'];
            $podcast->rate = $validatedData['rate'];



            $podcast->save();

            return response()->json(['message' => 'Record updated successfully', $podcast], 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }

    public function update_podcastDetails(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'job_description' => 'required|string',
                'total_episodes' => 'required|integer',
                'average_length' => 'required|numeric|gt:0|integer',
                'release_frequency' => 'required|string',
                'podcast_id' => 'required|numeric|gt:0|integer|exists:podcasts,id'

            ]);


            $podcastDetailes = PodcastDetailes::findOrFail($id);

            $podcastDetailes->job_description = $validatedData['job_description'];
            $podcastDetailes->total_episodes = $validatedData['total_episodes'];
            $podcastDetailes->average_length = $validatedData['average_length'];
            $podcastDetailes->release_frequency = $validatedData['release_frequency'];
            $podcastDetailes->podcast_id = $validatedData['podcast_id'];



            $podcastDetailes->save();

            return response()->json(['message' => 'Record updated successfully', $podcastDetailes], 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }

    public function delete_podcast($id)
    {

        $podcast = Podcast::find($id);
        if (!$podcast) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        if ($podcast->delete()) {
            return response()->json(['message' => 'Record deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to delete record'], 500);
        }
    }

    public function delete_podcastDetailes($id)
    {

        $podcastDetailes = PodcastDetailes::find($id);
        if (!$podcastDetailes) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        if ($podcastDetailes->delete()) {
            return response()->json(['message' => 'Record deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to delete record'], 500);
        }
    }
}
