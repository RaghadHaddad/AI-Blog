<?php

use App\Http\Controllers\API\ResourceController;
use App\Http\Controllers\API\ResourceDetailController;
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

});
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
