<?php

use App\Http\Controllers\PodcastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/** Podcast **/

Route::get('podcast_index', [PodcastController::class, 'podcast_index']);
Route::get('podcast/podcastDetails/{id}', [PodcastController::class, 'podcast_podcastDetails']);
Route::post('create/podcast/{id}', [PodcastController::class, 'create_podcast']);
Route::post('create/podcastDetailes/{id}', [PodcastController::class, 'create_podcastDetailes']);
Route::put('update/podcast/{id}', [PodcastController::class, 'update_podcast']);
Route::put('update/podcastDetailes/{id}', [PodcastController::class, 'update_podcastDetails']);
Route::delete('delete/podcast/{id}', [PodcastController::class, 'delete_podcast']);
Route::delete('delete/podcastDetailes/{id}', [PodcastController::class, 'delete_podcastDetailes']);
