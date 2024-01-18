<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\CategoryController;


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
Route::post('Contact', [ContactController::class ,'store']);

/**Answer Api */
Route::get('Answer',[AnswerController::class,'index_id']);

/**opinon Api */
Route::get('Opinion',[OpinionController::class, 'index_api']);

/**category Api */
Route::get('Category',[CategoryController::class, 'index_api']);
Route::get('Category/news',[CategoryController::class, 'show_Category_news']);
Route::get('Category/home',[CategoryController::class, 'show_Category_home']);
Route::get('Category/blog',[CategoryController::class, 'show_Category_blog']);
Route::get('Category/resource',[CategoryController::class, 'show_Category_resource']);
Route::get('Category/podcast',[CategoryController::class, 'show_Category_podcast']);



