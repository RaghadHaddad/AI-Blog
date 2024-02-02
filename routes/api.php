<?php

use App\Http\Controllers\API\ResourceController;
use App\Http\Controllers\API\ResourceDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\PdfController;

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

// });
    //crud for resource
    //All Resources
    Route::get('/all/resources',[ResourceController::class,'index']);
    //Add resource
    Route::post('/Add/resource',[ResourceController::class,'store']);
    //update
    Route::post('/update/resource/{id}' , [ResourceController::class , 'update']);
    //show resource
    Route::get('/show/resource/{id}' ,[ResourceController::class , 'show']);
    //delete resource
    Route::post('/delete/resource/{id}', [ResourceController::class, 'destroy']);

    //crud for resource Detail
    //All Resource Details
    Route::get('/all/resourceDetails',[ResourceDetailController::class,'index']);
    //Add resource Detail
    Route::post('/Add/resourceDetail',[ResourceDetailController::class,'store']);
    //update
    Route::post('/update/resourceDetail/{id}' , [ResourceDetailController::class , 'update']);
    //show resource Detail
    Route::get('/show/resourceDetail/{id}' ,[ResourceDetailController::class , 'show']);
    //delete resource Detail
    Route::post('/delete/resourceDetail/{id}', [ResourceDetailController::class, 'destroy']);
    //information in resource page
    Route::get('/Counting',[ResourceController::class,'counting']);
    //Route for filtering
    Route::get('/filter/{section}',[ResourceController::class,'filter']);
    //Route for card display
    Route::get('/CardData',[ResourceController::class,'CardData']);
    //download pdf
    Route::get('/download',[PdfController::class,'viewPdf']);
    //display resource for home page
    Route::get('/display',[HomeController::class,'index']);
    //counting
    Route::get('/home/counting',[HomeController::class,'countingHome']);

/**contact Api */
Route::post('Contact', [ContactsController::class ,'store']);

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
