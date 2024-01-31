<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\OpinionController;

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\PdfController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PodcastVideoController;

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsContentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ViewController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**contact Api */
Route::post('Contact', [ContactsController::class ,'store']);

/**Answer Api */
Route::get('Answer', [AnswerController::class, 'index_api']);

/**opinon Api */
Route::get('Opinion',[OpinionController::class, 'index_api']);

/**admin Api */
Route::get('admin',[AdminsController::class, 'index_api']);


/**opinon Api */
Route::get('Opinion',[OpinionController::class, 'index_api']);

/**category Api */
Route::get('Category', [CategoryController::class, 'index_api']);
Route::get('Category/news', [CategoryController::class, 'show_Category_news']);
Route::get('Category/home', [CategoryController::class, 'show_Category_home']);
Route::get('Category/blog', [CategoryController::class, 'show_Category_blog']);
Route::get('Category/resource', [CategoryController::class, 'show_Category_resource']);
Route::get('Category/podcast', [CategoryController::class, 'show_Category_podcast']);


/** Podcast **/

Route::get('podcast_index', [PodcastController::class, 'podcast_index']);
Route::get('podcast/podcastDetails/{id}', [PodcastController::class, 'podcast_podcastDetails']);
Route::post('create/podcast/{id}', [PodcastController::class, 'create_podcast']);
Route::post('create/podcastDetailes/{id}', [PodcastController::class, 'create_podcastDetailes']);
Route::put('update/podcast/{id}', [PodcastController::class, 'update_podcast']);
Route::put('update/podcastDetailes/{id}', [PodcastController::class, 'update_podcastDetails']);
Route::delete('delete/podcast/{id}', [PodcastController::class, 'delete_podcast']);
Route::delete('delete/podcastDetailes/{id}', [PodcastController::class, 'delete_podcastDetailes']);


/** Podcast Video**/

Route::get('/podcast-videos', [PodcastVideoController::class, 'index']);
Route::post('/create-podcast-video/{id}', [PodcastVideoController::class, 'store']);
Route::get('/show-podcast-video/{id}', [PodcastVideoController::class, 'show']);
Route::post('/update-podcast-video/{id}', [PodcastVideoController::class, 'update']);
Route::delete('/delete-podcast-videos/{id}', [PodcastVideoController::class, 'destroy']);

Route::get('Category',[CategoryController::class, 'index_api']);
Route::get('Category/news',[CategoryController::class, 'show_Category_news']);
Route::get('Category/home',[CategoryController::class, 'show_Category_home']);
Route::get('Category/blog',[CategoryController::class, 'show_Category_blog']);
Route::get('Category/resource',[CategoryController::class, 'show_Category_resource']);
Route::get('Category/podcast',[CategoryController::class, 'show_Category_podcast']);


/**news Api */
Route::get('all_news',[NewsController::class, 'index_api']);
Route::get('today_news',[NewsController::class, 'show_today_news']);
Route::get('post',[NewsController::class, 'show_post']);
Route::get('Main_news',[NewsController::class, 'show_Main_news']);
Route::get('blogs',[NewsController::class, 'show_blogs']);


/**reaction api */
Route::match(['get', 'post'], 'add_likes', [LikesController::class, 'store']);
Route::match(['get', 'post'], 'add_share', [ShareController::class, 'store']);
Route::match(['get', 'post'], 'add_comment', [CommentController::class, 'store']);
Route::match(['get', 'post'], 'add_view', [ViewController::class, 'store']);






